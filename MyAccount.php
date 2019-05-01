<!DOCTYPE html>
<html>
<head>
  <title>ECE Amazon</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
          <a href="SellingPage.php?Cat=0" id="livres">Livres</p>
            <a href="SellingPage.php?Cat=1" id="music">Musique</a>
            <a href="SellingPage.php?Cat=2" id="vetement">V&ecirctement</a>
            <a href="SellingPage.php?Cat=3" id="sport">Sport & Loisirs</a>
          </div>
        </div> 

        <a href="SellProductPage">Vendre</a>
        <a href="AdminPage">Admin</a>
        <div id="text_nav">
          <a href="PanierPage.php">Panier</a>
          <a href="MyAccount.php">Mon Compte</a>
          <a href="Login.php">Se Connecter</a>

        </div>
      </div>

      <h1>Mon Compte : </h1>
      <?php 
      include 'PhpFunctions.php';
      
      $connected=0;

      $conn=ConnectDatabase();
     

      switch($_SESSION["type"])
      {
        case 0: 
          echo "  Vous êtes client chez nous :)<br> ";
          $sql="SELECT * FROM clients WHERE id = '".$_SESSION["type"]."'";
          $result = $conn->query($sql);
          $row = mysqli_fetch_array($result);
          echo "<h2>Adresse Email : </h2>";
          echo "<td>" . $row['Email'] . "</td>";
           echo "<h2>Adresse Name : </h2>";
          echo "<td>" . $row['Name'] . "</td>";
           echo "<h2>Adresse Surname : </h2>";
          echo "<td>" . $row['Surname'] . "</td>";
           echo "<h2>Adresse Card_num : </h2>";
          echo "<td>" . $row['Card_num'] . "</td>";
           echo "<h2>Adresse Pic_loc : </h2>";
          echo "<td>" . $row['Pic_loc'] . "</td>";
          
            




          break;
        case 1: 
          echo "vendeur.";
          break;
        case 2: 
          echo "admin.";
          break;
      }



      ?>



      



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