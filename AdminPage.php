<!DOCTYPE html>
<html>
<head>
<title>ECE Amazon</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="Dynamism.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="HomePage.css">
</head>
<body>

<div id="header_color">
        <img src="logoeceamazon_bisbis.png">
        <center><INPUT TYPE=text name=q size=50 maxlength=255 value=""> 
        <INPUT type=submit name=btnG VALUE="Search on this website"></center>         
</div>
  
<br>
<div class="navbar">
<a href="HomePageNew">Accueil</a>
  <div class="dropdown">
    <button class="dropbtn">Categories 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
    <a href="SellingPage.php" id="livres">Livres</a>
      <a href="SellingPage.php" id="music">Musique</a>
      <a href="SellingPage.php" id="vetement">V&ecirctement</a>
      <a href="SellingPage.php" id="sport">Sport & Loisirs</a>
    </div>
  </div> 

  <a href="SellProductPage">Vendre</a>
  <a href="AdminPage">Admin</a>
    <div id="text_nav">
  <a href="PanierPage.php">Panier</a>
  <a href="#">Mon Compte</a>
  <a href="Login.php">Se Connecter</a>

</div>
</div>

<h1>WOUAH T'ES ADMIN BG</h1>

<script type="text/javascript">
    $(document).ready(function () {
        $('.header').height($(window).height());
    });
</script>

<footer>
        <small>37, quai de Grenelle, 75015 Paris, France
        &copy; 2019 Copyright | Droit d'auteur: webDynamique.ece.fr</small>
</footer>

</body>



</body>
</html>