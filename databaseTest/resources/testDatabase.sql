
/* ####################################################### TABLA USER */

DROP TABLE IF EXISTS user;

CREATE TABLE IF NOT EXISTS user (
    id_user INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(100) NOT NULL,
    PRIMARY KEY (id_user)
);

INSERT INTO user (id_user, email) VALUES (0, "test@test.test");

/* ####################################################### TABLA SEARCH */

DROP TABLE IF EXISTS search;

CREATE TABLE IF NOT EXISTS search (
    id_search INT NOT NULL AUTO_INCREMENT,
	search_name VARCHAR(50),
	id_user INT NOT NULL,
    PRIMARY KEY (id_search),
    FOREIGN KEY (id_user) REFERENCES user(id_user)
);

INSERT INTO search (id_search, search_name, id_user) VALUES (0, "Test", 0);

/* ####################################################### TABLA TECHNOLOGY */

DROP TABLE IF EXISTS technology;

CREATE TABLE IF NOT EXISTS technology (
    id_technology INT NOT NULL AUTO_INCREMENT,
    tech_name VARCHAR(50) NOT NULL,
    PRIMARY KEY (id_technology)
);

INSERT INTO technology (id_technology, tech_name) VALUES (0, "TEST");

/* ####################################################### TABLA SEARCH_TECH */

DROP TABLE IF EXISTS search_tech;

CREATE TABLE IF NOT EXISTS search_tech (
    id_search INT NOT NULL,
	id_technology INT NOT NULL,
	preference INT(2) NOT NULL,
    PRIMARY KEY (id_search, id_technology),
    FOREIGN KEY (id_search) REFERENCES search(id_search),
    FOREIGN KEY (id_technology) REFERENCES technology(id_technology)
);

INSERT INTO search_tech (id_search, id_technology, preference) VALUES (0, 0, 0);

/* ####################################################### TABLA DEVELOPER */

DROP TABLE IF EXISTS user;

CREATE TABLE IF NOT EXISTS user (
    id_developer INT NOT NULL AUTO_INCREMENT,
    alias VARCHAR(50) NOT NULL,
    PRIMARY KEY (id_developer)
);

INSERT INTO user (id_developer, alias) VALUES (0, "test");

/* ####################################################### TABLA TECH_LEVEL */

DROP TABLE IF EXISTS search_tech;

CREATE TABLE IF NOT EXISTS search_tech (
	id_technology INT NOT NULL,
    id_developer INT NOT NULL,
	level INT(2) NOT NULL,
    PRIMARY KEY (id_technology, id_developer),
    FOREIGN KEY (id_technology) REFERENCES technology(id_technology),
    FOREIGN KEY (id_developer) REFERENCES search(id_developer)
);

INSERT INTO search_tech (id_search, id_technology, preference) VALUES (0, 0, 0);
