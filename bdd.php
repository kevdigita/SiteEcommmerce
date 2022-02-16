<?php
$user = "root";
$pass = "";
try {
    $connexion = new PDO('mysql:host=localhost;dbname=myshop', $user, $pass);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur !: " . $e->getMessage() . "<br/>";
    die();
};
