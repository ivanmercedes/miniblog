<?php

try{
    $pdo  = new PDO('mysql:host=localhost;dbname=cursophp','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
    
} catch(Exception $e){
    return $e->getMessage();
   //return false;
}

