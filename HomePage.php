<!DOCTYPE html>
<html>

<head>
    <title>ECE Amazon</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="design.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-md">
        <a class="navbar-brand" href="#"><img src="ece_logo V.png"></a>
        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div align="center"><center>
        <TABLE bgcolor="#FFFFFF">
                <tr>
                    <td>
                <INPUT TYPE=text name=q size=50 maxlength=255 value=""> 
                    <INPUT TYPE=hidden name=hl value=fr>
                         
                    <INPUT type=submit name=btnG VALUE="Search on this website"> 
                    </td>
                        </tr>
                    </TABLE>
                    </center>
        </div>
    </nav>

    <div class="navbar">
    <div class="dropdown">
    <button class="dropbtn">Categories 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Ajouter un produit</a>
      <a href="#">Mes produits en vente</a>
    </div>
  </div> 

  
  <a href="#home">Vendre</a>
  <a href="#home">Admin</a>
  <a href="#home">Panier</a>
  <a href="#home">Mon Compte</a>
  <a href="#home">Se Connecter</a>

  </div>

    <header class="page-header header container-fluid">

    <div id="promo">

    <div class="dropdown">
  <button class="dropbtn">Dropdown</button>
  <div class="dropdown-content">
  <a href="#">Link 1</a>
  <a href="#">Link 2</a>
  <a href="#">Link 3</a>
  </div>
</div>

    </div>
    <div id="bottom">
    </div>
    </header>



    <script type="text/javascript">
        $(document).ready(function () {
            $('.header').height($(window).height());
        });
    </script>

    <footer>
                    <p>
                        37, quai de Grenelle, 75015 Paris, France
                        info@webDynamique.ece.fr 
                        +33 01 02 03 04 05
                        +33 01 03 02 05 04
                    </p>
                &copy; 2019 Copyright | Droit d'auteur: webDynamique.ece.fr
    </footer>

</body>

</html>