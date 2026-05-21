-- brands table
CREATE TABLE brands (
    brand_id INT NOT NULL AUTO_INCREMENT,
    brand_name VARCHAR(50) NOT NULL,
    brand_image VARCHAR(255) NULL,
    PRIMARY KEY (brand_id)
);


INSERT INTO brands (brand_name, brand_image) VALUES ('Hultafors', 'hultafors.png');
INSERT INTO brands (brand_name, brand_image) VALUES ('Stanley', 'stanley.png');
INSERT INTO brands (brand_name, brand_image) VALUES ('Bahco', 'bahco.png');
INSERT INTO brands (brand_name, brand_image) VALUES ('Bosch', 'bosch.png');
INSERT INTO brands (brand_name, brand_image) VALUES ('Makita', 'makita.png');
INSERT INTO brands (brand_name, brand_image) VALUES ('Metabo', 'metabo.png');
INSERT INTO brands (brand_name, brand_image) VALUES ('Black & Decker', 'black.png');
INSERT INTO brands (brand_name, brand_image) VALUES ('Festool', 'festool.png');
INSERT INTO brands (brand_name, brand_image) VALUES ('Knipex', 'knipex.png');
INSERT INTO brands (brand_name, brand_image) VALUES ('BMI', 'bmi.png');
INSERT INTO brands (brand_name, brand_image) VALUES ('Fluke', 'fluke.png');
