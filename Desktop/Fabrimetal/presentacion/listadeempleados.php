<?php 

require "../negocio/Empleado.php";

?>

<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
    
	<h1 class="display-3 text-center text-primary">LISTA DE EMPLEADOS</h1>

	<?php 

	$Empleados = new Empleado();
    $arrayEmpleados = $Empleados-> Listar(); 
    
    echo "<table border='2' class='table table-hover text-centered'>";
    echo "<tr class='table-active'>";
    echo "<th>NOMBRE</th>";
    echo "<th>D.N.I</th>";
    echo "<th>DIRECCION</th>";
    echo "<th>TELEFONO</th>";
    echo "<th>CARGO</th>";
    echo "</tr>";


    if($arrayEmpleados) {
        
        foreach($arrayEmpleados as $Emp ) {
        
            echo "<tr>";           
            echo "<td>" . $Emp->getNombre() . "</td>";
            echo "<td>" . $Emp->getDni() . "</td>";
            echo "<td>" . $Emp->getDireccion() . "</td>";
            echo "<td>" . $Emp->getTelefono() . "</td>";
            echo "<td>" . $Emp->getCargo() . "</td>";
            echo "</tr>";
        
        }        
   }
    
        echo "</table>"; 

	?>
    
</body>
</html>