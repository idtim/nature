-- script des jeux de données

USE nature;

SET IDENTITY_INSERT Categories ON 
INSERT Categories(cat_id, cat_name) VALUES (1, N'Cours');
INSERT Categories(cat_id, cat_name) VALUES (2, N'Voyages');
SET IDENTITY_INSERT Categories OFF

SET IDENTITY_INSERT Articles ON 
INSERT Articles(art_id, art_date, art_date_update, art_title, art_slug, art_content, art_cat_id) VALUES (1, CAST(N'2015-05-18T00:00:00.000' AS DateTime), NULL, N'Cours #1 : La règle des tiers', N'regle-des-tiers', N'Placez le sujet principal à une intersection de la grille', 1);
INSERT Articles(art_id, art_date, art_date_update, art_title, art_slug, art_content, art_cat_id) VALUES (2, CAST(N'2017-10-25T00:00:00.000' AS DateTime), NULL, N'Le Maroc : un pays haut en couleurs', N'le-maroc', N'Ce 2ème voyage au Maroc avait une touche particulière car...', 2);
SET IDENTITY_INSERT Articles OFF

SET IDENTITY_INSERT Coeff ON
INSERT Coeff(coe_id, coe_value) VALUES (1, 1);
INSERT Coeff(coe_id, coe_value) VALUES (2, 2);
SET IDENTITY_INSERT Coeff OFF

SET IDENTITY_INSERT Continents ON
INSERT Continents(con_id, con_name) VALUES (1, N'Afrique');
INSERT Continents(con_id, con_name) VALUES (2, N'Amérique');
INSERT Continents(con_id, con_name) VALUES (3, N'Antarctique');
INSERT Continents(con_id, con_name) VALUES (4, N'Asie');
INSERT Continents(con_id, con_name) VALUES (5, N'Europe');
INSERT Continents(con_id, con_name) VALUES (6, N'Océanie');
SET IDENTITY_INSERT Continents OFF

SET IDENTITY_INSERT Countries ON
INSERT Countries(cou_id, cou_name, cou_con_id) VALUES (1, N'France', 5);
INSERT Countries(cou_id, cou_name, cou_con_id) VALUES (2, N'Espagne', 5);
INSERT Countries(cou_id, cou_name, cou_con_id) VALUES (3, N'Italie', 1);
SET IDENTITY_INSERT Countries OFF

SET IDENTITY_INSERT Cities ON
INSERT Cities(cit_id, cit_name, cit_zip, cit_cou_id) VALUES (1, N'Paris', 75000, 1);
INSERT Cities(cit_id, cit_name, cit_zip, cit_cou_id) VALUES (2, N'Madrid', 28001, 2);
INSERT Cities(cit_id, cit_name, cit_zip, cit_cou_id) VALUES (3, N'Rome', 00042, 3);
INSERT Cities(cit_id, cit_name, cit_zip, cit_cou_id) VALUES (4, N'Bordeaux', 33000, 1);
SET IDENTITY_INSERT Cities OFF

SET IDENTITY_INSERT Customers ON
INSERT Customers(cus_id, cus_lastname, cus_firstname, cus_username, cus_mail, cus_password, cus_role, cus_address, cus_address_add, cus_points, cus_path_avatar, cus_ranking, cus_cit_id, cus_cou_id) VALUES (1, NULL, NULL, N'admin', N'admin@nature.com', N'admin', N'admin', NULL, NULL, 1000000, NULL, 1, NULL, NULL);
INSERT Customers(cus_id, cus_lastname, cus_firstname, cus_username, cus_mail, cus_password, cus_role, cus_address, cus_address_add, cus_points, cus_path_avatar, cus_ranking, cus_cit_id, cus_cou_id) VALUES (2, NULL, NULL, N'user', N'user@nature.com', N'user', N'user', NULL, NULL, 500000, NULL, 2, 4, 1);
SET IDENTITY_INSERT Customers OFF

SET IDENTITY_INSERT Photos ON
INSERT Photos(pho_id, pho_name, pho_date, pho_description, pho_path, pho_otd, pho_show, pho_sale, pho_views, pho_sales, pho_cou_id, pho_coe_id) VALUES (1, N'Crépuscule', CAST(N'2014-01-18T00:00:00.000' AS DateTime), NULL, N'.\assets\pictures\1_crepuscule.jpg', 0, 1, 1, 0, 0, 1, 1);
INSERT Photos(pho_id, pho_name, pho_date, pho_description, pho_path, pho_otd, pho_show, pho_sale, pho_views, pho_sales, pho_cou_id, pho_coe_id) VALUES (2, N'Fin', CAST(N'2014-01-18T00:00:00.000' AS DateTime), NULL, N'.\assets\pictures\2_fin.jpg', 1, 1, 1, 0, 0, 1, 2);
INSERT Photos(pho_id, pho_name, pho_date, pho_description, pho_path, pho_otd, pho_show, pho_sale, pho_views, pho_sales, pho_cou_id, pho_coe_id) VALUES (3, N'Feu', CAST(N'2014-01-18T00:00:00.000' AS DateTime), NULL, N'.\assets\pictures\3_feu.jpg', 0, 1, 1, 0, 0, 1, 2);
INSERT Photos(pho_id, pho_name, pho_date, pho_description, pho_path, pho_otd, pho_show, pho_sale, pho_views, pho_sales, pho_cou_id, pho_coe_id) VALUES (4, N'Soir', CAST(N'2014-01-18T00:00:00.000' AS DateTime), NULL, N'.\assets\pictures\4_soir.jpg', 0, 1, 1, 0, 0, 1, 1);
INSERT Photos(pho_id, pho_name, pho_date, pho_description, pho_path, pho_otd, pho_show, pho_sale, pho_views, pho_sales, pho_cou_id, pho_coe_id) VALUES (5, N'Excelsior', CAST(N'2014-01-18T00:00:00.000' AS DateTime), NULL, N'.\assets\pictures\5_excelsior.jpg', 0, 1, 1, 0, 0, 1, 1);
SET IDENTITY_INSERT Photos OFF