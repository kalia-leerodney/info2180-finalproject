CREATE DATABASE IF NOT EXISTS BugIssueDB;

USE BugIssueDB;

CREATE TABLE Users(
    id INTEGER AUTO_INCREMENT,
    firstname VARCHAR(64),
    lastname VARCHAR(64),
    _password VARCHAR(255),
    email VARCHAR(64),
    date_joined DATETIME,
    PRIMARY KEY(id));

CREATE TABLE Issues (
    id INTEGER AUTO_INCREMENT,
    title VARCHAR(64),
    _description TEXT,
    _priority VARCHAR(64),
    _type VARCHAR(64),
    _status VARCHAR(64),
    assigned_to INTEGER,
    created_by INTEGER,
    created DATETIME,
    updated DATETIME,
    PRIMARY KEY(id));

INSERT into Users(firstname,lastname,_password,email,date_joined)
VALUES ("Jack","Ryan",'$2y$10$l6gNGOMwocl5YRwJhm3eceGDuCrtCsImMhXDR46kBCPbYtyE3quki',"admin@project2.com",NOW());

GRANT ALL PRIVILEGES ON BugIssueDB.* TO 'BUGadmin'@'localhost' IDENTIFIED BY 'BUGpass';