<!DOCTYPE html>
<html>

<head>
  <title>ECE Amazon</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <link href="//netdna.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="HomePage.css">
  <style>
    #suppr {
      color: blue;
      text-decoration: underline;
    }

    #suppr:hover {
      color: red;
      text-decoration: none;
    }
  </style>

  <script>
    function checkSuppr(id,nom) {
      var r = confirm("Le produit '" + nom + "' va être supprimé.");
      if (r == true) {
        document.location.href = "suppProduit.php?Id=" + id+"&Nom="+nom;
      }
    }
    
    
  </script>

</head>

<body>
  <?php
  function getCateg($cat)
  {

    switch ($cat) {
      case 0:
        return "Livre";
        break;
      case 1:
        return "Musique";
        break;
      case 2:
        return "Vêtements";
        break;
      case 3:
        return "Sports & Loisirs";
        break;
    }
  }
  function getSexe($Sexe)
  {
    switch ($Sexe) {
      case 0:
        return "Homme";
        break;
      case 1:
        return "Femme";
        break;
    }
  }

  ?>
  <!------ HEADER NAVBAR ---------->
  <?php include("header.php"); ?>


  <!------ CONTAINER BODY ---------->
  <div class="row">
    <div class="col-1"></div>
    <div class="col-10">
      <?php
      include "PhpFunctions.php";

      //connection a la base de données
      $conn = ConnectDatabase();

      if($_SESSION['type']==1)
      {
        $sql = "SELECT * FROM products where Seller='".$_SESSION["user"]."'";
      }
      else
      {
        $sql = "SELECT * FROM products";
      }
      $result = $conn->query($sql);

      if (isset($result->num_rows)) {
        if ($result->num_rows > 0) {
          echo "  <table class='table table-striped table-hover'> <caption style='caption-side: top;'> Liste des Produits</caption>";
          echo "<thead ><tr><th> Nom</th> <th> Prix</th> <th> Vendeur</th><th>Categorie </th>  <th> Quantité </th><th> Promotion </th> <th>Taille </th><th>Couleur </th><th> Morphologie </th><th>  </th> ";
          echo "</tr></thead>";

          // parcourt de chaque ligne
          while ($row = $result->fetch_assoc()) {
            $IdNom = "'" . $row['ID'] ."','".$row['Name']."'";
            $string = 'onclick="checkSuppr(' . $IdNom . ')"';
            echo "<tr><td><a href='editProduct.php?Id=" . $row['ID'] ."'>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Price'] . "€</td>";
            echo "<td>" . $row['Seller'] . "</td>";
            echo "<td>" . getCateg($row['Cat']) . "</td>";
            echo "<td>" . $row['Qty'] . "</td>";
            echo "<td>" . $row['TauxPromo'] . " %</td>";
            //si c'est un vêtement, on va afficher ses caractéritiques, propre à la catégorie
            if ($row['Cat'] == 2) {
              echo "<td>" . $row['Size'] . "</td>";
              echo "<td>" . $row['Color'] . "</td>";
              echo "<td>" . getSexe($row['Sex']) . "</td>";
            } else {
              echo "<td> \ </td>";
              echo "<td> \ </td>";
              echo "<td> \ </td>";
            }
            echo "<td> <div id ='suppr'" . $string . "  >Supprimer</div></td></tr>";
            echo "</tr>";
           
          }
        } else
          echo "<center><div>Il n'y a pas de produits <br><a href='HomePage.html'>Home Page</a></div></center>";
        echo "</table>";
        echo "<form  method='POST' action='creerProduit.php'>
        <button type='submit' class='btn btn-success' >Ajouter un Produit</button></form> <br>";
      } else
        echo "<center><div>Il n'y a pas de produits dans la base de données<br><br><a href='HomePage.php'>Home Page</a></div></center>";

      $conn->close();
      ?>

    </div>
    <div class="col-1"></div>
  </div>
  <!------ FOOTER ---------->
<?php include("footer.php"); ?>







<!-- bootstrap needs jQuery -->
<script>
    $("input[type='number']").inputSpinner()
</script>





</body>

</html>