<div id="header_color">

<script type="text/javascript">
    $(document).ready(function () {
        $('.header').height($(window).height());
    });
</script>

  <img src="res/logoeceamazon_bisbis.png">  
    <span align="center"><INPUT TYPE=text name=q size=50 maxlength=255 value=""> 
    <button type="button" class=" btn btn-light btn-sm">Rechercher</button>
  
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
      <a href="MyAccount.php">Mon Compte</a>
      


      <?php

      	session_start();
    
        
		
		if(isset($_SESSION["user"]))
		{
			
			if ($_SESSION["type"]==1)
      {
        echo"<a href='SellProductPage.php'>Vendre</a>";
      }
      elseif ($_SESSION["type"]==2)
      {
        echo"<a href='SellProductPage.php'>Vendre</a>";
        echo"<a href='gestVendeur.php'>Admin</a>";
      }
			    
	  } else
        echo"<a href='Login.php'>Se Connecter</a>";
    
        if (!isset($_SESSION["type"]) || $_SESSION["type"]==0) {
          echo"<a href='PanierPage.php'>Panier</a>";
        
        }

      ?>

      
  </div>
</div>
