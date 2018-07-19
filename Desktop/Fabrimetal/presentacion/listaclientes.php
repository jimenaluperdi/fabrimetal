<?php 

require "../negocio/Cliente.php";

?>

<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>

   <h2 class="text-center display-3 text-primary">LISTA DE CLIENTES</h2>

<?php 

    $Cliente = new Cliente();
    $arrayClientes = $Cliente-> Listar(); 
    
    echo "<table border='3' class='table table-hover text-centered'>";
    echo "<tr class='table-success'>";    
    echo "<th>NOMBRE</th>";
    echo "<th>D.N.I</th>";
    echo "<th>EMAIL</th>";
    echo "<th>DIRECCION</th>";
    echo "<th>TIPO</th>";
    echo "</tr>";

    if($arrayClientes) {
        
        foreach($arrayClientes as $Clie ) {
        
            echo "<tr>";           
            echo "<td>" . $Clie->getNombre() . "</td>";
            echo "<td>" . $Clie->getDni() . "</td>";
            echo "<td>" . $Clie->getEmail() . "</td>";
            echo "<td>" . $Clie->getDireccion() . "</td>";
            echo "<td>" . $Clie->getTipo() . "</td>";
            echo "</tr>";
        
        }        
    }
    
        echo "</table>"; 

?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>
</html>