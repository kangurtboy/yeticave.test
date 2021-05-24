/* таблица ползователей */
CREATE TABLE users (
id INT AUTO_INCREMENT PRIMARY KEY ,
name VARCHAR(128),
email VARCHAR(128),
password VARCHAR(64)
);

/* лоты */
CREATE TABLE lots (id INT AUTO_INCREMENT PRIMARY KEY ,
name VARCHAR(128),
description TEXT,
img VARCHAR(128),
category_id INT ,
rate_id INT ,
user_id INT ,
cost INT, 
min_cost INT ,
time_out DATETIME
);

/* категории */
CREATE TABLE categories (
id INT AUTO_INCREMENT PRIMARY KEY ,
name VARCHAR(64) NOT NULL 
);

/* история ставок */
CREATE TABLE rate_history (
id INT AUTO_INCREMENT PRIMARY KEY ,
user_id INT ,
lot_id INT ,
price INT ,
rate_date DATETIME 
);