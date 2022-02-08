CREATE TABLE quiz_questions(
		id INTEGER primary key auto_increment,
		quiz_id INTEGER,
		question_id INTEGER,
		created_at timestamp DEFAULT CURRENT_TIMESTAMP,
		updated_at timestamp DEFAULT CURRENT_TIMESTAMP

);