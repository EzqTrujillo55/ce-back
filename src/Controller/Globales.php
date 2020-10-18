<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use PDO;

trait Globales
{
    public function Conexion()
    {
        $link = "mysql:host=localhost;dbname=ce";
        $user = "root";
        $pass = "";
        $conexion = new PDO($link, $user, $pass);
        return $conexion;
    }
}