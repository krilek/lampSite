CREATE DATABASE lampShop DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE lampShop;
CREATE TABLE produkty(
  	productId INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(200) NOT NULL,
    price DECIMAL(9,2) NOT NULL,
    picture VARCHAR(200) NOT NULL);
INSERT INTO produkty VALUES(title, price, picture)
("Duża lampa 2017", 99653.58, "obrazek1.png"),
("Ścienna lampa 2321", 9763.32, "obrazek2.png"),
("Ścienna lampa 2321", 9763.32, "obrazek3.png");