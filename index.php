<?php
$formatos= array('.jpg','.doc','.png','.pdf');
$directorio = 'archivos';
$contador = 0;
if (isset($_POST['boton'])){
     $nombrearchivo=$_FILES['archivo']['name'];
     $guardado=$_FILES['archivo']['tmp_name'];
	 $ext = substr ($nombrearchivo, strrpos($nombrearchivo, '.'));
	 if (in_array($ext, $formatos)){
	     if (move_uploaded_file ($guardado, "archivos/$nombrearchivo")){
             echo "Archivo $nombrearchivo guardado con exito";
         }
         else{
             echo "Archivo $nombrearchivo no se pudo guardar";
         }
	 }
	 else{
	      echo "Archivo no permitido";
	 }
}

?>
<!DOCTYPE html >
<html =lang "es">
<head>
  <title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	background-color: #006633;
}
-->
</style></head>
<body>
<h1> Alumno: Mauricio Salamanca </h1> 
  <table width="276" height="200" border="1">
    <tr>
      <td height="194"><img src="b5d9241053eb0572cf199c43a9ce6c3a.jpg" width="329" height="190"></td>
    </tr>
  </table>
  <div class= "caja">
  <h1> Archivos existentes </h1>
  <?php
  if ($dir = opendir($directorio)){
      while ($archivo= readdir ($dir)){
	  if ($archivo!= '.' && $archivo !='..'){
	      $contador ++;
	      echo "Archivo:<strong> $archivo</strong><br/>";
	  }
	  }
	  echo "Total de archivos: <strong>$contador</strong>";
  } 
  ?>
  </div 
  ><h1> Subir archivos </h1>
  </body>
  <div class= "caja" >
  <form method ="post" action ="" enctype= "multipart/form-data">
    <input type ="file" name ="archivo">
    <br>
	<input type ="submit" value ="subir archivo" name ="boton">
	<br>
  </form>
  </div>
</body>
  </html>
