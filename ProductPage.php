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

  <style>
  
  
  </style>
  <script>
    function addToCart() {
      document.location.href = "ProductPage.php?Id=" + <?php echo $_GET['Id']; ?> + "&Ajout=1";
    }
  </script>
</head>
<body>



  <!------ HEADER NAVBAR ---------->
  <?php include("header.php"); ?>

  <!------ CONTAINER BODY ---------->

  <!-- Mise en place de la connexion et requete SQL -->
  <?php
  include "PhpFunctions.php";

  //DATABASE
  $conn = ConnectDatabase();

  //si le BDD existe, faire le traitement
  $conn->set_charset('utf8');
  $conn->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
  $sql = "SELECT * FROM products WHERE ID=" . $_GET['Id'];
  $result = $conn->query($sql);
  ?>
  <script>
    console.log(<?php echo "'" . $_GET['Id'] . "'"; ?>);
    console.log('<?php
                  if (isset($_SESSION['Panier'])) {
                    print_r($_SESSION['Panier']);
                  }
                  ?>');
  </script>
  <div class="container">
    <div id="bloc_sup">
      <table>
        <tr>
          <td>
            <div id="img_bloc" >
              <div id="slider"   style="top: 50%; transform: translateY(-50%);  " class="carousel slide" data-ride="carousel">

                <!-- Le carousel -->
                <?php while ($data = mysqli_fetch_assoc($result)) {
                  //on récupère le tableau de photo
                  $tabPhoto = unserialize($data['Pic_loc']);
                  $sizeTab = sizeof($tabPhoto);
                  $loc_Vid=$data['Vid_link'];

                  // Indicators

                  echo "<ul class='carousel-indicators'>
                    <li data-target='#slider' data-slide-to='0' class='active'></li>";
                    $num=1;
                  for ($i = 0; $i < $sizeTab-1 ; $i++) {
                    echo " <li data-target='#slider' data-slide-to='" . ($i + 1) . "'> </li>";

                    $num=$i+1;
                  }
                  //si il y a bien une vidéo d'enregistrer on affiche un marqueur de plus
                  if($loc_Vid!="")
                  {
                    echo " <li data-target='#slider' data-slide-to=' " . ($num+1) . " '> </li>";
                  }
                  echo '</ul>';

                  // The slideshow
                  echo '<div class="carousel-inner" >
                          <div class="carousel-item active">
                          <img src="' . $tabPhoto[0] . '" alt="Image Produit" width="auto"  height="224px" style=" max-height:299px;max-width:299px">
                          </div>
              ';
                  for ($i = 0; $i < $sizeTab - 1; $i++) {
                    echo '<div class="carousel-item">
                    <center><img src="' . $tabPhoto[$i + 1] . '"  width="auto" height="224px" style=" max-height:299px;max-width:299px " alt="Image Produit"></center>
                    </div>';
                  }
                  if($loc_Vid!="")
                  {
                    echo ' <div class="carousel-item">
                    <div class="embed-responsive embed-responsive-4by3">
                      <iframe class="embed-responsive-item" src="'.$loc_Vid.'" width="auto" height="224px" style=" max-height:299px;max-width:299px ">
                      </iframe>
                    </div>
                  </div>';

                  }
                  echo '
                  </div>';
                  ?>

                  <!-- Left and right controls -->
                  <a class="carousel-control-prev" href="#slider" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                  </a>
                  <a class="carousel-control-next" href="#slider" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                  </a>

                </div>


              </div>
            </td>
            <td valign="top">
              <?php
              //calcul des valeurs à afficher
              $price_promo = $data['Price'] * (1 - ($data['TauxPromo']) / 100);
                
              //
              if ($price_promo != $data['Price']) {
                echo "<div id='format_title'><div class=product-title>" . $data['Name'] . "</div></div>
                    <div id='oldprix'><del>" . $data['Price'] . " €</del></div>
                    <div id='format_prix'>PROMOTION !!<br>" . $price_promo . " €</div>";
              } else {
                echo "<div id='format_title'><div class=product-title>" . $data['Name'] . "</div></div>
                      <div id='format_prix'>" . $price_promo . " €</div>";
              }
              echo "<div id='format_stock'>En stock</div>
                    <div id='format_btn'><div class='btn-group cart'>
                    <button type='button' class='btn btn-success' id='addToCart' onclick='addToCart()'>
                        Ajouter au panier
                    </button>
                    </div></div>
                    <td>";
                    if ($data['Cat']==2)
                    {
                      echo"Taille : ".$data['Size']."<br>
                           Couleur : ".$data['Color']."<br>
                           Homme : ".$sexe."<br>
                      ";
                    }
                     
                    
                    
                    echo "</td></tr>
                  </table>
                </div>
                  <br><br><div id='desc'><h2>Description</h2><br>
                  " . $data['Descr'] . "
                  </div>
              </div>";
            }

            //fermer la connection
            $conn->close(); ?>

            <?php

            if (isset($_GET["Ajout"]) && $_GET["Ajout"] == 1) {
              $_SESSION["Panier"][] = $_GET["Id"];
              ?>
              <script>
                console.log(<?php echo "'" . $_GET['Id'] . "'"; ?>);
              </script>
            <?php
          }
          ?>
            <!------ FOOTER ---------->
            <footer class="page-footer">
              <div class="container">
                <div class="row">
                  <div class="col-lg-8 col-md-8 col-sm-12">
                    <h6 class="text-uppercase font-weight-bold">Information additionnelle</h6>
                    <p>
                      Sed aliquet dolor id sapien rutrum, id vulputate quam iaculis.
                    </p>
                    <p>
                      Sed aliquet dolor id sapien rutrum, id vulputate quam iaculis.
                    </p>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12">
                    <h6 class="text-uppercase font-weight-bold">Contact</h6>
                    <p>
                      37, quai de Grenelle, 75015 Paris, France <br>
                      info@webDynamique.ece.fr <br>
                    </p>
                  </div>
                </div>
              </div>
              <div class="footer-copyright text-center">&copy; 2019 Copyright | Droit d'auteur: webDynamique.ece.fr</div>
            </footer>

</body>

</html>