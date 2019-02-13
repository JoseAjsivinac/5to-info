<!DOCTYPE html>
<html>
<head>
	<title>registro  de datos</title>
	<link rel="stylesheet" type="text/css" href="css/materialize.css">
	<h1><h1>Registro
</head>

<body>

<div class="row">
  <div class="col-md-4"></div>

<!-- INICIA LA COLUMNA -->


  <div class="col-md-4">

    <center><h1>PROPIETARIO</h1></center>

    <form method="POST" action="registro.php" >

    <div class="form-group">
      <label for="doc">Documento</label>
      <input type="text" name="doc" class="form-control" id="doc">
    </div>

    <div class="form-group">
        <label for="nombre">Nombre </label>
        <input type="text" name="nombre" class="form-control" id="nombre" >
    </div>

    <div class="form-group">
        <label for="dir">Direccion </label>
        <input type="text" name="dir" class="form-control" id="dir">
    </div>

    <div class="form-group">
        <label for="tel">Telefono </label>
        <input type="text" name="tel" class="form-control" id="tel">
    </div>
    
    <center>
      <input type="submit" value="Registrar" class="btn btn-success" name="btn_registrar">
      <input type="submit" value="Consultar" class="btn btn-primary" name="btn_consultar">
      <input type="submit" value="Actualizar" class="btn btn-info" name="btn_actualizar">
      <input type="submit" value="Eliminar" class="btn btn-danger" name="btn_eliminar">
    </center>

  </form>

  <?php
    include("abri_conexion.php");
      
      $doc    ="";
      $nombre ="";
      $dir    ="";
      $tel    ="";



      // boton de registro --------------------------------------------------------
      if(isset($_POST['btn_registrar']))
      {      
        //echo "Presiono el boton Registrar";
        $doc = $_POST['doc'];
        $nombre = $_POST['nombre'];
        $dir = $_POST['dir'];
        $tel = $_POST['tel'];
        //$doc = $_POST['doc'];
      	// si el documento no existe
      	//$existe=0;

      	if($doc==""||$nombre== "" || $dir=="")
      	{
      		echo "los campos son obligatorios";
      	}
      	else{
      		 mysqli_query($conexion, "INSERT INTO $tabla_db1  (doc,nombre,direccion,telefono)
      		  values  
      		 ('$doc','$nombre','$dir','tel')");      
      		}

      	}

      	// bponton de consulta-------------------------------------------------
      if(isset($_POST['btn_consultar']))
      {
      	$doc = $_POST['doc'];
      	// si el documento no existe
      	$existe=0;

      	if($doc==""){
      		echo "El campo documento es obligatorio ingresar";
      	}
      	else{
      		$resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 where doc='$doc'");
 		 while($consulta = mysqli_fetch_array($resultados))
 		 {
 		 	echo $consulta ['doc'],"<br>";
 		 	echo $consulta ['nombre'],"<br>";
 		 	echo $consulta ['direccion'],"<br>";
 		 	echo $consulta ['telefono'],"<br>";
 		 	$existe++;

    		//$variable=$consulta['campo_mysql'];
  		}
  		if($existe==0){
  			echo "El documento no existe";
  		}

      	}
        //echo "Presiono el boton consultar";
         
      }




/// boton de actualizar---------------------------------
      if(isset($_POST['btn_actualizar']))
      {
      	/*
        echo "Presiono el boton actualizar";*/
         //echo "Presiono el boton Registrar";
        $doc = $_POST['doc'];
        $nombre = $_POST['nombre'];
        $dir = $_POST['dir'];
        $tel = $_POST['tel'];
        //$doc = $_POST['doc'];
      	// si el documento no existe
      	//$existe=0;

      	if($doc==""||$nombre== "" || $dir=="")
      	{
      		echo "los campos son obligatorios";
      	}
      	else{
			  $_UPDATE_SQL="UPDATE $tabla_db1 Set 
			  doc='$doc', 
			  nombre ='$nombre',
			  direccion='$dir',
			  telefono='$tel'

			  WHERE doc='$doc'"; 

			  mysqli_query($conexion,$_UPDATE_SQL);   
      		}
      }



      /// boton eliminar------------------------------

      if(isset($_POST['btn_eliminar']))
      {
        echo "Presiono el boton eliminar";
      }

      //include("cerrar_conexion.php");
   // include("cerrar_conexion.php");
  ?>

  </div>


<!-- TERMINA LA COLUMNA -->



  <div class="col-md-4"></div>
</div>

	

</body>
</html>
