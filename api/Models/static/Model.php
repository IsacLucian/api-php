<?php

require_once ROOT_DIR . '/config/config.php';
require_once ROOT_DIR . '/database/Database.php';
require_once ROOT_DIR . '/vendor/Util.php';
require_once ROOT_DIR . '/vendor/Fields.php';

class Model
{
    public static $table;
    public static $guarded = ['id'];
    public static $fields = [
        //
    ];

    public function __construct()
    {
        static::$fields = Get_fields(static::$table);
    }

    public static function all()
    {
        $conn = Database::connection();
        if (! $conn) {
            return 'Database connection error.';
        }

        $query = 'SELECT * FROM ' . static::$table;

        $execStmt = mysqli_query($conn, $query);

        $result = [];

        while($row = mysqli_fetch_assoc($execStmt)){
            $result[] = $row;
        }

        return $result;
    }

    public static function get($parameters)
    {
        foreach ($parameters as $key1 => $value1) {
            $key = $key1;
            $value = $value1;
        }
        
        $conn = Database::connection();
        if (! $conn) {
            return 'Database connection error.';
        }


        $query = 'SELECT * FROM ' . static::$table . ' WHERE '. $key . '=' . Util::formatByType($value);

        $result = mysqli_query($conn, $query);
        $object = [];
        while ($row = mysqli_fetch_assoc($result))
        {
            $object[] = $row;
        }

        return $object;
    }

    public static function getByUrl($url)
    {
        $conn = Database::connection();
        if (! $conn) {
            return 'Database connection error.';
        }

        $stmt = $conn->prepare('SELECT * FROM ' . static::$table . ' WHERE url = ?');
        $stmt->bind_param('i', $url);

        $stmt->execute();

        $result = $stmt->get_result();
        $object = $result->fetch_object();

        $stmt->close();

        return $object;
    }

    public static function create($args)
    {
        if (count(static::$fields) !== count($args)) {
            return false;
        }

        $conn = Database::connection();

        if (! $conn) {
            $conn = Database::getConnection(Database_HOST, Database_NAME, Database_USERNAME, Database_PASSWORD);
        }

        if (! $conn) {
            return 'Database connection error.';
        }

        $columns = implode(',', static::$fields);
        $values = [];
        foreach ($args as $key => $arg) {
            $values[] = Util::formatByType($arg);
        }

        $query = 'INSERT INTO ' . static::$table .'(' . $columns . ')' . ' VALUES (' . implode(',', $values) . ')';

        $stmt = $conn->query($query);

        return $stmt;
    }

    public static function update($args)
    {
        if (count(static::$fields) !== (count($args) - 1)) {
            return false;
        }

        $id = isset($args['id']) ? $args['id'] : $args[0];

        $conn = Database::connection();

        if (! $conn) {
            $conn = Database::getConnection(Database_HOST, Database_NAME, Database_USERNAME, Database_PASSWORD);
        }

        if (! $conn) {
            return 'Database connection error.';
        }


        $s='';

        foreach ($args as $key => $value) {
            if($value !== "" && $key !== 'id'){
                $s=$key . '=' . Util::formatByType($value) .', ' . $s;
            }
        }

        $s = substr($s, 0,-2);

        $query = 'UPDATE ' . static::$table . ' SET ' . $s . 'WHERE id = ' . $id;

        $stmt = $conn->query($query);

        return $stmt;
    }

    public static function delete($id)
    {
        $conn = Database::connection();

        if (! $conn) {
            $conn = Database::getConnection(Database_HOST, Database_NAME, Database_USERNAME, Database_PASSWORD);
        }

        if (! $conn) {
            return 'Database connection error.';
        }

        if ($id === '*') {
            $stmt = $conn->prepare('DELETE FROM ' . static::$table);
        } else {
            $stmt = $conn->prepare('DELETE FROM ' . static::$table . ' WHERE id = ?');
            $stmt->bind_param('i', $id);
        }

        $stmt->execute();
        $result = $stmt->affected_rows !== 0;

        $stmt->close();

        return $result  ;
    }
}
