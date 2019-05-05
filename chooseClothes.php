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


    //fonctions php
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

    
    $name=$_GET['name'];

    

    //on regarde si on compare tjrs le mm vetements
    if(isset($_SESSION['vet']) && $_SESSION['vet'] !=$name)
    {
        $_SESSION['vet']=$name;
        unset($_SESSION["size"]);
        unset($_SESSION["col"]);
        unset($_SESSION["sex"]);

    }
    else
    {
        $_SESSION['vet']=$name;
    }
    
        $choixSize="";
        $choixColor="";
        $choixSex="";
    
        if (isset($_POST["TypeSize"]) && $_POST["TypeSize"]!= ""){

            $_SESSION['size']=$_POST["TypeSize"];
            unset($_SESSION["col"]);
             
            $sql = "SELECT DISTINCT Size FROM products WHERE Name='" . $name."'AND Sex='".$_SESSION['sex']."'";
            $result = $conn->query($sql);

            while ($data = mysqli_fetch_assoc($result)) {
              $choixSize.="<option value='".$data['Size']."'>".$data['Size']."</option>";
            }
            $sql = "SELECT DISTINCT Color FROM products WHERE Name='" . $name."'AND Sex='".$_SESSION['sex']."'AND Size='".$_POST['TypeSize']."'";
            $result = $conn->query($sql);

            while ($data = mysqli_fetch_assoc($result)) {
              $choixColor.="<option value='".$data['Color']."'>".$data['Color']."</option>";
            }
            $sql = "SELECT DISTINCT Sex FROM products WHERE Name='" . $name."'";
            $result = $conn->query($sql);

            while ($data = mysqli_fetch_assoc($result)) {
              $sexe= switchSex($data['Sex']);
              $choixSex.="<option value='".$data['Sex']."'>".$sexe."</option>";
            }
     $sql2 = "SELECT * FROM products WHERE Name='" . $name."'AND Sex='".$_SESSION['sex']."'AND Size='".$_SESSION['size']."'";

                             
      }else if (isset($_POST["TypeColor"]) && $_POST["TypeColor"]!= ""){

            $_SESSION['col']=$_POST["TypeColor"];

            $sql = "SELECT DISTINCT Size FROM products WHERE Name='" . $name."'AND Sex='".$_SESSION['sex']."'";
            $result = $conn->query($sql);

            while ($data = mysqli_fetch_assoc($result)) {
              $choixSize.="<option value='".$data['Size']."'>".$data['Size']."</option>";
            }
            $sql = "SELECT DISTINCT Color FROM products WHERE Name='" . $name."'AND Sex='".$_SESSION['sex']."'AND Color='".$_SESSION['col']."'";
            $result = $conn->query($sql);

            while ($data = mysqli_fetch_assoc($result)) {
              $choixColor.="<option value='".$data['Color']."'>".$data['Color']."</option>";
            }
            $sql = "SELECT DISTINCT Sex FROM products WHERE Name='" . $name."'";
            $result = $conn->query($sql);

            while ($data = mysqli_fetch_assoc($result)) {
              $sexe= switchSex($data['Sex']);
              $choixSex.="<option value='".$data['Sex']."'>".$sexe."</option>";
            }
            $sql2 = "SELECT * FROM products WHERE Name='" . $name."'AND Sex='".$_SESSION['sex']."'
            AND Size='".$_SESSION['size']."'AND Color='".$_SESSION['col']."'";
                           
    }else if (isset($_POST["TypeSex"]) && $_POST["TypeSex"]!= ""){
            
            $_SESSION['sex']=$_POST["TypeSex"];
            unset($_SESSION["size"]);
            unset($_SESSION["col"]);
             $sql = "SELECT DISTINCT Size FROM products WHERE Name='" . $name."'AND Sex='".$_POST['TypeSex']."'";
            $result = $conn->query($sql);

            while ($data = mysqli_fetch_assoc($result)) {
              $choixSize.="<option value='".$data['Size']."'>".$data['Size']."</option>";
            }
            $sql = "SELECT DISTINCT Color FROM products WHERE Name='" . $name."'AND Sex='".$_POST['TypeSex']."'";
            $result = $conn->query($sql);

            while ($data = mysqli_fetch_assoc($result)) {
              $choixColor.="<option value='".$data['Color']."'>".$data['Color']."</option>";
            }
            $sql = "SELECT DISTINCT Sex FROM products WHERE Name='" . $name."'";
            $result = $conn->query($sql);

            while ($data = mysqli_fetch_assoc($result)) {
              $sexe= switchSex($data['Sex']);
              $choixSex.="<option value='".$data['Sex']."'>".$sexe."</option>";
            }
            $sql2 = "SELECT * FROM products WHERE Name='" . $name."'AND Sex='".$_SESSION['sex']."'";

                         
        }else{


            $sql = "SELECT DISTINCT Size FROM products WHERE Name='" . $name."'";
            $result = $conn->query($sql);
            while ($data = mysqli_fetch_assoc($result)) {
            $choixSize.="<option value='".$data['Size']."'>".$data['Size']."</option>";
            }
            $sql = "SELECT DISTINCT Color FROM products WHERE Name='" . $name."'";
            $result = $conn->query($sql);

            while ($data = mysqli_fetch_assoc($result)) {
            $choixColor.="<option value='".$data['Color']."'>".$data['Color']."</option>";
            }
            $sql = "SELECT DISTINCT Sex FROM products WHERE Name='" . $name."'";
            $result = $conn->query($sql);

            while ($data = mysqli_fetch_assoc($result)) {
            $sexe= switchSex($data['Sex']);
            $choixSex.="<option value='".$data['Sex']."'>".$sexe."</option>";
            }
            $sql2 = "SELECT * FROM products WHERE Name='" . $name."'";

        }




    

