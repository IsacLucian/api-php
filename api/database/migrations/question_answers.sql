CREATE TABLE question_answers(
		id INTEGER primary key auto_increment,
		question_id INTEGER,
		answer_id INTEGER,
		content varchar(32),
		is_valid boolean,
		created_at timestamp DEFAULT CURRENT_TIMESTAMP,
		updated_at timestamp DEFAULT CURRENT_TIMESTAMP

);