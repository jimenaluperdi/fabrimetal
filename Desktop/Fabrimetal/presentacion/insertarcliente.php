<?php 

require_once "../negocio/Cliente.php";

?>

<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>

  <h2 class="display-3 text-center text-primary">INSERTAR NUEVO CLIENTE</h2>
<div>
  <form action="insertarcliente.php" method="post">
    <table border='3'class="container">
      <tr><td>Nombre: </td><td><input type="text" name="tbNombre" maxlength="250" size="150"></td></tr>
      <tr><td>D.N.I.: </td><td><input type="text" name="tbDni" maxlength="250" size="150"></td></tr>
      <tr><td>Email: </td><td><input type="text" name="tbEmail" maxlength="250" size="150"></td></tr>
      <tr><td>Direccion: </td><td><input type="text" name="tbDireccion" maxlength="250" size="150"></td></tr>
      <tr><td>Tipo: </td><td><input type="text" name="tbTipo" maxlength="250" size="150"></td></tr>        
    </table>
    <br>
    <input type="submit" value="INSERTAR" name="btInsertar" class="btn btn-primary">
  </form>
</div>
<?php

if (isset($_POST['btInsertar'])) {
           
        
   $objgCliente = new Cliente(null,$_POST['tbNombre'], $_POST['tbDni'], $_POST['tbEmail'], $_POST['tbDireccion'],$_POST['tbTipo']);
   
   $resultado = $objgCliente -> insertar();
   
   if ($resultado)
       echo "<p class='text-center text-primary'>Registro Insertado</p>";
   else
       echo "<p class='text-center text-primary'>Registro Insertado</p>";  
}

?>

</body>
</html>