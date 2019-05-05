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
<link rel="stylesheet" type="text/css" href="ProductList.css">
</head>
<body>

<!------ HEADER NAVBAR ---------->
<?php include("header.php"); ?>

<!------ CONTAINER BODY ---------->
<?php
	include "PhpFunctions.php";


  //Php functions 

  function switchSex($sex){
    switch ($sex) {
              case 0:
                $sexe = "Homme";
                break;
              case 1:
                $sexe = "Femme";
                break;
            }
            return $sexe;
  }
	//DATABASE
	$conn=ConnectDatabase();
					
  //si le BDD existe, faire le traitement
  $conn->set_charset('utf8');
  $conn->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
 
?>

<div class="container">
  <div id="list_bloc">
    <?php 
       if(isset($_GET['search']))
       {
         if($_GET['search']!='')
         {
          echo"<b style='font-size:26px'>Recherche pour : ".$_GET['search']."</b>";
         }
         else
         {
          echo"<b style='font-size:26px'>Tout nos produits:</b>";
         }
        $sql = "SELECT * FROM products WHERE Name LIKE '%".$_GET['search']."%'";
        $result = $conn->query( $sql);
        while ($data = mysqli_fetch_assoc($result)) {  
          $tabPhoto = unserialize($data['Pic_loc']);
        $string='ProductPage.php';
        echo "<div class='bloc_produit'>
              <div class='bloc_sup'>
                <table>
                  <tr>
                    <td style='width: 200px;height: 200px;'>
                      <div class='img_bloc' > <center><img src='" . $tabPhoto[0] . "' alt='Image Produit' width='auto'  height='auto' style=' max-height:200px;max-width:200px; ' ></center>
                    </div></td>
                    <td valign='top'>
                      <div class='format_title'><div class=product-title><a href='".$string."?Id=".$data['ID']."'>".$data['Name']."</a></div></div>";
                      if($data['TauxPromo']!=0){
                        echo "<table>
                        <tr>
                        <td><div class='format_prix'>".$data['Price']." €</div></td>
                        <td><div class='format_prix'>-".$data['TauxPromo']."%</div></td>
                        </tr>
                        </table>";
                              
                      }else{
                      echo"<div class='format_prix'>".$data['Price']." €</div>";}

                      echo"<div class='desc'>
                        ".$data['Descr']."
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
            </div>";}
            if(mysqli_num_rows($result)==0)
            {
              echo'<br><br>Aucun résultat pour votre recherche';
            }
       }
       elseif($_GET['Cat']==2)
       {
        
        $string='chooseClothes.php';


        $sql = "SELECT Distinct Name	 FROM products WHERE Cat=".$_GET['Cat'];
        $result = $conn->query( $sql);
         while ($data = mysqli_fetch_assoc($result)) {
           $array[]=$data['Name'];
          
        }
        foreach ($array as $value) {
          $couleurDisp="";
          $TailleDisp="";
          $SexDisp="";

        $sql = "SELECT Distinct Color FROM products WHERE Name='".$value."'";
        $result = $conn->query( $sql);
         while ($data = mysqli_fetch_assoc($result)) {
          $couleurDisp.=$data['Color']." | ";
         }
         $sql = "SELECT Distinct Size FROM products WHERE Name='".$value."'";
         $result = $conn->query( $sql);
          while ($data = mysqli_fetch_assoc($result)) {
            $TailleDisp.=$data['Size']." | ";
          }
          $sql = "SELECT Distinct Sex FROM products WHERE Name='".$value."'";
         $result = $conn->query( $sql);
          while ($data = mysqli_fetch_assoc($result)) {
            $SexDisp.=switchSex($data['Sex'])." | ";
            
          }
          
          
         
         
          echo "<div class='bloc_produit'>
          <div class='bloc_sup'>
            <table>
              <tr>
                <td valign='top'>
                  <div class='format_title'><div class=product-title><a href='".$string."?name=".$value."'>".$value."</a></div>";
                 

                echo"</td>
              </tr> <tr>
              <td><b>Couleurs disponibles </b>= ".$couleurDisp."
               </td></tr> <tr>
               <td><b>Taille disponibles</b>    = ".$TailleDisp."
               </td></tr> <tr>
               <td><b>Morphologie disponibles</b>    = ".$SexDisp."
               </td></tr> 
            </table>
          </div>
        </div>";}
        if(sizeof($array)==0)
        {
          echo'<br><br>Aucun résultat pour votre recherche';
        }

         }

         
        
        
       
       else
       {
        $sql = "SELECT * FROM products WHERE Cat=".$_GET['Cat'];
        $result = $conn->query( $sql);
        while ($data = mysqli_fetch_assoc($result)) {  
          $tabPhoto = unserialize($data['Pic_loc']);
        $string='ProductPage.php';
        echo "<div class='bloc_produit'>
              <div class='bloc_sup'>
                <table>
                  <tr>
                    <td style='width: 200px;height: 200px;'>
                      <div class='img_bloc' > <center><img src='" . $tabPhoto[0] . "' alt='Image Produit' width='auto'  height='auto' style=' max-height:200px;max-width:200px; ' ></center>
                    </div></td>
                    <td valign='top'>
                      <div class='format_title'><div class=product-title><a href='".$string."?Id=".$data['ID']."'>".$data['Name']."</a></div></div>";
                      if($data['TauxPromo']!=0){
                        echo "<table>
                        <tr>
                        <td><div class='format_prix'>".$data['Price']." €</div></td>
                        <td><div class='format_prix'>-".$data['TauxPromo']."%</div></td>
                        </tr>
                        </table>";
                              
                      }else{
                      echo"<div class='format_prix'>".$data['Price']." €</div>";}

                      echo"<div class='desc'>
                        ".$data['Descr']."
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
            </div>";}
            if(mysqli_num_rows($result)==0)
            {
              echo'<br><br>Aucun résultat pour votre recherche';
            }
       }
      
            //fermer la connection
            $conn->close();
      ?> 
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
            $('.bloc_produit').mouseover(function(){
              $(this).css("background-color", "#ddd");
              $(this).children().css("background-color", "#ddd");
            $('.img_bloc').css("background-color", "#f5f5f5");
              
            });
            $('.bloc_produit').mouseout(function(){
              $(this).css("background-color", "#f5f5f5");
              $(this).children().css("background-color", "#f5f5f5");
            });
        });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.header').height($(window).height());
    });
</script>

<!------ FOOTER ---------->
<?php include("footer.php"); ?>


</body>
</html>