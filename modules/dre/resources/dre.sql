GRANT ALL ON *.* to 'diamond'@'localhost' IDENTIFIED BY 'qDX7Fb3TvhVYgsSj' WITH GRANT OPTION;
FLUSH PRIVILEGES;
CREATE DATABASE dre;
USE dre;
CREATE TABLE quote(file VARCHAR(100));
INSERT INTO quote VALUES("churchill.txt");

CREATE TABLE customers(ID INTEGER, name VARCHAR(100), address VARCHAR(100), paymentdetails VARCHAR(100), state VARCHAR(20));
INSERT INTO customers VALUES(1, "Gloria Gotthilf", "Friedrichstrasse 26, 40625 Düsseldorf Gerresheim", "Visa-4716851224600760-851-01/2024", "hot");
INSERT INTO customers VALUES(2, "Maja Schneider", "Neumannallee 5/3, 94297 Kitzingen", "Bankeinzug-DE11359138763191573692-TGFGPTFX", "closed");
INSERT INTO customers VALUES(3, "Thomas Reichert", "Stephanstraße 1, 96549 Datteln", "MasterCard-5128219908297387-978-04/22", "follow now");
INSERT INTO customers VALUES(4, "Ingeburg Will", "Metin-Rose-Gasse 95, 00544 Wolfsburg", "Bankeinzug-DE58028872483244811718-EHMLUKVUD62", "hot");
INSERT INTO customers VALUES(5, "Edmund Fuchs", "Agnes-Meier-Allee 84c, 01241 Luckenwalde", "Visa-4929854409468394-235-02/23", "closed");
INSERT INTO customers VALUES(6, "Fred Winkler", "Karlstr. 3c, 97783 Waldshut-Tiengen", "", "cold");
INSERT INTO customers VALUES(7, "Silvia Forster", "Schmittstraße 44, 56709 Döbeln", "Bar", "closed");
