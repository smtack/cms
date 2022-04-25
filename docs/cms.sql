-- SQL CODE FOR CMS DATABASE

CREATE DATABASE cms;

-- USE DATABASE

USE `cms`;

-- CREATE PAGES TABLE

CREATE TABLE pages (
  page_id INT(8) NOT NULL AUTO_INCREMENT,
  page_title VARCHAR(255) NOT NULL,
  page_label VARCHAR(255) NOT NULL,
  page_slug VARCHAR(255) NOT NULL,
  page_content VARCHAR(5000) NOT NULL,
  page_created DATETIME NOT NULL,
  page_updated DATETIME NULL,
  UNIQUE INDEX page_title_unique (page_title),
  PRIMARY KEY (page_id)
) ENGINE=INNODB;