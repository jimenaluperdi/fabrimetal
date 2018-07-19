<?php 

require_once "../negocio/Empleado.php";

?>

<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>
    
    <h1 class="text-center display-3 text-primary">BORRAR / MODIFICAR EMPLEADOS</h1>

<?php
    $Empleado = new Empleado();
    $arrayEmpleados = $Empleado -> Listar();
?>

<form action="borrarempleados.php" method="post">
    Empleados:
    <select name="slEmpleados">
        <option value=""></option>  
    <?php foreach ($arrayEmpleados as $Emp) {?>
               <option value="<?php echo $Emp->getIDEmpleado(); ?>"><?php echo $Emp->getNombre(); ?></option>  
    <?php } ?>
    </select>
    <br><br>
    <input type="submit" value="Mostrar" name=btMostrar class="btn btn-primary">

<?php
   if (isset($_POST['btMostrar'])) {
       $EmpMostrar = $Empleado -> buscarPorIDEmpleado($_POST['slEmpleados']);
?>

<br><br>
    <div class="container">
        <table border='3' class="table table-condensed">
            <tr><td>Empleados: </td><td><input type="text" name="tbIDEmpleado" maxlength="250" size="150" value=<?php echo $EmpMostrar->getIDEmpleado(); ?>></td></tr>
            <tr><td>Nombre: </td><td><input type="text" name="tbNombre" maxlength="250" size="150" value=<?php echo $EmpMostrar->getNombre(); ?>></td></tr>
            <tr><td>D.N.I: </td><td><input type="text" name="tbDni" maxlength="250" size="150" value=<?php echo $EmpMostrar->getDni(); ?>></td></tr>
            <tr><td>DIRECCION: </td><td><input type="text" name="tbDireccion" maxlength="250" size="150" value=<?php echo $EmpMostrar->getDireccion(); ?>></td></tr>
            <tr><td>TELEFONO: </td><td><input type="text" name="tbTelefono" maxlength="250" size="150" value=<?php echo $EmpMostrar->getTelefono(); ?>></td></tr>
            <tr><td>CARGO: </td><td><input type="text" name="tbCargo" maxlength="250" size="150" value=<?php echo $EmpMostrar->getCargo(); ?>></td></tr>            
        </table>
        <br>
        <input type="submit" value="MODIFICAR" name="btModificar" class="btn btn-primary">
        <input type="submit" value="BORRAR" name="btBorrar" class="btn btn-primary">
    </div>
<?php 
} 
?>

<?php 

if (isset($_POST['btModificar']) or isset($_POST['btBorrar'])) {

        $EmpModificar = new Empleado ($_POST['tbIDEmpleado'], $_POST['tbNombre'], $_POST['tbDni'], $_POST['tbDireccion'], $_POST['tbTelefono'], $_POST['tbCargo']);

        if (isset($_POST['btModificar'])) {

            $consulta = $EmpModificar -> Modificar(); 

            if ($consulta)
                echo "<p class='text-center text-primary'>Registro Modificado</p>";

            else
                echo "<p class='text-center text-primary'>Error en la Modificación</p>";

        }

        else {

            $consulta = $EmpModificar -> Eliminar();
            if ($consulta)
                echo "<p class='text-center text-primary'>Registro Elininado</p>";
            else
                echo "<p class='text-center text-primary'>Error en la Eliminacion</p>";
        }        
       
    }
  
?> 
</form>
</body>
</html>       