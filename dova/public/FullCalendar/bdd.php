<?php
try
{
        // $bdd = new PDO('mysql:host=localhost:3306;dbname=dov54078_test;charset=utf8', 'dov54_test1', 'Zt52@k8p');
        $bdd = new PDO('mysql:host=localhost;dbname=dov54078_test;charset=utf8', 'root', '');

}
catch(Exception $e)
{  
        die('Erreur : '.$e->getMessage());
}
