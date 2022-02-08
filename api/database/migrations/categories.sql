CREATE TABLE categories(
		id INTEGER primary key auto_increment,
		name varchar(32),
		created_at timestamp DEFAULT CURRENT_TIMESTAMP,
		updated_at timestamp DEFAULT CURRENT_TIMESTAMP
);