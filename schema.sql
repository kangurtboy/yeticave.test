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
min_cost INT 
);