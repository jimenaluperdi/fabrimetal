<?php 
require "../negocio/Empleado.php";

?>

<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
    
<h1 class="display-3 text-center text-primary">INSERTAR NUEVO EMPLEADO</h1>

<form action="insertarempleados.php" method="post">
    <table border='2' class='table table-condensed'>
        <tr><td>Nombre: </td><td><input type="text" name="tbNombre" maxlength="250" size="150"> </td></tr>
        <tr><td>D.N.I.: </td><td><input type="text" name="tbDni" maxlength="250" size="150"></td></tr>
        <tr><td>Direccion: </td><td><input type="text" name="tbDireccion" maxlength="250" size="150"></td></tr>
        <tr><td>Telefono: </td><td><input type="text" name="tbTelefono" maxlength="250" size="150"></td></tr>
        <tr><td>Cargo: </td><td><input type="text" name="tbCargo" maxlength="250" size="150"></td></tr>        
    </table>
    <br>
    <input type="submit" value="INSERTAR" name="btInsertarEmpleado" class="btn btn-primary">
</form>

<?php

if (isset($_POST['btInsertarEmpleado'])) {
           
        
   $objgEmpleados = new Empleado(null, $_POST['tbNombre'], $_POST['tbDni'], $_POST['tbDireccion'], $_POST['tbTelefono'],$_POST['tbCargo']);
   
   $resultado = $objgEmpleados -> insertar();

   if ($resultado)
       echo "Registro Insertado";
   else
       echo "Error en la Inserción";   
}

?>

</body>
</html>
