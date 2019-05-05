<!DOCTYPE html>
<html>

<head>
<title>ECE Amazon</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="HomePage.css">
<link rel="stylesheet" type="text/css" href="ProductPageBis.css">


  <!------ HEADER NAVBAR ---------->
  <?php include("header.php"); ?>

  <!------ CONTAINER BODY ---------->

  <?php
  $cpt=0;
  $actu=1;
//Si on a submit (ajouter au panier)
include "PhpFunctions.php";


  $conn=ConnectDatabase();
 
  
  $idv=$_GET['Id'];
  
   
  //Ajout de l'ID dans le Panier depuis l'url

  if(!isset($_SESSION['Panier']))
  {
    $_SESSION['Panier']=array();
  }
  else{
    $cpt=0;
    $actu=0;
    $_SESSION["Panier"] = array_values( $_SESSION["Panier"]);
  
  
    for($i=0;$i<sizeof($_SESSION['Panier']);$i++)
    {
      if($_SESSION['Panier'][$i]==$idv)
      $cpt++;
    }
  
 

  $sql = "SELECT * FROM products WHERE ID=".$idv;
  $result = $conn->query($sql);
  if (isset($result->num_rows)) 
  {
    if ($result->num_rows > 0) 
    {
      while ($row = $result->fetch_assoc()) 
      {
        $actu=$row["Qty"];
      }
    }
   
  }
  }
 
  

  if ($cpt<$actu && isset($_POST['submit'])) {
    //on peut l'ajouter ( au nvx des quantité ;))
    $_SESSION['Panier'][]=$idv;
    $cpt++;
  }
  if ($cpt>=$actu) 
  {
    echo"<div class='card bg-danger text-white'>
                <div class='card-body'>Cet article n'est plus disponible!</div>
              </div>";
  }


?>

  <!-- Mise en place de la connexion et requete SQL -->
  <?php
  

  //DATABASE
  $conn = ConnectDatabase();


  //Php functions 

  function switchSex($sex){
    switch ($sex) {
              case 0:
                $sexe = "Homme";
                break;
              case 1:
                $sexe = "Femme";
                break;
            }
            return $sexe;
  }


  //si le BDD existe, faire le traitement

  
  $conn->set_charset('utf8');
  $conn->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
  //requete en fonction des formulaires envoyés

   //methode Get ou Post
   if(isset($_GET["Id"]))
   {
     $Id=$_GET['Id'];
   }
   if(isset($_POST["Id"]))
   {
     $Id=$_POST['Id'];
   }
  
  $sql = "SELECT * FROM products WHERE ID=" . $Id;
  $result = $conn->query($sql);
  ?>
  
  <div class="container">
    <div id="bloc_sup">
      <table>
        <tr>
          <td>
            <div id="img_bloc">
              <div id="slider" style="top: 50%; transform: translateY(-50%);  " class="carousel slide" data-ride="carousel">

