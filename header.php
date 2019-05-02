<div id="header_color">

<script type="text/javascript">
    $(document).ready(function () {
        $('.header').height($(window).height());
    });
</script>

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
        <a href="gestVendeur.php">Gérer les vendeurs</a>
          <a href="AdminPage.php">Gérer les produits</a>
        </div>
      </div>

      <a href="PanierPage.php">Panier</a>
      <a href="MyAccount.php">Mon Compte</a>
      <a href="Login.php">Se Connecter</a>
      
  </div>
</div>
