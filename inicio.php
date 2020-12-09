<?php
use Illuminate\Database\Capsule\Manager as DB;

require 'vendor\autoload.php';
require 'config\database.php';

$user = DB::table('usuarios')
->leftJoin('perfiles', 'usuarios.idperfil', '=', 'perfiles.idperfil')
->where('usuarios.idusuario', $_GET['idusuario'])->first();
?>

<!DOCTYPE html>
<html lang="es">

<head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Escolar V4</title>
    <link rel="stylesheet" href="node_modules/bulma/css/bulma.min.css">
</head>

<body>
 <div class="container">

   <h1>Sistema Escolar.</h1>

   <?php if ($user->nombreperfil = 'profesor') { ?>
    <h2>Agregar Calificacion:</h2>

    <form action="insertar.php" method='post'>
      <label for="calificacion"> Calificacion: </label>
      <input id="calificacion" type="text" name="calificacion">
      <input class="button" type="button" value="guardar" onclick="insertar()">
    </form>

   <?php } ?>

   <form action="consultar.php" method="post">
     <input class="button" type="button" value="consultar" onclick="consultar()">
   </form>
 </div>

 <script>

function insertar(){

   axios.post('api/index.php/insertar',{
     calificacion: document.forms[0].usuario.value,
   }) .then (resp => {
     alert("SE AGREGO EXITOSAMENTE EL REGISTRO!! :3")
     console.log(resp)
   }) .catch (error =>{
     alert("ERROR AL AGREGAR EL REGISTRO!! :(")
   })
}
function consultar() {
  axios.post('api/index.php/consultar',{
     calificacion: document.forms[0].usuario.value,
   }) .then (resp => {
     console.log(resp)
   }) .catch(error =>{
     alert("ERROR EN CONSULTA!! :(")
   })
}
 </script>
</body>
</html>