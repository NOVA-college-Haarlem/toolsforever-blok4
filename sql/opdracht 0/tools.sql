CREATE TABLE tools (
    tool_id INT NOT NULL AUTO_INCREMENT,
    tool_name VARCHAR(50) NOT NULL,
    tool_category VARCHAR(50) NOT NULL,
    tool_price DECIMAL(10, 2) NOT NULL,
    tool_brand VARCHAR(50) NOT NULL,
    tool_image VARCHAR(255) NULL,
    PRIMARY KEY (tool_id)
);

INSERT INTO tools (tool_name, tool_category, tool_price, tool_brand, tool_image)
VALUES
('Hammer', 'Handgereedschap', 1499, 'Hultafors', 'hamer.jpeg'),
('Schroevendraaierset', 'Handgereedschap', 1999, 'Stanley', 'schroevendraaierset.webp'),
('Moersleutelset', 'Handgereedschap', 2999, 'Bahco', 'moersleutelset.avif'),
('Boormachine', 'Elektrisch gereedschap', 9999, 'Bosch', 'boormachine.png'),
('Cirkelzaag', 'Elektrisch gereedschap', 14999, 'Makita', 'cirkelzaag.webp'),
('Slijpmachine', 'Elektrisch gereedschap', 7999, 'Metabo', 'slijpmachine.avif'),
('Schuurmachine', 'Elektrisch gereedschap', 3999, 'Black & Decker', 'schuurmachine.avif'),
('Haakse slijper', 'Elektrisch gereedschap', 8999, 'Festool', 'haakse_slijper.jpeg'),
('Combinatietang', 'Handgereedschap', 1299, 'Knipex', 'combinatietang.jpeg'),
('Waterpas', 'Meetgereedschap', 999, 'BMI', 'waterpas.jpeg'),
('Rolmaat', 'Meetgereedschap', 799, 'Stanley', 'rolmaat.jpg'),
('Multimeter', 'Meetgereedschap', 2499, 'Fluke', 'multimeter.jpeg'),
('Tegelsnijder', 'Tegelgereedschap', 4999, 'Rubi', 'tegelsnijder.jpeg'),
('Voegenkrabber', 'Tegelgereedschap', 799, 'Norton', 'voegenkrabber.jpeg'),
('Kitpistool', 'Kitgereedschap', 1299, 'Tesa', 'kitpistool.jpeg'),
('Lijmpistool', 'Lijmgereedschap', 1999, 'Bison', 'lijmpistool.jpeg'),
('Stofzuiger', 'Stofafzuiging', 11999, 'Kärcher', 'stofzuiger.jpeg'),
('Verfafbrander', 'Verfgereedschap', 3999, 'Steinel', 'verfafbrander.jpeg'),
('Verfroller', 'Verfgereedschap', 999, 'Anza', 'verfroller.jpeg'),
('Plamuurmes', 'Verfgereedschap', 699, 'Goudhaantje', 'plamuurmes.jpeg');
