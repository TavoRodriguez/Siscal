<?php
class Conexion
{
    public static function Conectar()
    {
        define('servidor', '173.231.192.41');
        //define('servidor', 'localhost');
        define('nombre_bd', 'sccinc5_siscal');
        define('usuario', 'sccinc5_pruebas');
        define('password', 'PruebasPasantes2021Ti');
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        try {
            $conexion = new PDO("mysql:host=" . servidor . "; dbname=" . nombre_bd, usuario, password, $opciones);

            return $conexion;
        } catch (Exception $e) {
            die("El error de Conexión es: " . $e->getMessage());
        }
    }
}
