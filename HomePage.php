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

<!-------- PROMOTION --------->

<div id="format_text">
<div id="best">PROMOTIONS ET VENTES FLASH</div>
</div>
<div id="promo">
  <table>
    <tr>
      <?php
      while ($data = mysqli_fetch_assoc($result)) {
        //on récupère le tableau de photo
      $tabPhoto = unserialize($data['Pic_loc']);
      
          echo "
          <td>
            <div id='bloc_produit' style='    margin-left: 50px; '>
              <div id='img_product'>
                <div class='img_bloc'><center><img src='".$tabPhoto[0]."'alt='IMAGE_PRODUIT' width='auto'  height='240px' style=' max-height:240px;max-width:240px'></center></div>
              </div>
              <table>
                <tr>
                  <td>
                    <a href='ProductPage.php?Id=".$data['ID']."' style='color:black; font-size:20px '><div id='format_title' style='color:black; font-size:20px' >".$data['Name']."</div></a>
                  </td>
                  <td>
                    <div id='format_promo'>
                      PROMO
                    </div>
                    -".$data['TauxPromo']."%
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

<!-------- BEST SELLER --------->
<?php 
  $best_seller=array(252539,252537,252532,252535);
  $sql_livre = "SELECT * FROM products WHERE ID=$best_seller[0]";
  $sql_music = "SELECT * FROM products WHERE ID=$best_seller[1]";
  $sql_vet = "SELECT * FROM products WHERE ID=$best_seller[2]";
  $sql_sport = "SELECT * FROM products WHERE ID=$best_seller[3]";

  $result_livre = $conn->query( $sql_livre);
  $result_music = $conn->query( $sql_music);
  $result_vet = $conn->query( $sql_vet);
  $result_sport = $conn->query( $sql_sport);
?>
<div id="bottom">
  <div id="best">BEST SELLER</div>
  <table>
    <tr>
      <td>
        <div id="bloc_categorie" style="background-color:#f5f5f5 ;  border: 10px solid;border-image: linear-gradient(#0b02d8, #060089) 10;"><center>
        <div id="format_categorie"><a href="SellingPage.php?Cat=0">LIVRES</a></div>
          <div id="bloc_produit">
          <?php
            while ($data = mysqli_fetch_assoc($result_livre)) {
              $tabPhoto = unserialize($data['Pic_loc']);
              echo "
              <div id='img_product'>
              <div class='img_bloc'><center><img src='".$tabPhoto[0]."'alt='IMAGE_PRODUIT' width='auto'  height='240px' style=' max-height:240px;max-width:240px'></center></div>
            </div>
            
            <table>
              <tr>
                <td>
                <a href='ProductPage.php?Id=".$data['ID']."' style='color:black;'><div id='format_title' style='color:black; font-size:20px'>".$data['Name']."</div></a>
                </td>
                <td>
                  <div id='format_bestseller'>
                    BEST SELLER
                  </div>
                </td>
              </tr>
            </table>
            
          </div>";}?>
        </div></center>
      </td>
      <td>
        <div id="bloc_categorie" style="background-color:#f5f5f5 ;  border: 10px solid;border-image: linear-gradient(#b20707, #8c0000) 10;"><center>
        <div id="format_categorie"><a href="SellingPage.php?Cat=1">MUSIQUE</a></div>
          <div id="bloc_produit">
          <?php while ($data = mysqli_fetch_assoc($result_music)) {
            $tabPhoto = unserialize($data['Pic_loc']);
              echo "<div id='img_product'>
              <div class='img_bloc'><center><img src='".$tabPhoto[0]."'alt='IMAGE_PRODUIT' width='auto'  height='240px' style=' max-height:240px;max-width:240px'></center></div>
            </div>
            <table>
              <tr>
                <td>
                <a href='ProductPage.php?Id=".$data['ID']."' style='color:black;'><div id='format_title' style='color:black; font-size:20px'>".$data['Name']."</div></a>
                </td>
                <td>
                  <div id='format_bestseller'>
                    BEST SELLER
                  </div>
                </td>
              </tr>
            </table>
           
          </div>";}?>
          </div></center>
        </div>
      </td>
      <td>
        <div id="bloc_categorie"  style="background-color:#f5f5f5 ;  border: 10px solid;border-image: linear-gradient(#0d660d, #004900) 10;"><center>
        <div id="format_categorie"><a href="SellingPage.php?Cat=2">VÊTEMENTS</a></div>
          <div id="bloc_produit">
          <?php while ($data = mysqli_fetch_assoc($result_vet)) {
            $tabPhoto = unserialize($data['Pic_loc']);
              echo "<div id='img_product'>
              <div class='img_bloc'><center><img src='".$tabPhoto[0]."'alt='IMAGE_PRODUIT' width='auto'  height='240px' style=' max-height:240px;max-width:240px'></center></div>
            </div>
            <table>
              <tr>
                <td>
                <a href='ProductPage.php?Id=".$data['ID']."' style='color:black;'><div id='format_title'style='color:black; font-size:20px'>".$data['Name']."</div></a>
                </td>
                <td>
                  <div id='format_bestseller'>
                    BEST SELLER
                  </div>
                </td>
              </tr>
            </table>
            
          </div>";}?>
          </div></center>
        </div>
      </td>
      <td>
        <div id="bloc_categorie"style="background-color:#f5f5f5 ;  border: 10px solid;border-image: linear-gradient(#e2aa02, #bf8f00) 10;"><center>
        <div id="format_categorie"><a href="SellingPage.php?Cat=3">SPORT & LOISIRS</a></div>
          <div id="bloc_produit">
            <?php while ($data = mysqli_fetch_assoc($result_sport)) {
              $tabPhoto = unserialize($data['Pic_loc']);
              echo "<div id='img_product'>
              <div class='img_bloc'><center><img src='".$tabPhoto[0]."'alt='IMAGE_PRODUIT' width='auto'  height='240px' style=' max-height:240px;max-width:240px'></center></div>
            </div>
            <table>
              <tr>
                <td>
                <a href='ProductPage.php?Id=".$data['ID']."' style='color:black;'><div id='format_title' style='color:black; font-size:20px'>".$data['Name']."</div></a>
                </td>
                <td>
                  <div id='format_bestseller'>
                    BEST SELLER
                  </div>
                </td>
              </tr>
            </table>
           
          </div>";}?>
          </div></center>
        </div>
      </td>
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