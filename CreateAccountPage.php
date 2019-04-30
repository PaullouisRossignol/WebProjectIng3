<!DOCTYPE html>
<html lang="fr">

 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- C'est cette ligne là qui fout le bordel -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


    <link href="Login.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="HomePage.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <title>Se Connecter</title>
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
      <a href="SellingPage.php">Livres</a>
      <a href="SellingPage.php">Musique</a>
      <a href="SellingPage.php">V&ecirctement</a>
      <a href="SellingPage.php">Sport & Loisirs</a>
    </div>
  </div> 

  <a href="SellProductPage">Vendre</a>
  <a href="AdminPage">Admin</a>
    <div id="text_nav">
  <a href="PanierPage.php">Panier</a>
  <a href="#news">Mon Compte</a>
  <a href="Login.php">Se Connecter</a>

</div>
</div>

<div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
               <!-- <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="Connection" />-->
            </div>

            <!-- Login Form -->
            <form action="Connection.php" method="POST">
                <input type="text" id="name" class="fadeIn second" name="name" placeholder="Name">
                <input type="text" id="surname" class="fadeIn second" name="surname" placeholder="Surname">
                <input type="text" id="login" class="fadeIn second" name="email" placeholder="Email">
                <input type="password" id="password" class="fadeIn third" name="pwd" placeholder="Password">
                <input type="submit" class="fadeIn fourth" value="Créer mon compte">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="Login.php">Vous avez déjà un compte ?</a>
            </div>

        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/query-1.11.2.min.js"></script>
    </body>
    </html>