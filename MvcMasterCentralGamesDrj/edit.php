<?php
include("db.php");
  $id_producto='';
  $nombre = '';
  $n_barras ='';
  $precio='';
  $cantidad='';
  $marca='';
  $caracteristicas='';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM Tbl_Productos WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
      $id_producto=$row['id_Producto'];
      $nombre = $row['Nombre'];
      $n_barras = $row['num_de_barras'];
      $precio=$row['precio'];
      $cantidad=$row['cantidad'];
      $marca=$row['marca'];
      $caracteristicas=$row['caracteristicas'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre= $_POST['Nombre'];
  $n_barras =$_POST['numbarras'];
  $precio = $_POST['precio'];
  $cantidad = $_POST['cantidad'];
  $marca = $_POST['marca'];
  $caracteristicas = $_POST['caracteristicas'];



  $query = "UPDATE Tbl_Productos set Nombre = '$nombre', num_de_barras = '$n_barras',precio='$precio',cantidad='$cantidad',marca='$marca',caracteristicas='$caracteristicas' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Editado correctaMente';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="Nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="numbarras" type="text" class="form-control" value="<?php echo $n_barras; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="precio" type="text" class="form-control" value="<?php echo $precio; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="cantidad" type="text" class="form-control" value="<?php echo $cantidad; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="marca" type="text" class="form-control" value="<?php echo $marca; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
        <textarea name="caracteristicas" class="form-control" cols="30" rows="10"><?php echo $caracteristicas;?></textarea>
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>