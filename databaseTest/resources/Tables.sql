
/* ####################################################### BORRAR TABLAS */

DROP TABLE IF EXISTS developer_tech;

DROP TABLE IF EXISTS developer;

DROP TABLE IF EXISTS search_tech;

DROP TABLE IF EXISTS technology;

DROP TABLE IF EXISTS search;

DROP TABLE IF EXISTS template;

DROP TABLE IF EXISTS recruiter;

DROP TABLE IF EXISTS company;

DROP TABLE IF EXISTS academy;

DROP TABLE IF EXISTS additional;

DROP TABLE IF EXISTS experience;

DROP TABLE IF EXISTS training;

DROP TABLE IF EXISTS job_offer;

DROP TABLE IF EXISTS training_offer;

DROP TABLE IF EXISTS tech_company;

DROP TABLE IF EXISTS tech_job_offer;

DROP TABLE IF EXISTS tech_training_offer;

DROP TABLE IF EXISTS developer_job_offer;

DROP TABLE IF EXISTS user;







/* ####################################################### TABLA USER */

CREATE TABLE IF NOT EXISTS user (
    id_user INT NOT NULL AUTO_INCREMENT,
    alias VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    type VARCHAR(50) NOT NULL,
    PRIMARY KEY (id_user)
);

INSERT INTO user (id_user, email) VALUES (1, "test@test.test");

/* ####################################################### TABLA SEARCH */

CREATE TABLE IF NOT EXISTS search (
    id_search INT NOT NULL AUTO_INCREMENT,
    search_name VARCHAR(50),
    search_date DATE,
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

/* ####################################################### TABLA TEMPLATE */

CREATE TABLE IF NOT EXISTS template (
    id_template INT AUTO_INCREMENT,
    template_name VARCHAR(50),
    thumbnail VARCHAR(200),
    designer VARCHAR(200),
    developer VARCHAR(200),
    PRIMARY KEY(id_template)
);

/* ####################################################### TABLA DEVELOPER */

CREATE TABLE IF NOT EXISTS developer (
    id_developer INT NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    address VARCHAR (60),
    postal_code INT (10),
    city VARCHAR(50),
    country VARCHAR (50),
    phone INT(15),
    link_github VARCHAR(200),
    link_linkeidn VARCHAR(200),
    avatar VARCHAR(200),
    id_template INT,
    PRIMARY KEY (id_developer),
    FOREIGN KEY (id_template) REFERENCES template (id_template)
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


/* ####################################################### TABLA TRAINING */

CREATE TABLE IF NOT EXISTS training (
    id_training INT AUTO_INCREMENT,
    degree VARCHAR(50),
    institution VARCHAR(50),
    city VARCHAR(50),
    finish_date DATE,
    id_developer INT,
    PRIMARY KEY id_training,
    FOREIGN KEY (id_developer) REFERENCES developer (id_developer)
 );  


/* ####################################################### TABLA EXPERIENCE */

CREATE TABLE IF NOT EXISTS experience (
    id_experience INT AUTO_INCREMENT,
    position VARCHAR(50),
    company VARCHAR(50),
    finish_date DATE,
    duration VARCHAR(50),
    id_developer INT,
    PRIMARY KEY id_experience,
    FOREIGN KEY (id_developer) REFERENCES developer (id_developer)
);

/* ####################################################### TABLA ADDITIONAL */

CREATE TABLE IF NOT EXISTS additional (
    id_additional INT AUTO_INCREMENT,
    description VARCHAR(500),
    id_developer INT,
    FOREIGN KEY (id_developer) REFERENCES developer (id_developer)
);

/* ####################################################### TABLA RECRUITER */

CREATE TABLE IF NOT EXISTS recruiter (
    id_recruiter INT AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    link_github VARCHAR(200),
    link_linkeidn VARCHAR(200),
    PRIMARY KEY (id_recruiter)
);


/* ####################################################### TABLA COMPANY */

CREATE TABLE IF NOT EXISTS company (
    id_company INT AUTO_INCREMENT,
    company_name VARCHAR(50) NOT NULL,
    address VARCHAR(50) NOT NULL,
    postal_code VARCHAR(10),
    city VARCHAR(50),
    country VARCHAR(50),
    contact_phone INT (15),
    link_github VARCHAR(200),
    link_linkeidn VARCHAR(200),
    avatar VARCHAR(200),
    PRIMARY KEY (id_company)

);    



/* ####################################################### TABLA ACADEMY */

CREATE TABLE IF NOT EXISTS academy (
    id_academy INT AUTO_INCREMENT,
    academy_name VARCHAR(50) NOT NULL,
    address VARCHAR(50) NOT NULL,
    postal_code VARCHAR(10),
    city VARCHAR(50),
    country VARCHAR(50),
    contact_phone INT (15),
    link_github VARCHAR(200),
    link_linkeidn VARCHAR(200),
    avatar VARCHAR(200),
    PRIMARY KEY (id_academy)

);    


/* ####################################################### TABLA JOB_OFFER */

CREATE TABLE IF NOT EXISTS job_offer (
    id_job_offer INT AUTO_INCREMENT,
    position VARCHAR(50),
    working_day VARCHAR(50),
    contract_type VARCHAR(50),
    salary INT,
    description VARCHAR(500),
    id_company INT,
    PRIMARY KEY (id_job_offer),
    FOREIGN KEY (id_company) REFERENCES company (id_company)
);    

/* ####################################################### TABLA TRAINING_OFFER */

CREATE TABLE IF NOT EXISTS training_offer (
    id_training_offer INT AUTO_INCREMENT,
    schedule VARCHAR(50),
    training_name VARCHAR(50),
    description VARCHAR(500),
    PRIMARY KEY (id_training_offer),
    FOREIGN KEY (id_company) REFERENCES company (id_company)
);


/* ####################################################### TABLA TECH_COMPANY */

CREATE TABLE IF NOT EXISTS tech_company (
    id_company INT,
    id_technology INT,
    PRIMARY KEY (id_company, id_technology),
    FOREIGN KEY (id_company) REFERENCES company (id_company),
    FOREIGN KEY (id_technology) REFERENCES technology (id_technology)
);


/* ####################################################### TABLA TECH_JOB_OFFER */

CREATE TABLE IF NOT EXISTS tech_job_offer (
    id_job_offer INT,
    id_technology INT,
    PRIMARY KEY (id_job_offer, id_technology),
    FOREIGN KEY (id_technology) REFERENCES technology (id_technology),
    FOREIGN KEY (id_job_offer) REFERENCES job_offer (id_job_offer) 
);


/* ####################################################### TABLA TECH_TRAINING_OFFER */

CREATE TABLE IF NOT EXISTS tech_training_offer (
    id_training_offer INT,
    id_technology INT,
    PRIMARY KEY (id_training_offer, id_technology),
    FOREIGN KEY (id_technology) REFERENCES technology (id_technology),
    FOREIGN KEY (id_training_offer) REFERENCES training_offer (id_training_offer) 
);


/* ####################################################### TABLA DEVELOPER_JOB_OFFER */

CREATE TABLE IF NOT EXISTS developer_job_offer (
    id_developer INT,
    id_job_offer INT,
    application INT AUTO_INCREMENT,
    PRIMARY KEY (id_developer, id_job_offer),
    FOREIGN KEY (id_developer) REFERENCES developer (id_developer),
    FOREIGN KEY (id_job_offer) REFERENCES job_offer (id_job_offer)
);

