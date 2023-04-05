-- script de la création de la BDD et des tables

CREATE DATABASE nature;

USE nature;

CREATE TABLE Categories(
	cat_id				INT IDENTITY(1, 1) PRIMARY KEY NOT NULL,
	cat_name			VARCHAR(50) NOT NULL,
);

CREATE TABLE Medias(
	med_id				INT IDENTITY(1, 1) PRIMARY KEY NOT NULL,
	med_path			VARCHAR(255) NOT NULL,						
);

CREATE TABLE Articles(
	art_id				INT IDENTITY(1, 1) PRIMARY KEY NOT NULL,
	art_date			DATE NOT NULL,
	art_date_update		DATE,
	art_title			VARCHAR(50) NOT NULL,
	art_slug			VARCHAR(50) NOT NULL,
	art_content			TEXT NOT NULL,
	art_cat_id			INT NOT NULL,
	CONSTRAINT FK_ARTICLES_CATEGORIES FOREIGN KEY(art_cat_id) REFERENCES Categories(cat_id),
);

CREATE TABLE Illustrate(
	ill_id				INT IDENTITY(1, 1) PRIMARY KEY NOT NULL,
	ill_art_id			INT NOT NULL,
	ill_med_id			INT NOT NULL,
	CONSTRAINT FK_ILLUSTRATE_ARTICLES FOREIGN KEY(ill_art_id) REFERENCES Articles(art_id),
	CONSTRAINT FK_ILLUSTRATE_MEDIAS FOREIGN KEY(ill_med_id) REFERENCES Medias(med_id),
);


CREATE TABLE Continents(
	con_id				INT IDENTITY(1, 1) PRIMARY KEY NOT NULL,
	con_name			VARCHAR(50) NOT NULL,
);

CREATE TABLE Countries(
	cou_id				INT IDENTITY(1, 1) PRIMARY KEY NOT NULL,
	cou_name			VARCHAR(50) NOT NULL,
	cou_con_id			INT NOT NULL,
	CONSTRAINT FK_COUNTRIES_CONTINENTS FOREIGN KEY(cou_con_id) REFERENCES Continents(con_id),
);

CREATE TABLE Cities(
	cit_id				INT IDENTITY(1, 1) PRIMARY KEY NOT NULL,
	cit_name			VARCHAR(50) NOT NULL,
	cit_zip				INT NOT NULL,
	cit_cou_id			INT NOT NULL,
	CONSTRAINT FK_CITIES_COUNTRIES FOREIGN KEY(cit_cou_id) REFERENCES Countries(cou_id),
);

CREATE TABLE Customers(
	cus_id				INT IDENTITY(1, 1) PRIMARY KEY NOT NULL,
	cus_lastname		VARCHAR(50),
	cus_firstname		VARCHAR(50),
	cus_username		VARCHAR(50) UNIQUE NOT NULL,
	cus_mail			VARCHAR(50) NOT NULL,
	cus_password		VARCHAR(50)	NOT NULL,
	cus_role			VARCHAR(50) NOT NULL,
	cus_address			VARCHAR(50),
	cus_address_add		VARCHAR(50),
	cus_points			INT NOT NULL,
	cus_path_avatar		VARCHAR(255),
	cus_ranking			INT NOT NULL,
	cus_cit_id			INT,
	cus_cou_id			INT,
	CONSTRAINT FK_CUSTOMERS_CITIES FOREIGN KEY(cus_cit_id) REFERENCES Cities(cit_id),
	CONSTRAINT FK_CUSTOMERS_COUNTRIES FOREIGN KEY(cus_cou_id) REFERENCES Countries(cou_id),
);

CREATE TABLE Coeff(
	coe_id				INT IDENTITY(1, 1) PRIMARY KEY NOT NULL,
	coe_value			INT NOT NULL,
);

