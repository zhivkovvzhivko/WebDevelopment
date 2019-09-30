CREATE DATABASE IF NOT EXISTS shop;

CREATE TABLE IF NOT EXISTS categories(
CAT_ID INT(11) NOT NULL AUTO_INCREMENT,
CAT_NAME VARCHAR(255) NOT NULL,
CREATE_DATE DATETIME DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (CAT_ID)
)

CREATE TABLE IF NOT EXISTS  products(
PRODUCT_ID INT(11) NOT NULL AUTO_INCREMENT,
PRODUCT_NAME VARCHAR(255) NOT NULL,
PRICE DECIMAL(6,2) DEFAULT 0,
DESCRIPTION TEXT,
CREATE_DATE DATETIME DEFAULT CURRENT_TIMESTAMP,
LAST_UPDATE DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY(PRODUCT_ID),
CONSTRAINT `FK1` FOREIGN KEY (CAT_ID) REFERENCES categories(CAT_ID)
)

INSERT INTO categories (CAT_ID, CAT_NAME) VALUES (1, 'Drinks'), (2, 'Foods');
INSERT INTO products (PRODUCT_ID, PRODUCT_NAME, PRICE, DESCRIPTION, CREATE_DATE) VALUES
('Coffee', 2.56, 1, null, '2019-01-01');
('Coca-Cola', 2, 1, test, '2019-02-01');
('Sweps', 1.5, 1, null, null)
('Chips', 2.5, 2, null, '2019-01-01');
('What ever', 99, 3, null, '2017-10-12');