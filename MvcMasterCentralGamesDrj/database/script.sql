CREATE DATABASE CentralGamesDrj;

use CentralGamesDrj;

CREATE TABLE Tbl_Productos(
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  id_Producto int(255) NOT NULL,
  Nombre varchar(150),
  num_de_barras int(13),
  precio int(5),
  cantidad int(10),
  marca varchar(50),
  caracteristicas varchar(100),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

DESCRIBE Tbl_Productos;