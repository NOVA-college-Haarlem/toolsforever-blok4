-- brands table
CREATE TABLE brands (
    brand_id INT NOT NULL AUTO_INCREMENT,
    brand_name VARCHAR(50) NOT NULL UNIQUE,
    PRIMARY KEY (brand_id)
);

INSERT INTO brands (brand_name) VALUES ('Hultafors');
INSERT INTO brands (brand_name) VALUES ('Stanley');
INSERT INTO brands (brand_name) VALUES ('Bahco');
INSERT INTO brands (brand_name) VALUES ('Bosch');
INSERT INTO brands (brand_name) VALUES ('Makita');
INSERT INTO brands (brand_name) VALUES ('Metabo');
INSERT INTO brands (brand_name) VALUES ('Black & Decker');
INSERT INTO brands (brand_name) VALUES ('Festool');
INSERT INTO brands (brand_name) VALUES ('Knipex');
INSERT INTO brands (brand_name) VALUES ('BMI');
INSERT INTO brands (brand_name) VALUES ('Fluke');
INSERT INTO brands (brand_name) VALUES ('Rubi');
INSERT INTO brands (brand_name) VALUES ('Norton');
INSERT INTO brands (brand_name) VALUES ('Tesa');
INSERT INTO brands (brand_name) VALUES ('Bison');
INSERT INTO brands (brand_name) VALUES ('Kärcher');
INSERT INTO brands (brand_name) VALUES ('Steinel');
INSERT INTO brands (brand_name) VALUES ('Anza');
INSERT INTO brands (brand_name) VALUES ('Goudhaantje');

-- categories table
CREATE TABLE categories (
    category_id INT NOT NULL AUTO_INCREMENT,
    category_name VARCHAR(50) NOT NULL UNIQUE,
    PRIMARY KEY (category_id)
);

INSERT INTO categories (category_name) VALUES ('Handgereedschap');
INSERT INTO categories (category_name) VALUES ('Elektrisch gereedschap');
INSERT INTO categories (category_name) VALUES ('Meetgereedschap');
INSERT INTO categories (category_name) VALUES ('Tegelgereedschap');
INSERT INTO categories (category_name) VALUES ('Kitgereedschap');
INSERT INTO categories (category_name) VALUES ('Lijmgereedschap');
INSERT INTO categories (category_name) VALUES ('Stofafzuiging');
INSERT INTO categories (category_name) VALUES ('Verfgereedschap');

-- tools table
CREATE TABLE tools (
    tool_id INT NOT NULL AUTO_INCREMENT,
    tool_name VARCHAR(50) NOT NULL,
    category_id INT NOT NULL,
    tool_price DECIMAL(10, 2) NOT NULL,
    brand_id INT NOT NULL,
    tool_image VARCHAR(255) NOT NULL,
    PRIMARY KEY (tool_id),
    FOREIGN KEY (category_id) REFERENCES categories(category_id),
    FOREIGN KEY (brand_id) REFERENCES brands(brand_id)
);

INSERT INTO tools (tool_name, category_id, tool_price, brand_id, tool_image)
VALUES
('Hamer', 1, 1499, 1, 'hamer.jpeg'),
('Schroevendraaierset', 1, 1999, 2, 'schroevendraaierset.webp'),
('Moersleutelset', 1, 2999, 3, 'moersleutelset.avif'),
('Boormachine', 2, 9999, 4, 'boormachine.png'),
('Cirkelzaag', 2, 14999, 5, 'cirkelzaag.webp'),
('Slijpmachine', 2, 7999, 6, 'slijpmachine.avif'),
('Schuurmachine', 2, 3999, 7, 'schuurmachine.avif'),
('Haakse slijper', 2, 8999, 8, 'haakse_slijper.jpeg'),
('Combinatietang', 1, 1299, 9, 'combinatietang.jpeg'),
('Waterpas', 3, 999, 10, 'waterpas.jpeg'),
('Rolmaat', 3, 799, 2, 'rolmaat.jpg'),
('Multimeter', 3, 2499, 11, 'multimeter.jpeg'),
('Tegelsnijder', 4, 4999, 12, 'tegelsnijder.jpeg'),
('Voegenkrabber', 4, 799, 13, 'voegenkrabber.jpeg'),
('Kitpistool', 5, 1299, 14, 'kitpistool.jpeg'),
('Lijmpistool', 6, 1999, 15, 'lijmpistool.jpeg'),
('Stofzuiger', 7, 11999, 16, 'stofzuiger.jpeg'),
('Verfafbrander', 8, 3999, 17, 'verfafbrander.jpeg'),
('Verfroller', 8, 999, 18, 'verfroller.jpeg'),
('Plamuurmes', 8, 699, 19, 'plamuurmes.jpeg');
