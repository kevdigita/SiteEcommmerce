<?php

include_once('user.php');
if (isset($_POST['submit'])) {
    if (empty($_POST['nom']) && empty($_POST['prenom']) && empty($_POST['email']) && empty($_POST['password'])) {
        echo ("no");
    } else {
        extract($_POST);
        if ($password == $Rpassword) {
             if(strlen($password)<6){
                 echo("reesayer");

             } else{

                $password = md5($password);
                
                $user = new user;
    
                $user->add($nom, $prenom, $email, $password);
    
    
             }


          
        }
    }
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,600&display=swap" rel="stylesheet">

</head>
<div class="containerF">
    <form method="post" enctype="multipart/form-data">
        <h3></h3>

        <input type="text" id="name" name="nom" placeholder="Nom" required>
        <input type="text" id="name" name='prenom' placeholder="Prénom" required>
        <input type="email" id="email" name="email" id="" placeholder="Email" required>
        <input type="password" name="password" id="" placeholder="Entrez le mot de passe">
        <input type="password" name="Rpassword" id="" placeholder="Confirmer votre mot de passe">

         <button type="Submit" name="submit">Creer un compte</button>
      
    </form>

</div>
</body>