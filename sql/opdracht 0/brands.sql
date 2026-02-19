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

