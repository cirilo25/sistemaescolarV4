<?php
use Illuminate\Database\Capsule\Manager as DB;

require 'vendor\autoload.php';
require 'config\database.php';

$user = DB::table('usuarios')
->leftJoin('perfiles', 'usuarios.idperfil', '=', 'perfiles.idperfil')
->where('nombreusuario', $_POST['usuario'])->first();

$mensaje ='';
if ($user->password == $_POST['password']) {
    $mensaje = "<h1> BIENVENIDO: {$user->nombreperfil} {$user->nombreusuario}</h1>
    <br><a href='inicio.php?idusuario = {$user->idusuario}'>entra al sistema escolar </a>";
} else {
    $mensaje= "<h1> USUARIO Y/O CONTRASEÑA INCORRECTOS, POR FAVOR VERIFICQUE Y VUELVA A INTENTAR :)</h1>
    <br><a href='index.html'>Regresar </a>";
}

echo $mensaje;
