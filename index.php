<?php
session_start();?>

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

<body>
    
    <?php
  
    if (!empty($_SESSION["email"]))
    {include_once ('header.php');
   
    
    
    if(isset($_GET['p'])){
        if ($_GET['p']=='produit'){
            
            include_once("produit.php");

        }
        else if ($_GET['p']=='Panier'){
            include_once("panier.php");

        }
    
    }
    include_once ('footer.php');
    }

    else{
        include_once('inscription.php');
        








    }
   
    
    ?>
</body>

</html>

</html>
</body>

</html>

</html>