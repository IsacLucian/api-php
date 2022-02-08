CREATE TABLE user_settings(
		id INTEGER primary key auto_increment,
		user_id INTEGER,
		audio boolean NULL,
		created_at timestamp,
		updated_at timestamp
);