CREATE TABLE Photos(
	pho_id				INT IDENTITY(1, 1) PRIMARY KEY NOT NULL,
	pho_name			VARCHAR(50) NOT NULL,
	pho_date			DATE NOT NULL,
	pho_description		TEXT,
	pho_path			VARCHAR(255) NOT NULL,
	pho_otd				BIT NOT NULL,			-- otd = of the day
	pho_show			BIT NOT NULL,
	pho_sale			BIT NOT NULL,
	pho_views			INT NOT NULL,
	pho_sales			INT NOT NULL,
	pho_cou_id			INT NOT NULL,
	pho_coe_id			INT NOT NULL,
	CONSTRAINT FK_PHOTOS_COUNTRIES FOREIGN KEY(pho_cou_id) REFERENCES Countries(cou_id),
	CONSTRAINT FK_PHOTOS_COEFF FOREIGN KEY(pho_coe_id) REFERENCES Coeff(coe_id),
);

CREATE TABLE Works(
	wor_id				INT IDENTITY(1, 1) PRIMARY KEY NOT NULL,
	wor_name			VARCHAR(50) NOT NULL,
	wor_date			DATE NOT NULL,
	wor_description		TEXT,
);

CREATE TABLE List(
	lis_id				INT IDENTITY(1, 1) PRIMARY KEY NOT NULL,
	lis_wor_id			INT NOT NULL,
	lis_pho_id			INT NOT NULL,
	CONSTRAINT FK_LIST_WORKS FOREIGN KEY(lis_wor_id) REFERENCES Works(wor_id),
	CONSTRAINT FK_LIST_PHOTOS FOREIGN KEY(lis_pho_id) REFERENCES Photos(pho_id),
);

CREATE TABLE Discounts(
	dis_id				INT IDENTITY(1, 1) PRIMARY KEY NOT NULL,
	dis_value			INT NOT NULL,
);

CREATE TABLE Products(
	pro_id				INT IDENTITY(1, 1) PRIMARY KEY NOT NULL,
	pro_name			VARCHAR(50) NOT NULL,
	pro_price			DECIMAL(6,2) NOT NULL,
	pro_pho_id			INT NOT NULL,
	pro_dis_id			INT NOT NULL,
	CONSTRAINT FK_PRODUCTS_PHOTOS FOREIGN KEY(pro_pho_id) REFERENCES Photos(pho_id),
	CONSTRAINT FK_PRODUCTS_DISCOUNTS FOREIGN KEY(pro_dis_id) REFERENCES Discounts(dis_id),
);

CREATE TABLE Orders_Details(
	ode_id				INT IDENTITY(1, 1) PRIMARY KEY NOT NULL,
	ode_quantity		INT NOT NULL,
	ode_dis_id			INT NOT NULL,
	ode_pro_id			INT NOT NULL,
	CONSTRAINT FK_ORDERS_D_DISCOUNTS FOREIGN KEY(ode_dis_id) REFERENCES Discounts(dis_id),
	CONSTRAINT FK_ORDERS_D_PRODUCTS FOREIGN KEY(ode_pro_id) REFERENCES Products(pro_id),
);

CREATE TABLE Status_O(
	sta_id				INT IDENTITY(1, 1) PRIMARY KEY NOT NULL,
	sta_name			VARCHAR(50) NOT NULL,
);

CREATE TABLE Orders(
	ord_id				INT IDENTITY(1, 1) PRIMARY KEY NOT NULL,
	ord_date			DATE NOT NULL,
	ord_date_send		DATE,
	ord_date_receipt	DATE,
	ord_date_payment	DATE,
	ord_sta_id			INT NOT NULL,
	ord_cus_id			INT NOT NULL,
	ord_dis_id			INT NOT NULL,
	ord_ode_id			INT NOT NULL,
	CONSTRAINT FK_ORDERS_STATUS_O FOREIGN KEY(ord_sta_id) REFERENCES Status_O(sta_id),
	CONSTRAINT FK_ORDERS_CUSTOMERS FOREIGN KEY(ord_cus_id) REFERENCES Customers(cus_id),
	CONSTRAINT FK_ORDERS_DISCOUNTS FOREIGN KEY(ord_dis_id) REFERENCES Discounts(dis_id),
	CONSTRAINT FK_ORDERS_ORDERS_D FOREIGN KEY(ord_ode_id) REFERENCES Orders_Details(ode_id),
);

ALTER TABLE Orders ADD ord_cus_id INT NOT NULL
ALTER TABLE Orders ADD CONSTRAINT FK_ORDERS_CUSTOMERS FOREIGN KEY(ord_cus_id) REFERENCES Customers(cus_id)