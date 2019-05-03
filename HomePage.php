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
<link rel="stylesheet" type="text/css" href="HomePageBody.css">
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
  $sql = "SELECT * FROM products WHERE TauxPromo !=0";
  $result = $conn->query( $sql);
  ?>

<h1>PROMOTION ET VENTES FLASH</h1>
<div id="promo">
  <table>
    <tr>
      <?php
      while ($data = mysqli_fetch_assoc($result)) {  
          echo "
          <td>
            <div id='bloc_produit'>
              <div id='img_product'>
                Image produit
              </div>
              <table>
              <tr>
                <td>
                  <a href='ProductPage.php?Id=".$data['ID']."'><div id='format_title'>".$data['Name']."</div></a>
                </td>
                <td>
                  <div id='format_promo'>
                    PROMO
                  </div>
                  -".$data['TauxPromo']."%
                </td>
              </tr>
              <tr>
                <td>
                  <div id='format_desc'>".$data['Descr']."</div>
                </td>
              </tr>
              </table>
            </div>
          </td>";
        }
      ?>
    </tr>
  </table>
</div>

<h1>BEST SELLER</h1>
<div id="bottom">
  <table>
    <tr>
      <?php
        for($i=0; $i<4; $i++)
        {
          echo "
          <td>
            <div id='bloc_produit'>
            <div id='img_product'>
            Image produit
            </div>
              <div id='format_description'>Description</div>
            </div>
          </td>";
        }
      ?>
    </tr>
  </table>
</div>


<script type="text/javascript">
  $(document).ready(function () {
    $('.header').height($(window).height());
  });
</script>


<!------ FOOTER ---------->
<?php include("footer.php"); ?>



</body>
</html>