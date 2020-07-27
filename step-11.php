MySQL 101
->After installing xampp,turn on mysql service for operating database.
->Open phpmyadmin.
->Create database.
->Create table inside database,give primary key to the field you want.
->Insert data into table by firing the query:
	INSERT INTO user(name, email)
	VALUES (abc,abc@gmail.com);(id is PK and auto incremented)
->For retreival of data,fire select query:	
	SELECT * FROM user;