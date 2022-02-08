<html>

    <body>

        <form action="dodo.php" method="post" enctype="multipart/form-data">

            Create table(mysql):<br>

            <textarea rows="20" cols="100" name="tableinfo">
CREATE TABLE <TABLENAME>(
        id INTEGER primary key auto_increment,

        created_at timestamp DEFAULT CURRENT_TIMESTAMP,
        updated_at timestamp DEFAULT CURRENT_TIMESTAMP
);
            </textarea><br><br>

            <input type="file" name="UploadFileName"><br><br>

            <input type="submit" value="Submit">

        </form>
    </body>

</html>