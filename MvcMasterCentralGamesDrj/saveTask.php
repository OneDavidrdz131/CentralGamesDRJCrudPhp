<?php

include('db.php');

if (isset($_POST['guardar'])) {
  $id_producto=$_POST['idproducto'];
  $nombre = $_POST['Nombre'];
  $n_barras = $_POST['NumeroBarras'];
  $precio=$_POST['Precio'];
  $cantidad=$_POST['Cantidad'];
  $marca=$_POST['Marca'];
  $caracteristicas=$_POST['Caracteristicas'];
  $query = "INSERT INTO Tbl_Productos(id_producto,Nombre,num_de_barras,precio,cantidad,marca,caracteristicas) VALUES ('$id_producto','$nombre', '$n_barras','$precio','$cantidad','$marca','$caracteristicas')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Guardado Correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>