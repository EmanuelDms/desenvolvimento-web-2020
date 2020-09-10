CREATE DATABASE IF NOT EXISTS LoginSystemAjaxPHP;

USE LoginSystemAjaxPHP;

CREATE TABLE tb_user(
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(300),
    status CHAR(1)
);

CREATE TABLE tb_log_try(
	id INT AUTO_INCREMENT PRIMARY KEY,
    ip VARCHAR(15),
    email VARCHAR(100),
    password VARCHAR(300),
    source VARCHAR(300),
    blocked CHAR(3),
    date_time timestamp NULL DEFAULT CURRENT_TIMESTAMP,
);