<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MENSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="saveTask.php" method="POST">

          <div class="form-group">
            <textarea name="idproducto"  class="form-control" placeholder="id del Producto"></textarea>
          </div>
          <div class="form-group">
            <input type="text" name="Nombre" class="form-control" placeholder="NOMBRE" autofocus>
          </div>
          <div class="form-group">
            <textarea name="NumeroBarras"  class="form-control" placeholder="Numero de barras"></textarea>
          </div>
          <div class="form-group">
            <textarea name="Precio"  class="form-control" placeholder="Precio"></textarea>
          </div>
          <div class="form-group">
            <textarea name="Cantidad"  class="form-control" placeholder="Cantidad"></textarea>
          </div>
          <div class="form-group">
            <textarea name="Marca"  class="form-control" placeholder="Marca"></textarea>
          </div>
          <div class="form-group">
            <textarea name="Caracteristicas"  class="form-control" placeholder="Caracteristicas"></textarea>
          </div>
          <input type="submit" name="guardar" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>ID del Producto</th>
            <th>Nombre</th>
            <th>Numero de Barras</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Marca</th>
            <th>Caracteristicas</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM Tbl_Productos";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['id_Producto']; ?></td>
            <td><?php echo $row['Nombre']; ?></td>
            <td><?php echo $row['num_de_barras']; ?></td>
            <td><?php echo "$". $row['precio']; ?></td>
            <td><?php echo $row['cantidad']; ?></td>
            <td><?php echo $row['marca']; ?></td>
            <td><?php echo $row['caracteristicas']; ?></td>
            
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="deleteTask.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>