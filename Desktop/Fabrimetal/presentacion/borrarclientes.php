<?php 

require "../negocio/Cliente.php"; 

?>

<html>
<head>    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>    
<body>
			
<h2 class="text-center display-3 text-primary">BORRAR / MODIFICAR CLIENTES</h2>

<?php

    $Cliente = new Cliente();
    $arrayClientes = $Cliente -> Listar();
?>

<form action="borrarclientes.php" method="post">
    Clientes:
          <select name="slClientes">
            <option value=""></option>  
        <?php foreach ($arrayClientes as $Cli) {?>
                 <option value="<?php echo $Cli->getIDClientes(); ?>"><?php echo $Cli->getNombre(); 
                 ?></option>  
        <?php } ?>
        </select>
    <br><br>
    <input type="submit" value="Mostrar" name="btMostrar" class="btn btn-primary">

<?php
   if (isset($_POST['btMostrar'])) {
       $CliMostrar = $Cliente -> buscarPorIDClientes($_POST['slClientes']);
?>

<br><br>
    <div class="container">
        <table border='4' class="table table-condensed">
            <tr><td>Clientes: </td><td><input type="text" name="tbIDClientes" maxlength="250" size="150" value=<?php echo $CliMostrar->getIDClientes(); ?>></td></tr>
            <tr><td>Nombre: </td><td><input type="text" name="tbNombre" maxlength="250" size="150" value=<?php echo $CliMostrar->getNombre(); ?>></td></tr>
            <tr><td>D.N.I: </td><td><input type="text" name="tbDni" maxlength="250" size="150" value=<?php echo $CliMostrar->getDni(); ?>></td></tr>
            <tr><td>EMAIL: </td><td><input type="text" name="tbEmail" maxlength="250" size="150" value=<?php echo $CliMostrar->getEmail(); ?>></td></tr>
            <tr><td>DIRECCION: </td><td><input type="text" name="tbDireccion" maxlength="250" size="150" value=<?php echo $CliMostrar->getDireccion(); ?>></td></tr>
            <tr><td>TIPO: </td><td><input type="text" name="tbTipo" maxlength="250" size="150" value=<?php echo $CliMostrar->getTipo(); ?>></td></tr>            
        </table>

        <br>
        <input type="submit" value="MODIFICAR CLIENTE" name="btModificar" class="btn btn-primary">
        <input type="submit" value="BORRAR CLIENTE" name="btBorrar" class="btn btn-primary">
    </div>
<?php 
} 
?>

<?php 

if (isset($_POST['btModificar']) or isset($_POST['btBorrar'])) {

        $CliModifi = new Cliente ( $_POST['tbIDClientes'], $_POST['tbNombre'], $_POST['tbDni'], $_POST['tbEmail'], $_POST['tbDireccion'], $_POST['tbTipo']);

        if (isset($_POST['btModificar'])) {

            $consulta = $CliModifi -> Modificar(); 

            if ($consulta)
                echo "<p class='text-center text-primary'>Registro Modificado</p>";

            else
                echo "<p class='text-center text-primary'>Error en la Modificación</p>";

        }

        else {

            $consulta = $CliModifi -> Eliminar();
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