
/* ####################################################### BORRAR TABLAS */

DROP TABLE IF EXISTS developer_tech;

DROP TABLE IF EXISTS developer;

DROP TABLE IF EXISTS search_tech;

DROP TABLE IF EXISTS technology;

DROP TABLE IF EXISTS search;

DROP TABLE IF EXISTS user;

/* ####################################################### TABLA USER */

CREATE TABLE IF NOT EXISTS user (
    id_user INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(100) NOT NULL,
    PRIMARY KEY (id_user)
);

INSERT INTO user (id_user, email) VALUES (1, "test@test.test");

/* ####################################################### TABLA SEARCH */

CREATE TABLE IF NOT EXISTS search (
    id_search INT NOT NULL AUTO_INCREMENT,
	search_name VARCHAR(50),
	id_user INT NOT NULL,
    PRIMARY KEY (id_search),
    FOREIGN KEY (id_user) REFERENCES user(id_user) ON DELETE CASCADE
);

INSERT INTO search (id_search, search_name, id_user) VALUES (1, "Test", 1);

/* ####################################################### TABLA TECHNOLOGY */

CREATE TABLE IF NOT EXISTS technology (
    id_technology INT NOT NULL AUTO_INCREMENT,
    tech_name VARCHAR(50) NOT NULL,
    PRIMARY KEY (id_technology)
);

INSERT INTO technology (id_technology, tech_name) VALUES (1, "TEST");

/* ####################################################### TABLA SEARCH_TECH */

CREATE TABLE IF NOT EXISTS search_tech (
    id_search INT NOT NULL,
	preference INT(2) NOT NULL,
	id_technology INT NOT NULL,
    PRIMARY KEY (id_search, id_technology),
    FOREIGN KEY (id_search) REFERENCES search(id_search) ON DELETE CASCADE,
    FOREIGN KEY (id_technology) REFERENCES technology(id_technology) ON DELETE CASCADE
);

INSERT INTO search_tech (id_search, preference, id_technology) VALUES (1, 0, 1);

/* ####################################################### TABLA DEVELOPER */

CREATE TABLE IF NOT EXISTS developer (
    id_developer INT NOT NULL AUTO_INCREMENT,
    alias VARCHAR(50) NOT NULL,
    PRIMARY KEY (id_developer)
);

INSERT INTO developer (id_developer, alias) VALUES (1, "test");

/* ####################################################### TABLA TECH_LEVEL */

CREATE TABLE IF NOT EXISTS developer_tech (
    id_developer INT NOT NULL,
    id_technology INT NOT NULL,
	level INT(2) NOT NULL,
    PRIMARY KEY (id_developer, id_technology),
    FOREIGN KEY (id_developer) REFERENCES developer(id_developer) ON DELETE CASCADE,
    FOREIGN KEY (id_technology) REFERENCES technology(id_technology) ON DELETE CASCADE
);

INSERT INTO developer_tech (id_developer, id_technology, level) VALUES (1, 1, 1);
