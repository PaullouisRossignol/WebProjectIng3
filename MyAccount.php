<!DOCTYPE html>
<html>
<head>
<title>ECE Amazon</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="HomePage.css">



</head>
<body>

<!------ HEADER NAVBAR ---------->
<?php include("header.php"); ?>

<!------ CONTAINER BODY ---------->
<div class="container" id="heyho">
  
  <br>
  <h1>Mon Compte : </h1>


    <?php 
      include 'PhpFunctions.php';
      
      $connected=0;

      $conn=ConnectDatabase();
     
      if( !isset($_SESSION["user"]) )
      {
        echo "<br>
              <div class='card bg-danger text-white'>
                <div class='card-body'>Vous n'êtes pas connecté!</div>
              </div> <br> 
               <br>
                <center>
                <a class='underlineHover' href='Login.php'>Vous connecter</a>
                </center>

             <br>  <br> <br>
            
              ";

      }
      else
      {     

              switch($_SESSION["type"])
              {


                ////////////////////////////////////////CLIENT

                case 0: 
                  
                  $sql="SELECT * FROM clients WHERE Email = '".$_SESSION["user"]."'";
                  $result = $conn->query($sql);
                  if (isset($result->num_rows)) 
                  {
                    if ($result->num_rows > 0) 
                    {
                       while ($row = $result->fetch_assoc()) 
                       {
                        echo "<div class='row'>
                                      <div class='col-4'>
                                      </div>
                                      <div class='col-8'>
                                            <div class='card ' style='width:400px'>
                                              <img class='card-img-top' src='".$row['Pic_loc']."' alt='Card image'>
                                              <div class='card-body'>
                                                <h4 class='card-title text-center'>Compte Client: " . $row['Name'] ." ". $row['Surname'] ."</h4>
                                                <p class='card-text'>Numéro de Carte : ". $row['Card_num'] ." </p>
                                                <p class='card-text'>Adresse Email: ".$row['Email']."</p>
                                              </div>
                                            </div>
                                      </div>
                                    </div>
                                  ";
                        }
                      } else
                        echo "<center><div>Erreur à l'affichage des informations de votre compte <br><a href='HomePage.html'>Home Page</a></div></center>";
                    }
                  break;

                  /////////////////////////////////////////VENDEUR

                case 1: 
                  $sql="SELECT * FROM seller WHERE Email = '".$_SESSION["user"]."'";
                  $result = $conn->query($sql);
                      if (isset($result->num_rows)) 
                      {
                        if ($result->num_rows > 0) 
                            {
                              while ($row = $result->fetch_assoc()) 
                                {
                                   echo " <style>
                                              #heyho
                                              {
                                                background-image: url('".$row['Back_pic_loc']."');
                                                background-repeat: no-repeat;
                                                 background-position: center center;
                                                 background-size: cover;  
                                                   background-clip: content-box;
                                            }
                                          </style>

                                          <div class='row'>
                                            <div class='col-4'>
                                            </div>
                                            <div class='col-8'>
                                                  <div class='card ' style='width:400px'>
                                                    <img class='card-img-top' src='".$row['Pic_loc']."' alt='".$row['Pic_loc']."'>
                                                    <div class='card-body'>
                                                      <h4 class='card-title text-center'>Compte Vendeur: " . $row['Name'] ." ". $row['Surname'] ."</h4>
                                                      <p class='card-text'>Adresse Email: ".$row['Email']."</p>
                                 
                                                    </div>
                                                  </div>
                                            </div>
                                          </div>
                                        ";
                                   }
                            
                              } else  echo "<center><div>Erreur à l'affichage des informations de votre compte <br><a href='HomePage.html'>Home Page</a></div></center>";
                      }

                  break;
                case 2: 
                 $sql="SELECT * FROM admin WHERE Email = '".$_SESSION["user"]."'";
                  $result = $conn->query($sql);

                    if (isset($result->num_rows)) 
                      {
                        if ($result->num_rows > 0) 
                            {
                              while ($row = $result->fetch_assoc()) 
                                {
                                   echo "
                                          <div class='row'>
                                            <div class='col-4'>
                                            </div>
                                            <div class='col-8'>
                                                  <div class='card ' style='width:400px'>
                                                    <img class='card-img-top' src='".$row['Pic_loc']."' alt='".$row['Pic_loc']."'>
                                                    <div class='card-body'>
                                                      <h4 class='card-title text-center'>Compte Admin: " . $row['Name'] ." ". $row['Surname'] ."</h4>
                                                      <p class='card-text'>Adresse Email: ".$row['Email']."</p>
                                 
                                                    </div>
                                                  </div>
                                            </div>
                                          </div>
                                        ";
                                   }
                            
                              } else  echo "<center><div>Erreur à l'affichage des informations de votre compte <br><a href='HomePage.html'>Home Page</a></div></center>";
                      }

                  break;

                  default:
                    echo "Vous n'êtes pas connecté";
      }// <div class='btn-group cart'>
            //   <button type='button' class='btn btn-success' id='addToCart'>
            //     Se deconnecter
            //   </button>
            // </div>
      echo "<br>

            
      <center>
      <form action='Deco.php' method='post'>
            <button type='submit' class='btn btn-danger'>Se deconnecter</button>
            </div>
      </form><br>
      </center>

      <center>
      <form action='Payement.php' method='post'>
             <button type='submit' class='btn btn-info'>Payement</button>

            </div>
      </form><br>
      </center>

      ";
    }




      ?>
  </div>




      


</div>

  <script type="text/javascript">
    $(document).ready(function () {
      $('.header').height($(window).height());
    });
  </script>
</div>

<!------ FOOTER ---------->
<?php include("footer.php"); ?>



</body>
</html>