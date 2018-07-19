<?php

require_once "../negocio/Contacto.php";
 
?> 

<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>

	<a href="estamos.html" class="btn btn-primary">Volver</a>

<?php 

    if (isset($_POST['btEnviar'])) { 

       
        $objContacto = new Contacto(null, $_POST['nombre'], $_POST['email'], $_POST['telefono'], $_POST['mensaje'], null, null);  
        $objContacto -> insertar();
        
        if ($objContacto){
            echo "<p>Formulario Insertado, Nos pondremos en contacto con usted.</p>";

        }else
            echo "<p>Error en la Inserción, Vuelva a Intentarlo.</p>";
    }     	
?> 

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
 
</body>
</html>