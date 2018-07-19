<?php 

require "../negocio/Contacto.php";

?>

<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
	<H1 class="display-3 text-center text-primary">LISTA DE CONTACTOS</H1>

	<?php 
    //echo $consulta->ErrorInfo()[2];

	$Contacto = new Contacto();
    $arrayContactos = $Contacto-> Listar(); 
    
    echo "<table border='2'class='table table-hover text-centered'>";
    echo "<tr class='table-primary'>";    
    echo "<th>NOMBRE</th>";
    echo "<th>EMAIL</th>";
    echo "<th>TELEFONO</th>";
    echo "<th>TEXTO</th>";
    echo "<th>RESPONDIDO</th>";
    echo "<th>RESPUESTA</th>";
    echo "</tr>";
    
    if($arrayContactos) {
        
        foreach($arrayContactos as $Con ) {
        
            echo "<tr>";                     
            echo "<td>" . $Con->getNombre() . "</td>";
            echo "<td>" . $Con->getEmail() . "</td>";
            echo "<td>" . $Con->getTelefono() . "</td>";
            echo "<td>" . $Con->getTexto() . "</td>";
            echo "<td>" . $Con->getRespondido() . "</td>";
            echo "<td>" . $Con->getRespuesta() . "</td>";
            echo "</tr>";
        
        }        
   }
        
        echo "</table>"; 
	?>
</body>
</html>    