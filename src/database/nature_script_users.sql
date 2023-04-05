-- script de la création du user et du role

CREATE LOGIN xxxxx WITH PASSWORD = 'xxxxx', DEFAULT_DATABASE = nature;
GO

USE nature;
go

CREATE USER nature_cnn for login [xxxxx];
GO

CREATE ROLE nature_cnn_rol;
ALTER ROLE nature_cnn_rol ADD MEMBER nature_cnn;

-- C.R.U.D.
GRANT INSERT ON DATABASE::nature TO nature_cnn_rol;	-- Create
GRANT SELECT ON DATABASE::nature TO nature_cnn_rol;	-- Read
GRANT UPDATE ON DATABASE::nature TO nature_cnn_rol;	-- Update
GRANT DELETE ON DATABASE::nature TO nature_cnn_rol;	-- Delete
GO

USE master;
GO