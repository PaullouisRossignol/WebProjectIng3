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
      <a href="AdminPage.php">Admin</a>
      <a href="PanierPage.php">Panier</a>
      <a href="MyAccount.php">Mon Compte</a>
      <a href="Login.php">Se Connecter</a>
  </div>
</div>

<h1>PRODUIT A METTRE EN VENTE</h1>

<script type="text/javascript">
    $(document).ready(function () {
        $('.header').height($(window).height());
    });
</script>

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