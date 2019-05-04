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
<link rel="stylesheet" type="text/css" href="PanierPage.css">


</head>
<body>

<!------ HEADER NAVBAR ---------->
<?php include("header.php"); ?>

<!------ CONTAINER BODY ---------->

<?php
  include "PhpFunctions.php";

	//DATABASE
  $conn=ConnectDatabase();
  
	
  //si le BDD existe, faire le traitement
  $conn->set_charset('utf8');
  $conn->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
  $sql = "SELECT * FROM products WHERE ID IN (".implode(',',$_SESSION['Panier']).")";
  $result = $conn->query( $sql);

  if(isset($_GET['ID']))
  {
    for($i=0; $i<sizeof($_SESSION['Panier']); $i++){
      if($_GET['ID']==$_SESSION['Panier'][$i])
      {
        unset($_SESSION['Panier'][$i]);
        break;
      }
    }
    $_SESSION['Panier'] = array_values($_SESSION['Panier']);
     $sql = "SELECT DISTINCT * FROM products WHERE ID IN (".implode(',',$_SESSION['Panier']).")";
   $result = $conn->query( $sql);
  }

?>


<div class="container">
  <h1>Votre Panier</h1>
  <?php
  if(sizeof($_SESSION['Panier'])==0)
  {

    echo "<div class='card bg-danger text-white'>
            <div class='card-body'>Votre panier est vide! <a href='HomePage.php'>Accéder à la boutique.</a></div>
          </div>";
  }else{
  echo "<div id='list_bloc'>"; 
 
    $_SESSION['total_price']=0;
    $nb_article=0;
    while ($data = mysqli_fetch_assoc($result)) { 
      //on récupère le tableau de photo
      $tabPhoto = unserialize($data['Pic_loc']);
      
      $nb_article++;
      
      $cpt=0;
      for($i=0;$i<sizeof($_SESSION['Panier']);$i++)
      {
        if($_SESSION['Panier'][$i]==$data['ID'])
        $cpt++;
      }
      $_SESSION['total_price'] += $data['Price']*$cpt*(1 - ($data['TauxPromo']) / 100);
    echo "
    <div class='bloc_produit'>
      <div class='bloc_sup'>
        <table>
          <tr>
            <td>
              <div class='img_bloc'><img src=".$tabPhoto[0]." alt='Image Produit' width='auto'  height='100px' style=' max-height:100px;max-width:100px'></div>
            </td>
            <td valign='top'>
              <div class='format_title'><div class=product-title><a href='ProductPage.php?Id=".$data['ID']."'>".$data['Name']."</a></div></div>
              <div class='format_prix'>".$data['Price']*(1 - ($data['TauxPromo']) / 100)." €</div>
              <div class='desc'>
              ".$data['Descr']."
              </div>
            </td>
            <td>
              <div id='qty_format'>Quantité<br>x".$cpt."<br><br>
              <div id='img_trash'><a href='PanierPage.php?ID=".$data['ID']."'>
              <img src='res/icon_trash.png' alt='trash_icon'>
              </a></div></div>
            </td>
          </tr>
        </table>
      </div>
    </div>";
  }
  
    //fermer la connection
    $conn->close();

    echo "</div><h2>TOTAL : ".$_SESSION['total_price']." €</h2>
      <div id='format_btn'><a href='Payement.php' style='color:white;'>
      <button type='button' class='btn btn-success'>
        Passer à la commande <br> ".$nb_article." article(s)
      </button></a>
  </div>";}
  ?>
</div>
  <script type="text/javascript">
    $(document).ready(function () {
      $('.header').height($(window).height());
    });
  </script>

<script type="text/javascript">
    $(document).ready(function() {
            $('.bloc_produit').mouseover(function(){
              $(this).css("background-color", "#ddd");
              $(this).children().css("background-color", "#ddd");
            $('.img_bloc').css("background-color", "white");
              
            });
            $('.bloc_produit').mouseout(function(){
              $(this).css("background-color", "white");
              $(this).children().css("background-color", "white");
            });
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