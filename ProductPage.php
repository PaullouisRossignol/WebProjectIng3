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
          <a href="AdminPage.php">Gérer les vendeurs</a>
          <a href="AdminPage.php">Gérer les produits</a>
        </div>
      </div>
      <a href="PanierPage.php">Panier</a>
      <a href="MyAccount.php">Mon Compte</a>
      <a href="Login.php">Se Connecter</a>
  </div>
</div>


<!------ CONTAINER BODY ---------->

<?php
//Si on a submit (ajouter au panier)
include "PhpFunctions.php";
if(isset($_POST['submit']))
{
  
  $conn=ConnectDatabase();
 
  
  $idv=$_GET['Id'];
  $cpt=0;
  $actu=0;
   
  //Ajout de l'ID dans le Panier depuis l'url

  if(!isset($_SESSION['Panier']))
  {
    $_SESSION['Panier']=array();
    echo"tmtc je m'active";
  }
  $_SESSION["Panier"] = array_values( $_SESSION["Panier"]);
  for($i=0;$i<sizeof($_SESSION['Panier']);$i++)
  {
    if($_SESSION['Panier'][$i]==$idv)
    $cpt++;
  }

  $sql = "SELECT * FROM products WHERE ID=".$idv;
  $result = $conn->query($sql);
  if (isset($result->num_rows)) 
  {
    if ($result->num_rows > 0) 
    {
      while ($row = $result->fetch_assoc()) 
      {
        $actu=$row["Qty"];
      }
    }
    else
    {
      echo"walou ton article est mort2";
    }
  }
  else
  {
    echo"walou ton article est mort";
  }

  if ($cpt<$actu) {
    //on peut l'ajouter ( au nvx des quantité ;))
    $_SESSION['Panier'][]=$idv;
  }
  else
  {
    echo"<div class='card bg-danger text-white'>
                <div class='card-body'>Quantité d'article voulu trop élevé!</div>
              </div>";
  }

}
?>


<!-- Mise en place de la connexion et requete SQL -->
<?php
					

					//DATABASE
					$conn=ConnectDatabase();
					
					//si le BDD existe, faire le traitement
					$conn->set_charset('utf8');
					$conn->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
					$sql = "SELECT * FROM products WHERE ID=".$_GET['Id'];
          $result = $conn->query( $sql);
?>

<div class="container">
  <div id="bloc_sup">
    <table>
        <tr>
            <td><div id="img_bloc">Image</div></td>
            <td valign="top">
              <?php while ($data = mysqli_fetch_assoc($result)) {
                $price_promo = $data['Price'] *(1 - ($data['TauxPromo'])/100);
                if($price_promo != $data['Price']){  
              echo "<div id='format_title'><div class=product-title>".$data['Name']."</div></div>
                    <div id='oldprix'><del>".$data['Price']." €</del></div>
                    <div id='format_prix'>PROMOTION !!<br>".$price_promo." €</div>";}else{
                      echo "<div id='format_title'><div class=product-title>".$data['Name']."</div></div>
                      <div id='format_prix'>".$price_promo." €</div>";
                      }
                    echo "<div id='format_stock'>In Stock</div>";

                    if(!isset($_SESSION['type'])|| $_SESSION['type']==0)
                    {
                      echo "<form method='POST'action=''>
                        <div id='format_btn'><div class='btn-group cart'>
                          <button type='submit' name='submit' class='btn btn-success' id='addToCart'>
                              Ajouter au panier
                          </button>
                        </div></div>
                      </form>";
                    }
        echo "</tr>
    </table>
  </div>
    <br><br><div id='desc'><h2>Description</h2><br>
    ".$data['Descr']."
    Novo denique perniciosoque exemplo idem Gallus ausus est inire flagitium grave, 
    quod Romae cum ultimo dedecore temptasse aliquando dicitur Gallienus, 
    et adhibitis paucis clam ferro succinctis vesperi per tabernas palabatur et conpita quaeritando Graeco sermone,
     cuius erat inpendio gnarus, quid de Caesare quisque sentiret. 
     et haec confidenter agebat in urbe ubi pernoctantium luminum claritudo dierum solet imitari fulgorem. 
     postremo agnitus saepe iamque, si prodisset, conspicuum se fore contemplans, non nisi luce palam egrediens ad agenda quae putabat seria cernebatur. et haec quidem medullitus multis gementibus agebantur.
  </div>
</div>"
;}

//fermer la connection
$conn->close();?>

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