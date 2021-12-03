<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tarea 2 </title>

 <style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

* {
  box-sizing: border-box;
  margin: 5px;
  padding: 5px;
}

 body{
 	background: #F3F3F3;
 }
  .contenedor{
  	display: flex;
  	flex-direction: column;
  	margin: auto;
  	width: 80%;
  }
  .article{
  	display: flex;
  	flex-direction: column;
  	margin: auto;
  }

 table {
 	
    border: #161616 0px solid;
 	padding: 5px;
 } 	
 table  td {
 	border: 0px solid;
 	padding: 5px;
 	
 	color: #161616;
 	text-align: center;
 	font-family: 'Roboto', sans-serif;
 } 
 table th{
 	background: #da0939;
 	text-align: center;
 	color: white;
 	font-family: 'Roboto', sans-serif;
 } 
 table p {
 	color: white;
 }


  h2{
  	font-family: 'Roboto', sans-serif;
  	color: #161616;
  }
  p{
  	font-family: 'Roboto', sans-serif;
  	color: #161616;

  }

 </style>

</head>
<body>



 <div class="contenedor">	
  <header class="header">
   	<table>
   		<tr>
   			<th><p>Nombre</p></th>
   			<th><p>Apellidos</p></th>
   			<th><p>Asignatura</p></th>
   			<th><p>Tarea Nº</p></th>
   		</tr>
   		<tr>
   			<td>Andrés</td>
   			<td>Rojas Vico</td>
   			<td>DWES</td>
   			<td>2</td>
   		</tr>
   	</table>

  </header>

    



  <article class="article">
	  <div class="agenda">
	  	<h2>Agenda</h2>
<?php 


             
             


             // variables de sesion
          session_start();
         
     if (isset($_POST['enviar'])) { //compruevo que  llega algo por post 
                  // 
           $nombre=$_POST['nombre'];
                //$telefono=$_POST['variable']['telefono'];
           $telefono=$_POST['telefono'];

            echo"el nombre recivido es " . $nombre;
            echo "<br/>";
            echo"el telefono recivido es " . $telefono;

           // $arrayDatos= array($nombre=>$telefono);

            if(!isset($_SESSION['datos'])){//si no existe variable de sesion  la creo
               $_SESSION['datos']= array(); 
               // $agenda=$_SESSION['datos'];
               echo "se ha creado una  array datos";
               $_SESSION['datos'][$nombre]=[$telefono]; // asigno valores si no  existe  la variable sesion
            }else{
               $_SESSION['datos'][$nombre]=[$telefono];//asigno valores  si existe la variable sesion
              }
        }else{// fin  isset($_get['enviar'])
           $_SESSION['datos']= array(); 
               // $agenda=$_SESSION['datos'];
               echo "se ha creado una  array datos"; 

        }
                     

             ?>
         
	  	 <table>
          <tr>
          	<th><p>Nombre</p></th>
          	<th><p>Telefono</p></th>
          </tr>
          <?php
          foreach ($_SESSION['datos'] as $nombre => $telefono) {
             	echo "<tr>";
                echo "<td>";
                echo $nombre;
                echo "</td>";
                     foreach ($telefono as $ke => $Va) {
                                echo "<td>";
                                echo $Va;
                                echo "</td>"; 
                           } 
                echo "</tr>";
                 
             }  
         
?>
         </table> 
	  </div>
	  <div class="nuevoContacto">
	  	<h2>Nuevo contacto</h2>

	  <!-- formulario -->
         <form action="#" method="post" name="form1">
         	<table>
         	<tr>
         		<td>Nombre</td><td><input type="text" name="nombre" placeholder="nombre" required></td>
         	</tr>
              
         	<tr>
         		<td>Telefono</td><td><input type="number" name="telefono" placeholder="telefono" required></td>
         	</tr>
            </table>

         	 <!--<input type="hidden" name="agenda" value="<?php echo $datosAgenda ?>">-->
             <input type="submit" name="enviar" value="Añadir contacto">
             <input type="reset" name="enviar" value="Limpiar" >
         </form> 
          

	  </div>
	  <div class="vaciar">
	  	<h2>Vaciar agenda</h2>

            <form action="#" method="post">
                
                <input type="submit" name="borrar" value="Borrar agenda" >
            </form>

	  </div>
 </article>
</div>
</body>
</html>