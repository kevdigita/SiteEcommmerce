<?php
session_start();
include_once ('user.php');
include_once ('bdd.php');
if(isset($_GET['id'])){
    $id=$_GET['id'];
    
    $req=$connexion->prepare("SELECT * FROM produit WHERE id=$id");
    
    $req->execute();

    
    $row=$req->fetch(PDO::FETCH_ASSOC);
    
    if (empty($row)){
        echo'le produit nexiste pas';

    }
    else{
        
        $user=new user();
       $user-> ajouterauPanier($row["id"]);
        
    }
  















}else{
    echo 'reessayer';
    
}?>




















