CREATE TABLE quizes(
		id INTEGER primary key auto_increment,
		category_id INTEGER,
		title varchar(32),
		url varchar(32),
		created_at timestamp DEFAULT CURRENT_TIMESTAMP,
		updated_at timestamp DEFAULT CURRENT_TIMESTAMP
);