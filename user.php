<?php
class user
{   private $nomProduit;
    private $price;
     private $nom;
    private $prenom;
    private $email;
    private $password;
  //USER
    public function setNomU($nom)
    {
        $this->nom = $nom;
    }
     //USER
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
     //USER
    public function setEmail($email)
    {
        $this->email = $email;
    }
     //USER
    public function getNomU()
    {
        return $this->nom;
    }
     //USER
    public function getPrenom()
    {
        return $this->prenom;
    }
     //USER
    public function getEmail()
    {
        return $this->email;
    }
     //USER
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getNom(){
        return $this->nomProduit;
    }
    public function setNom( $nomProduit){
        $this->nomProduit=$nomProduit;
        
    }
    public function getprice(){
        return $this->price;
    }
    public function setPrice( $price){
        $this->price=$price;
        
    }
    public function add($name, $prenom, $email, $password)
   {   user::setNomU($name);
         user::setPrenom($prenom);
        user::setEmail($email);
        user::setPassword($password);
        require("bdd.php");
        $req = $connexion->prepare("SELECT * FROM  account WHERE email = \"$email\" ");
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
        if (empty($row["email"])) {
            $req = $connexion->prepare("INSERT INTO `account`(`nom`, `prenom`, `email`, `password`
       ) VALUES (?,?,?,?)");
            $req->execute([$this->nom, $this->prenom, $this->email, $this->password]);
            $_SESSION['nom'] = user::getNom();
            $_SESSION['prenom'] = user::getPrenom();
            $_SESSION['email'] = user::getEmail();
            echo "reussi";

?>
            <script>
                window.location.replace("index.php");
            </script>
            <?php
        }
    }
    public function afficher($id){
        require 'bdd.php';
        $sql=$connexion->prepare("SELECT * FROM `produit` WHERE id=$id");
        $sql->execute();
        while( $row=$sql->fetch(PDO::FETCH_ASSOC)){?>
        <div class="col-4">
        <h3><?php echo $row['nomProduit']?></h3>
        <div>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
        <p><?php echo $row['prixProduit']?></p> 
       
        
        <a href="addPanier.php?id=<?php echo $row['id'] ?>"> <i class="fas fa-shopping-cart"></i></a>

        </div>

       <?php }
     
        
    }
    public function ajouterauPanier($id){
        
        if(isset($_SESSION['panier']))

        {
            $boole=false;
      for($i=0;$i<count( $_SESSION['panier']);$i++)
{
    if( $_SESSION['panier'][$i]['id']==$id)
    {
        $_SESSION['panier'][$i]['nb']= $_SESSION['panier'][$i]['nb']+1;
$boole=true;
    }



}
  if($boole==false)
  {   
         $nbre=count( $_SESSION['panier']);
         $_SESSION['panier'][$nbre]['id']=$id;
         $_SESSION['panier'][$nbre]['nb']=1;
  }      

            die('le produit a ete bien ajouter au panier   <a href="index.php?p=Panier">Votre panier</a>');
        }
        else{
            $_SESSION['panier'][0]['id']=$id;
            $_SESSION['panier'][0]['nb']=1;
         
        
            die('le produit a ete bien ajouter au panier   <a href="index.php?p=Panier">Votre panier</a>');
          
        }
      

    }

    

}