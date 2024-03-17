<?php
include('/src/conexion.php');
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="logo.ico">
    
    <title>Formulario</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>

<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
	      
  <a class="navbar-brand" href="index.php">Inicio</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>

	<div class="containr">
		<div class="jumbotron mt-3">
		<h1>Generador de documentos</h1>
		<p class="lead">Trabajo para Taller de Testing y Calidad de Software, realizado por Juan Diaz</p> 

  <form  class="form-inline" action="actas.php" method="post" enctype="multipart/form-data">
	  	  
	  <input type="text" class="form-control mb-2 mr-sm-2" name="RUT"        placeholder="Rut, Sin puntos ni guion"  required maxlength="9" minlength="8"/>
	  <input type="name" class="form-control mb-2 mr-sm-2" name="Nombres"     placeholder="Nombres"  required />
	  <input type="lastname" class="form-control mb-2 mr-sm-2" name="Apellidos"   placeholder="Apellidos" required />
	  <input type="text" class="form-control mb-2 mr-sm-2" name="Direccion"  placeholder="Direccion" required />
	  <input type="text" class="form-control mb-2 mr-sm-2" name="Ciudad"     placeholder="Ciudad"  required />
	  <input type="text" class="form-control mb-2 mr-sm-2" name="Telefono"   placeholder="Telefono"  required />
	  <input type="email" class="form-control mb-2 mr-sm-2" name="Email"     placeholder="Email"  required />
    <input type="date" class="form-control mb-2 mr-sm-2" name="F_Nacimiento"      placeholder="F_Nacimiento" onfocus="(this.type='date')" required />
	  <select name="Est_Civil" class="form-control mb-2 mr-sm-2" required >
          <option value="0" selected>Estado Civil</option>
          <option value="Soltero">Soltero/a</option>
          <option value="Casado">Casado/a</option>
          <option value="Viudo">Viudo/a</option>
    </select>
	  <input type="text" class="form-control mb-2 mr-sm-2" name="Comentarios" placeholder="Comentarios"  required />
	  	
    <input type="submit" name="submit" value="Guardar" class="btn btn-lg btn-primary mb-2 mr-sm-2" />
    
    <input type="reset" name="reset" value="Borrar" class="btn btn-lg btn-secondary mb-2 mr-sm-2" />
	</form>
	</br>
  <form class="form-inline" action="" method="post" enctype="multipart/form-data">		  
	<input type="number" class="form-control mb-2 mr-sm-2" name="RUT" placeholder="Rut, Sin puntos ni guion" required maxlength="9"/>
	<input type="submit" value="Buscar" name="search" class="btn btn-lg btn-success" />
</form>
<hr>
<div class="jumbotron mt-3">
<h1>Resultados de registros realizados</h1>
        
<div class="">     
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Rut</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Direccion</th>
        <th>Ciudad</th>
        <th>Telefono</th>
        <th>Email</th>
        <th>Fecha Nacimiento</th>
        <th>Estado Civil</th>
        <th>Comentarios</th>
      </tr>
    </thead>
    <tbody>
    <?php
if(isset($_POST['search']))
{
    $RUT = $_POST['RUT'];
    $ret=mysqli_query($con,"SELECT * FROM Cliente where RUT like '%$RUT%'");
    $num=mysqli_num_rows($ret);
    if($num>0)
    {
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) 
    {
?>
            <tr> 
              <td><?php  echo $row['RUT'];?></td> 
              <td><?php  echo $row['Nombres'];?></td> 
              <td><?php  echo $row['Apellidos'];?></td>
              <td><?php  echo $row['Direccion'];?></td> 
              <td><?php  echo $row['Ciudad'];?></td> 
              <td><?php  echo $row['Telefono'];?></td> 
              <td><?php  echo $row['Email'];?></td> 
              <td><?php  echo $row['F_Nacimiento'];?></td> 
              <td><?php  echo $row['Est_Civil'];?></td> 
              <td><?php  echo $row['Comentarios'];?></td> 
            </tr>   
            <?php $cnt=$cnt+1; } } else {?>
            <tr>
              <td colspan="8"> No se encontró un RUT parecido al indicado</td>
            </tr>
<?php } }?></tbody> </table> 
</div>

      </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
  </body>
</html>