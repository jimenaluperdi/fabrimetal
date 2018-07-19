<?php 

require_once "../negocio/Contacto.php";
   
?>

<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>
    
    <h1 class="text-center display-3 text-primary">BORRAR / MODIFICAR CONTACTOS</h1>

<?php
    $Contacto = new Contacto();
    $arrayContactos = $Contacto -> Listar();
?>

<form action="borrarcontacto.php" method="post">
    Contactos:
    <select name="slContactos">
        <option value=""></option>  
    <?php foreach ($arrayContactos as $Conta) {?>
               <option value="<?php echo $Conta->getIDContacto(); ?>"><?php echo $Conta->getNombre(); ?></option>  
    <?php } ?>
    </select>
    <br><br>
    <input type="submit" value="Mostrar" name=btMostrar class="btn btn-primary">

<?php
   if (isset($_POST['btMostrar'])) {
       $ContMostar = $Contacto -> buscarPorIDContacto($_POST['slContactos']);
?>

<br><br>
    <div class="container">    
        <table border='3'>
            <input type="hidden" name="tbIDContacto" value=<?php echo $ContMostar->getIDContacto(); ?>            
            <tr><td>Nombre: </td><td><input type="text" name="tbNombre" maxlength="250" size="150" value=<?php echo $ContMostar->getNombre(); ?>></td></tr>
            <tr><td>Email: </td><td><input type="text" name="tbEmail" maxlength="250" size="150" value=<?php echo $ContMostar->getEmail(); ?>></td></tr>
            <tr><td>Telefono: </td><td><input type="text" name="tbTelefono" maxlength="250" size="150" value=<?php echo $ContMostar->getTelefono(); ?>></td></tr>
            <tr><td>Texto: </td><td><input type="text" name="tbTexto" maxlength="250" size="150" value=<?php echo $ContMostar->getTexto(); ?>></td></tr> 
            <tr><td>Respondido: </td><td><input type="text" name="tbRespondido" maxlength="250" size="150" value=<?php echo $ContMostar->getRespondido(); ?>></td></tr>
            <tr><td>Respuesta: </td><td><input type="text" name="tbRespuesta" maxlength="250" size="150" value=<?php echo $ContMostar->getRespuesta(); ?>></td></tr>           
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

        $ContaModi = new Contacto ($_POST['tbIDContacto'], $_POST['tbNombre'], $_POST['tbEmail'], $_POST['tbTelefono'], $_POST['tbTexto'], $_POST['tbRespondido'], $_POST['tbRespuesta']);

        if (isset($_POST['btModificar'])) {

            $consulta = $ContaModi -> Modificar(); 
           
            if ($consulta)
                echo "<p class='text-center text-primary'>Registro Modificado</p>";

            else
                echo "<p class='text-center text-primary'>Error en la Modificación</p>";

        }

        else {

            $consulta = $ContaModi -> Eliminar();
            if ($consulta)
                echo "<p class='text-center text-primary'>Registro Elininado</p>";
            else
                echo "<p class='text-center text-primary'>Error en la Eliminacion</p>";
        }        
       
    }
  
?> 
</form>