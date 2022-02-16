

<table class="container">
<thead>
    <tr>
        <th>Nom du produit</th>
        <th>Prix</th>
        <th>Nombre de commande</th>
        <th>Total</th>
        <th>action</th>

    </tr>
</thead>
<?php
    include_once('bdd.php');
    include_once('user.php');
    for ($i=0;$i<count($_SESSION['panier']);$i++)
    {
$a=$_SESSION['panier'][$i]['id'];
   
    $req=$connexion->prepare("SELECT * FROM produit WHERE id=$a");
    
        $req->execute();?>
<div class='container'>

    <tbody>
    <?php
    while( $row=$req->fetch(PDO::FETCH_ASSOC)){?>
    <tr>
        <td><?php echo $row['nomProduit']?></td>
        <td><?php echo $row['prixProduit']?></td> 
        <td> <?php echo $_SESSION['panier'][$i]['nb']?></td>
        <td> <?php echo( $row['prixProduit'] * $_SESSION['panier'][$i]['nb'])?></td>
        <td><i class="fa-solid fa-trash-can"></i></td>
    </tr> 
    </tbody><?php 
} }?>
    </table>
    <div class="content">
        <div class=' '> <a href="index.php?p=produit" class='left'><span> Précedent &#8592</span></a></div>
     <div class=''><a href="" class='left'><span> Passer la commande &#8594</span></a></div>
    </div>
   

    
   

</div>