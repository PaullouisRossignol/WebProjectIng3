<!DOCTYPE html>
<html>
<head>
<title>ECE Amazon</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="HomePage.css">



</head>
<body>

<!------ HEADER NAVBAR ---------->
<div id="header_color">
  <img src="res/logoeceamazon_bisbis.png">  
    <span align="center"><INPUT TYPE=text name=q size=50 maxlength=255 value=""> 
    <INPUT type=submit name=btnG VALUE="Search on this website"></span>
  
  <br>
    <div class="navbar">
      <a href="HomePage.php">Accueil</a>
      <div class="dropdown">
        <button class="dropbtn">Categories 
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
        <a href="SellingPage.php?Cat=0" id="livres">Livres</a>
          <a href="SellingPage.php?Cat=1" id="music">Musique</a>
          <a href="SellingPage.php?Cat=2" id="vetement">V&ecirctement</a>
          <a href="SellingPage.php?Cat=3" id="sport">Sport & Loisirs</a>
        </div>
      </div> 

      <a href="SellProductPage.php">Vendre</a>
      <div class="dropdown">
        <button class="dropbtn">Admin 
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="SellingPage.php?Cat=0" id="livres">Gérer les vendeurs</a>
          <a href="SellingPage.php?Cat=1" id="music">Gérer les produits</a>
        </div>
      </div>
      <a href="PanierPage.php">Panier</a>
      <a href="MyAccount.php">Mon Compte</a>
      <a href="Login.php">Se Connecter</a>
  </div>
</div>

<!------ CONTAINER BODY ---------->
<div class="container">
  
      <br>
      <h1>Mon Compte : </h1>


      <?php 
      include 'PhpFunctions.php';
      
      $connected=0;

      $conn=ConnectDatabase();
     

      switch($_SESSION["type"])
      {
        case 0: 
          
          $sql="SELECT * FROM clients WHERE Email = '".$_SESSION["user"]."'";
          $result = $conn->query($sql);

          while ($row = $result->fetch_assoc()) {

          if (isset($result->num_rows)) {
            if ($result->num_rows > 0) {
              // echo"
              // "
              // <div class='card-columns'>
              //     <div class='card bg-light'>
              //       <div class='card-body text-center'>
              //         <p class='card-text'>Some text inside the fifth card</p>
              //       </div>
              //     </div>
                 echo "<div class='row'>
                          <div class='col-4'></div>
  
                              <div class='col-8'>
                <div class='card ' style='width:400px'>
                  <img class='card-img-top' src='".$row['Pic_loc']."' alt='Card image'>
                    <div class='card-body'>
                        <h4 class='card-title text-center'>Compte Client: " . $row['Name'] ." ". $row['Surname'] ."</h4>
                      <p class='card-text'>Numéro de Carte : ". $row['Card_num'] ." </p>
                      <p class='card-text'>Adresse Email: ".$row['Email']."</p>
               
                    </div>
                </div>
                </div>
                </div>
                ";

             //    <div class='card bg-light'>
             //      <div class='card-body text-center'>
             //        <p class='card-text'>Some text inside the fifth card</p>
             //      </div>
             //    </div>
             // </div>
              // "
              //   ";



                // // parcourt de chaque ligne
                
                //      echo "<h2>Adresse Email : </h2>";
                //     echo  $row['Email'] ;
                //      echo "<h2>Nom : </h2>";
                //     echo "<td>" '". $row['Name'] ."' "</td>";
                //      echo "<h2>Prénom : </h2>";
                //     echo "<td>" . $row['Surname'] . "</td>";
                //      echo "<h2>Numéro de Carte : </h2>";
                //     echo "<td>" . $row['Card_num'] . "</td>";
                //      echo "<h2>Photo de profile: </h2>";


                //     echo "<img src='".$row['Pic_loc']."' class='rounded-circle' alt='Photo de Profil'>";
                }
                
            } else
                echo "<center><div>Erreur à l'affichage des informations de votre compte <br><a href='HomePage.html'>Home Page</a></div></center>";
        }
         
          
            




          break;
        case 1: 
          echo "vendeur.";
          break;
        case 2: 
          echo "admin.";
          break;
      }



      ?>



      


</div>

  <script type="text/javascript">
    $(document).ready(function () {
      $('.header').height($(window).height());
    });
  </script>
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



</body>
</html>