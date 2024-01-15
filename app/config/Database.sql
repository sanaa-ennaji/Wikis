CREATE DATABASE IF NOT EXISTS `wiki`;
USE `wiki`;

-- table of category
CREATE TABLE IF NOT EXISTS `category`(
     idCategory INT(10) AUTO_INCREMENT PRIMARY KEY,
     nameCategory VARCHAR(255) NOT NULL,
     description VARCHAR(255) NOT NULL,
     pictureCategory VARCHAR(255) NOT NULL

);



-- table of user

CREATE TABLE IF NOT EXISTS `user`(
    idUser INT(10) AUTO_INCREMENT PRIMARY KEY,
    fullName VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    -- pictureUser VARCHAR(255) NOT NULL,
    role ENUM('admin','author') NOT NULL
   

);
-- table of wiki

CREATE TABLE IF NOT EXISTS `wiki`(
    idWiki INT(10) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content LONGTEXT NOT NULL,
    summarize TEXT NOT NULL,
    dateCreated TIMESTAMP NOT NULL,
    dateModified TIMESTAMP NOT NULL,
    archived ENUM('1','0') NOT NULL,
    pictureWiki VARCHAR(255) NOT NULL,
    idCategory INT(10) NOT NULL,
    idUser INT(10) NOT NULL,
    FOREIGN KEY (idCategory) REFERENCES category(idCategory) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (idUser) REFERENCES user(idUser) ON DELETE CASCADE ON UPDATE CASCADE
);

-- table of tag

CREATE TABLE IF NOT EXISTS `tag`(
    idTag INT(10)  AUTO_INCREMENT PRIMARY KEY,
    nameTag VARCHAR(255) NOT NULL

);

-- table of tagOfWiki

CREATE TABLE IF NOT EXISTS `tagOfWiki`(
    idTag INT(10) NOT NULL,
    idWiki INT(10) NOT NULL,
    FOREIGN KEY (idTag) REFERENCES tag(idTag) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (idWiki) REFERENCES Wiki(idWiki) ON DELETE CASCADE ON UPDATE CASCADE
);





-- insert into user

INSERT INTO user (fullName, username, email, password, role) VALUES ("admin", "admin", "admin@gmail.com","$2y$10$SsxPucF6ZxZJmZotbkpMQeWTDkN8RejsIR3Gk0RwVM0T4qzguT1/W", "admin");
