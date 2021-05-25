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
user_id INT ,
cost INT, 
min_cost INT ,
time_out DATE
);

/* категории */
CREATE TABLE categories (
id INT AUTO_INCREMENT PRIMARY KEY ,
name VARCHAR(64) NOT NULL 
);

/* история ставок */
CREATE TABLE rates (
id INT AUTO_INCREMENT PRIMARY KEY ,
user_id INT ,
lot_id INT ,
price INT ,
rate_date DATETIME DEFAULT NOW()
);

/* индексация */
CREATE INDEX lot_rate ON rate_history (user_id , price);
CREATE INDEX user_email ON users (email);
CREATE INDEX lot ON lots (id, user_id , name);