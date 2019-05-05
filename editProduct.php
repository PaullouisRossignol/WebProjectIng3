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
    <script src="res/bootstrap-input-spinner.js"></script>

</head>

<body>

    <!------ HEADER NAVBAR ---------->
    <?php include("header.php"); ?>

    <?php
    include "PhpFunctions.php";

    //DATABASE
    $conn = ConnectDatabase();

    //si le BDD existe, faire le traitement
    $conn->set_charset('utf8');
    $conn->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");

    //on va update la base de donner si l'utilisateur à modifier le produit
    
    if(isset($_GET['Id']))
    {
        $Id=$_GET['Id'];
    }
    else if(isset($_POST['Id']))
    {
        $Id=$_POST['Id'];
    }
    else
    {
        ?>
        <script>
            console.log("PAS D'ID ENVOYE : ERREUR");
        </script>
        <?php
    }
       

    if (isset($_POST["name"]) && $_POST["name"]!= ""){

        $sql = "UPDATE products SET Name='".$_POST['name']."' WHERE id='".$Id."'";
        if ($conn->query($sql) === TRUE) {
            ?>
            <script>
                console.log("Name has been updated");
            </script>
            <?php
        }
                           
    }
    if (isset($_POST["price"]) && $_POST["price"]!= ""){

        $sql = "UPDATE products SET Price='".$_POST['price']."' WHERE id='".$Id."'";
        if ($conn->query($sql) === TRUE) {
            ?>
            <script>
                console.log("Price has been updated");
            </script>
            <?php
        }
                           
    }

    if (isset($_POST["Qt"]) && $_POST["Qt"]!= ""){

        $sql = "UPDATE products SET Qty='".$_POST['Qt']."' WHERE id='".$Id."'";
        if ($conn->query($sql) === TRUE) {
            ?>
            <script>
                console.log("Quantity has been updated");
            </script>
            <?php
        }
                           
    }

    if (isset($_POST["promo"]) && $_POST["promo"]!= ""){

        $sql = "UPDATE products SET TauxPromo='".$_POST['promo']."' WHERE id='".$Id."'";
        if ($conn->query($sql) === TRUE) {
            ?>
            <script>
                console.log("Promotion has been updated");
            </script>
            <?php
        }
                           
    }

    if (isset($_POST["desc"]) && $_POST["desc"]!= ""){

        $sql = "UPDATE products SET Descr='".$_POST['desc']."' WHERE id='".$Id."'";
        if ($conn->query($sql) === TRUE) {
            ?>
            <script>
                console.log("Description has been updated");
            </script>
            <?php
        }
                           
    }

    if (isset($_FILES["photo"]) && $_FILES["photo"]["name"]!= ""){

        //on récupère les photos déjà existantes
        $sql = "SELECT Pic_loc FROM products WHERE ID=" . $Id;
        $result = $conn->query($sql);
        while ($data = mysqli_fetch_assoc($result)) {
            $tab=$data["Pic_loc"];
            
        }
        //on remet le string sous forme de tableau
        $tabPhoto=unserialize($tab);
        //on sauvegarde la nouvelle image dans le dossier
        $photoName = SauvegardeImage($_FILES["photo"]["name"], $_FILES["photo"]["tmp_name"],$_FILES["photo"]["size"]);
        ?>
            <script>
                console.log(<?php echo "'".gettype($photoName)."'";?>);
            </script>
            <?php
        if (gettype($photoName)=='boolean')
        {
            echo "<div style='margin-left:280px'>Image non prise en charge,<br> veuillez en choisir une autre svp.</div>";
        }
        else
        {
        //on ajoute la nouvelle image au tableau
        $tabPhoto[]=$photoName;
        //on repasse le tableau sous forme de string
        $tabPhoto=serialize($tabPhoto);

        $sql = "UPDATE products SET Pic_loc='$tabPhoto' WHERE id='".$Id."'";
        if ($conn->query($sql) === TRUE) {
            ?>
            <script>
                console.log("Picture has been updated");
            </script>
            <?php
            }
        }
        
        
                           
    }

    //on récupère les données pour les afficher
    $sql = "SELECT * FROM products WHERE ID=" . $Id;
    $result = $conn->query($sql);
    while ($data = mysqli_fetch_assoc($result)) {
    //on récupère le tableau de photo
    $tabPhoto = unserialize($data['Pic_loc']);
    $sizeTab = sizeof($tabPhoto);
    //on récupère les autres données
    $loc_Vid = $data['Vid_link'];
    ?>

    <!------ CONTAINER BODY ---------->


    
    <div class="container" style="margin-top:50px">
        <div class='row'>
            <div class="col-4">
                <div id="img_bloc">

<!-- CAROUSEL -->
        <div id="slider" style="top: 50%; transform: translateY(-50%);  " class="carousel slide" data-ride="carousel">

                <?php  
                
                // Indicateurs

                echo "<ul class='carousel-indicators' >
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
              <a class="carousel-control-prev" href="#slider" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </a>
              <a class="carousel-control-next" href="#slider" data-slide="next">
                <span class="carousel-control-next-icon"></span>
              </a>

            </div></div>

<!-- FIN DU CAROUSEL -->
                
                
                
                
                
                
                <br>
                Ajouter une photo
                <form enctype="multipart/form-data" method="POST" action="">
                <?php echo "<input type='hidden' id='custId' name='Id' value='".$Id."' >"; ?>
                <input type="file" name='photo' class="form-control-file border">
                <br> <center><button type='submit'  class='btn btn-secondary'>modifier</button> </center>

                </form>
            </div>
            <div class="col-4"> 
                <?php 
                            echo " <form method='POST' action=''>
                                        <input type='hidden' id='custId' name='Id' value='".$Id."'> 
                                        <div class='form-group-inline'>
                                                <label for='usr' id='format_title'>Nom</label>
                                                <input type='text' placeholder='Nom'name='name' value ='" . $data['Name'] . "'class='form-control' id='usr'>
                                        </div>
                                        <br> <center><button type='submit'  class='btn btn-secondary'>modifier</button> </center>
                                        </form>
                                    <form  method='POST' action=''>
                                        <input type='hidden' id='custId' name='Id' value='".$Id."'> 
                                        <div class='form-group-inline'>
                                                <label id='format_prix' for='usr'>Prix</label>
                                                <input type='number' name='price' placeholder='Prix' min='0'  data-suffix='€' value ='" . $data['Price'] . "'class='form-control' id='usr'>
                                        </div>
                                        <br> <center><button type='submit'  class='btn btn-secondary'>modifier</button> </center>
                                    </form>
                                    <form  method='POST' action=''>
                                        <input type='hidden' id='custId' name='Id' value='".$Id."'> 
                                        <div class='form-group-inline'>
                                                <label id='format_stock' for='usr'>En Stock</label>
                                                <input type='number' name='Qt' placeholder='Quantité' min='0' value ='" . $data['Qty'] . "'class='form-control' id='usr'>
                                        </div>
                                        <br> <center><button type='submit'  class='btn btn-secondary'>modifier</button> </center>
                                    </form>

        </div>
        <div class='col-4'> 
                                <form  method='POST' action=''>
                                    <input type='hidden' id='custId' name='Id' value='".$Id."'> 
                                    <div class='form-group-inline'>
                                        <label id='format_title' for='usr'>Promotion</label>
                                        <input type='number' name='promo' placeholder='Taux de promotion' data-suffix='%'min='0' value ='" . $data['TauxPromo'] . "'class='form-control' id='usr'>
                                    </div>
                                    <br> <center><button type='submit'  class='btn btn-secondary'>modifier</button> </center>

                                </form>

        </div>
</div>
                                <br><br>
                                <form  method='POST' action=''>
                                <input type='hidden' id='custId' name='Id' value='".$Id."'> 
                                    <div id='desc'><h2>Description</h2><br>
                                    <textarea class='form-control' name='desc'  rows='5' id='comment'>" . $data['Descr'] . "</textarea>
                                    <br> <center><button type='submit'  class='btn btn-secondary'>modifier</button> </center>
                                </form>

                                    </div>
</div></div>";
                                }
                                //fermer la connection





                               
                           
                               
                           
                                $conn->close(); ?></div>


        </div>









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
        <!-- bootstrap needs jQuery -->

        <script>
            $("input[type='number']").inputSpinner()
        </script>
</body>

</html>