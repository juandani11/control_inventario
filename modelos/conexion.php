<?php

class Conexion{

    public function conectar(){

        $link = new PDO("mysql:host=localhost;dbname=control_inventario",
            "root",
            "mysql");

        $link->exec("set names utf8");

        return $link;

    }

}