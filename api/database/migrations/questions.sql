CREATE TABLE questions(
		id INTEGER primary key auto_increment,
		content varchar(32),
		points INTEGER,
		created_at timestamp DEFAULT CURRENT_TIMESTAMP,
		updated_at timestamp DEFAULT CURRENT_TIMESTAMP

);