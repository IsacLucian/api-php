CREATE TABLE songs(
		id INTEGER primary key auto_increment,
		category_id INTEGER,
		title varchar(32),
		url varchar(60000),
		created_at timestamp DEFAULT CURRENT_TIMESTAMP,
		updated_at timestamp DEFAULT CURRENT_TIMESTAMP
);