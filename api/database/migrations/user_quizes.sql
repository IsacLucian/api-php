CREATE TABLE user_quizes(
		id INTEGER primary key auto_increment,
		user_id INTEGER,
		quize_id INTEGER,
		points INTEGER,
		created_at timestamp DEFAULT CURRENT_TIMESTAMP,
		updated_at timestamp DEFAULT CURRENT_TIMESTAMP

);