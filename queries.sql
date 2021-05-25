/* список категории */
INSERT INTO categories (NAME) VALUES
('Доски и лыжи'),
('Крепления'),
('Ботинки'),
('Одежда'),
('Инструменты'),
('Разное');

/* ползователи */
INSERT INTO users(NAME , email , PASSWORD) VALUES 
('Игнат' , 'ignat.v@gmail.com' , '$2y$10$X8/DXv6m62aYPLt.Mimg9u9mkljtE5KRSsQDVG6YiUSQ6e2oy7Wr6'),
('Леночка' , 'kitty_93@li.ru' , '$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa'),
('Руслан' , 'warrior07@mail.ru' , '$2y$10$2OxpEH7narYpkOT1H5cApezuzh10tZEEQ2axgFOaKW.55LxIJBgWW');

/* cnисок обявление */
INSERT INTO lots(NAME , img , category_id , user_id , cost , min_cost , time_out) VALUES
('2014 Rossignol District Snowboard', 'lot-1.jpg' , 1 , 1 , 10999 , 109 , '2021-08-23' ),
('DC Ply Mens 2016/2017 Snowboard', 'lot-2.jpg' , 1 , 2 , 159999 , 1050 , '2021-09-24' ),
('Крепления Union Contact Pro 2015 года размер L/XL', 'lot-3.jpg' , 2 , 3 , 8000 , 809 , '2021-10-13' ),
('Ботинки для сноуборда DC Mutiny Charocal', 'lot-4.jpg' , 3 , 1 , 10999 , 109 , '2021-11-02' ),
('Куртка для сноуборда DC muty Charocal', 'lot-5.jpg' , 4 , 2 , 10999 , 109 , '2021-12-22' ),
('Маска Oakley Canopy', 'lot-6.jpg' , 6 , 3 , 5400 , 840 , '2021-07-08' );

/*пару ставок */
INSERT INTO rates (user_id , lot_id , price) VALUES 
(1 , 6 , 2500),
(2 , 1 , 1500),
(3 , 5 , 5000);