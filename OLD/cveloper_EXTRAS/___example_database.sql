
DROP TABLE IF EXISTS user;

CREATE TABLE user (
	id_user INT(1) PRIMARY KEY,
	email VARCHAR(15)
);

DROP TABLE IF EXISTS tech;

CREATE TABLE tech (
	id_tech INT(1) PRIMARY KEY,
	name VARCHAR(15)
);

DROP TABLE IF EXISTS user_tech;

CREATE TABLE user_tech (
	id_user INT(1),
	id_tech INT(1),
	level INT(1),
	PRIMARY KEY (id_user, id_tech),
	FOREIGN KEY (id_user) REFERENCES user(id_user),
	FOREIGN KEY (id_tech) REFERENCES tech(id_tech)
);

INSERT INTO user (id_user, email) VALUES 
	(1, "uno@gmail"),
	(2, "dos@gmail"),
	(3, "tres@gmail"),
	(4, "cuatro@gmail"),
	(5, "cinco@gmail"),
	(6, "seis@gmail"),
	(7, "siete@gmail"),
	(8, "ocho@gmail"),
	(9, "nueve@gmail");

INSERT INTO tech (id_tech, name) VALUES 
	(1, "PHP"),
	(2, "JAVA"),
	(3, "JS"),
	(4, "PYTHON"),
	(5, "RUBY"),
	(6, "CSS"),
	(7, "HTML"),
	(8, "C++"),
	(9, "C#");

INSERT INTO user_tech (id_user, id_tech, level) VALUES
	(1, 1, 1),
	(1, 2, 2),
	(1, 3, 3),
	(1, 4, 4),
	(1, 5, 5),
	(1, 6, 6),
	(1, 7, 7),
	(1, 8, 8),
	(1, 9, 9),
	(2, 1, 5),
	(2, 2, 5),
	(2, 3, 5),
	(2, 4, 5),
	(2, 5, 5),
	(2, 6, 5),
	(2, 7, 5),
	(2, 8, 5),
	(2, 9, 5),
	(3, 1, 1),
	(3, 2, 1),
	(3, 3, 1),
	(3, 4, 1),
	(3, 5, 1),
	(3, 6, 1),
	(3, 7, 1),
	(3, 8, 1),
	(3, 9, 1),
	(4, 1, 9),
	(4, 2, 9),
	(4, 3, 9),
	(4, 4, 9),
	(4, 5, 9),
	(4, 6, 9),
	(4, 7, 9),
	(4, 8, 9),
	(4, 9, 9),
	(5, 1, 5),
	(5, 3, 3),
	(5, 4, 6),
	(5, 5, 2),
	(5, 7, 5),
	(5, 9, 7),
	(6, 1, 6),
	(6, 3, 3),
	(6, 5, 5),
	(6, 7, 2),
	(6, 8, 7),
	(7, 5, 3),
	(7, 6, 5),
	(7, 8, 6),
	(8, 2, 6),
	(8, 4, 2),
	(8, 7, 3),
	(8, 9, 5),
	(9, 2, 2),
	(9, 3, 6),
	(9, 4, 7),
	(9, 5, 3),
	(9, 6, 5),
	(9, 8, 7),
	(9, 9, 6);