<!-- CAROUSEL -->
                <?php while ($data = mysqli_fetch_assoc($result)) {
                  //on récupère le tableau de photo
                  $tabPhoto = unserialize($data['Pic_loc']);
                  $sizeTab = sizeof($tabPhoto);
                  //on récupère les autres données
                  $loc_Vid = $data['Vid_link'];
                  $name=$data['Name'];
                  $color=$data['Color'];
                  $desc=$data['Descr'];
                  $size=$data['Size'];
                  $cat=$data['Cat'];
                  $Seller=$data['Seller'];
                  $sexePr= switchSex($data['Sex']);
                  // Indicateurs

                  echo "<ul class='carousel-indicators' style='position: absolute;bottom: -50px;'>
                    <li data-target='#slider' data-slide-to='0' class='active'></li>";
                  $num = 1;
                  for ($i = 0; $i < $sizeTab - 1; $i++) {
                    echo " <li data-target='#slider' data-slide-to='" . ($i + 1) . "'> </li>";

                    $num = $i + 1;
                  }
                  //si il y a bien une vidéo d'enregistrer on affiche un marqueur de plus
                  if ($loc_Vid != "") {
                    echo " <li data-target='#slider' data-slide-to=' " . ($num + 1) . " '> </li>";
                  }
                  echo '</ul>';

                  // The slideshow
                  echo '<div class="carousel-inner" >
                          <div class="carousel-item active"><center>
                          <img src="' . $tabPhoto[0] . '" alt="Image Produit" width="auto"  height="224px" style=" max-height:299px;max-width:299px">
                          </center></div>
              ';
                  for ($i = 0; $i < $sizeTab - 1; $i++) {
                    echo '<div class="carousel-item">
                    <center><img src="' . $tabPhoto[$i + 1] . '"  width="auto" height="224px" style=" max-height:299px;max-width:299px " alt="Image Produit"></center>
                    </div>';
                  }
                  if ($loc_Vid != "") {
                    echo ' <div class="carousel-item">
                    <div class="embed-responsive embed-responsive-4by3">
                      <iframe class="embed-responsive-item" src="' . $loc_Vid . '" width="auto" height="224px" style=" max-height:299px;max-width:299px ">
                      </iframe>
                    </div>
                  </div>';
                  }
                  echo '
                  </div>';
                  ?>

                  <!-- Left and right controls -->
                  <a class="carousel-control-prev style='bottom: -130%; left: -15%;'" href="#slider" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                  </a>
                  <a class="carousel-control-next style='bottom: -130%;right: -15%;' " href="#slider" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                  </a>

                </div>

<!-- FIN DU CAROUSEL -->


<!-- BLOC PRIX, NOM et PROMOTION -->
              </div>
            </td>
            <td valign="top" style="min-width:45%">
              <?php
              //calcul des valeurs à afficher
              $price_promo = $data['Price'] * (1 - ($data['TauxPromo']) / 100);
              
              
              //affichage des infos principales du produit
              if ($price_promo != $data['Price']) {
                echo "<div id='format_title'><div class=product-title>" . $name . "</div></div>
                    <div id='oldprix'><del>" . $data['Price'] . " €</del></div>
                    <div id='format_prix'>PROMOTION !!<br>" . $price_promo . " €</div>";
              } else {
                echo "<div id='format_title'><div class=product-title>" . $name . "</div></div>
                      <div id='format_prix'>" . $price_promo . " €</div>";
              }
              if ($cpt>=$actu) {
                echo "<div id='format_stock' style='color:red;'>Epuisé</div>";
              }
              elseif ($data['Qty']>0)
              {
                echo "<div id='format_stock'>En stock</div>";
              } else
                echo "<div id='format_stock' style='color:red;'>Epuisé</div>";
              

              if(!isset($_SESSION['type'])|| $_SESSION['type']==0)
                    {
                      echo "<form method='POST'action=''>
                        <div id='format_btn'><div class='btn-group cart'>
                          <button type='submit' name='submit' class='btn btn-success' id='addToCart'>
                              Ajouter au panier
                          </button>
                        </div></div>
                      </form>";
                    }
            }
// <!-- FIN DU BLOC PRIX, NOM et PROMOTION -->  

 
                     //affichage de la description et des caractéristiques des produits vêtements

              echo"
                    </tr>
      </table>
    </div>
      <br><br>
      <div id='desc'>
      
        <h2>Description</h2>
        <br>
        <div class='row'>";
  if ($cat == 2) {
    echo "<div class='col-3 bg-secondary text-white rounded'>
    Taille : " . $size . "<br>
                Couleur : " . $color . "<br>
                Morphologie : " . $sexePr . "<br>
                </div>";
    echo "<div class='col-9 border border-secondary rounded' style='min-height:100px;'>" . $desc .'<br><br><br><b>Vendeur</b>: '.$Seller. "</div></div></div>
                ";
  }
  else
  {
    echo "<div class='col-12 border border-secondary rounded' style='min-height:100px;'>" . $desc .'<br><br><br><b>Vendeur</b>: '.$Seller. "</div></div></div>
                ";
  }

 


//fermer la connection
$conn->close(); ?>

<!------ FOOTER ---------->
<?php include("footer.php"); ?>

</body>

</html>