?>

<div class="container">
<?php
    echo"<div class='row'>
        <div class='col-3' style='font-size:18px; font-weight:bold'><center>Sélectionnez la morphologie, puis la taille, puis la couleur: </center></div>
        <div class='col-3'>
        <label for='password'>Morphologie</label>
        <input type='hidden' id='custId' name='nom' value='".$name."'> 
        <form method='POST' action=''>
            <select name='TypeSex' >
            ".$choixSex."
            </select>
            <button type='submit'  class='btn btn-secondary'>modifier</button>
            </form>
        </div>";
        if(isset($_SESSION['sex'])){

            echo"
            <div class='col-2'>
                <label for='password'>Taille</label>
                <form method='POST' action=''>
                <input type='hidden' id='custId' name='nom' value='".$name."'> 
                    <select name='TypeSize' >
                    ".$choixSize."    
                    </select>
                    <button type='submit'  class='btn btn-secondary'>modifier</button>
                    </form>
                    </div>
            "; 

             
        }
         if(isset($_SESSION['size']))
        {
            echo"<div class='col-3'>
            <label for='password'>Couleur</label>
            <form method='POST' action=''>
            <input type='hidden' id='custId' name='nom' value='".$name."'> 
                <select name='TypeColor' >
                ".$choixColor."
                </select>
                 <button type='submit'  class='btn btn-secondary'>modifier</button>
                </form>
            </div>";
        }
        
    
        
                
                
                echo"<div class='col-1'></div>


                    </div>
                    <br>
                ";
                $result = $conn->query($sql2);
                
                //on récupère les autres données
                $loc_Vid = $data['Vid_link'];
                $name=$data['Name'];
                $color=$data['Color'];
                $desc=$data['Descr'];
                $size=$data['Size'];
                $cat=$data['Cat'];
                $sexePr= switchSex($data['Sex']);
                
?>
  <div id="list_bloc">
      
    <?php while ($data = mysqli_fetch_assoc($result)) {  
       $tabPhoto = unserialize($data['Pic_loc']);


      echo "<div class='bloc_produit'>
              <div class='bloc_sup'>
                <table>
                  <tr>
                    <td>
                      <div class='img_bloc' > <center><img src='" . $tabPhoto[0] . "' alt='Image Produit' width='auto'  height='auto' style=' max-height:200px;max-width:200px; ' ></center>
                    </div></td>
                    <td valign='top'>
                      <div class='format_title'><div class=product-title><a href='ProductPage.php?Id=".$data['ID']."'>".$data['Name']."</a></div></div>";
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
            $('.img_bloc').css("background-color", "white");
              
            });
            $('.bloc_produit').mouseout(function(){
              $(this).css("background-color", "white");
              $(this).children().css("background-color", "white");
            });
        });
</script>



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