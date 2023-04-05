-- script des requêtes

USE nature;
go

DELETE FROM Articles WHERE art_id = 18;

SELECT * FROM Customers WHERE cus_mail = 'admin@nature.com';

SELECT * FROM Customers;

SELECT * FROM Photos WHERE pho_otd = 1;