<!DOCTYPE html>
<html lang="fr">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="creerCompte.css" rel="stylesheet" id="bootstrap-css">

    <title>Amazon ECE</title>
</head>

<body>
    <div class="main">
        <?php
        //connection a la base de données
        include 'PhpFunctions.php';
        $conf_achat = 0;
        $conn = ConnectDatabase();


        
        
        //This Pseudo is ok
        
            $TypeCard = $_POST["TypeCard"];
            $numCard = $_POST["numCard"];
            $nameCard = $_POST["nameCard"];
            $dateExp = $_POST["dateExp"];
            $codeSec = $_POST["codeSec"];
            

                $sql="SELECT * FROM clients WHERE Email = '".$_SESSION["user"]."'";
                  $result = $conn->query($sql);

                    if (isset($result->num_rows)) 
                    {
                        if ($result->num_rows > 0) 
                            {
                              while ($row = $result->fetch_assoc()) 
                                {
                                    $num=$row['Card_num'];
                                }
                            } else  echo "<center>
                                                <div>
                                                    Erreur La carte n'a pas été trouvée <br>
                                                    <a href='HomePage.html'>Home Page</a>
                                                </div>
                                            </center>";
                    }
            
                //adding the new user in users table
                $sql = "SELECT * FROM bank_info WHERE Card_num = '".$num."'";
                $result = $conn->query($sql);

                    if (isset($result->num_rows)) 
                    {
                        if ($result->num_rows > 0) 
                            {
                              while ($row = $result->fetch_assoc()) 
                                {
                                    if ($TypeCard==$row['Type']) 
                                    {
                                        //echo "card type correct <br>";
                                        if ($numCard==$row['Card_num']) 
                                        {
                                            //echo "card number correct <br>";
                                            if ($nameCard==$row['Name_card']) 
                                            {
                                                //echo "card name correct <br> ";
                                                if ($dateExp==$row['Exp_date']) 
                                                {
                                                   // echo "card exp date correct <br>";
                                                    if ($codeSec==$row['Sec_code']) 
                                                    {
                                                        //echo "code sec correct <br>";
                                                        $conf_achat=1;
                                                    }
                                                    else echo "<br>
                                              <div class='card bg-danger text-white'>
                                                <div class='card-body'>Code de sécurité de la carte incorrect</div>
                                              </div> <br> ";
                                                }
                                                else echo "<br>
                                              <div class='card bg-danger text-white'>
                                                <div class='card-body'>Date d'expiration de la carte incorrecte</div>
                                              </div> <br> ";
                                            }
                                            else echo "<br>
                                              <div class='card bg-danger text-white'>
                                                <div class='card-body'>Nom figurant sur la carte incorrecte</div>
                                              </div> <br> ";
                                        }
                                        else echo "<br>
                                              <div class='card bg-danger text-white'>
                                                <div class='card-body'>Numéro de la carte incorrecte</div>
                                              </div> <br> ";
                                    }
                                    else echo "<br>
                                              <div class='card bg-danger text-white'>
                                                <div class='card-body'>Type de la carte incorrecte</div>
                                              </div> <br> ";
                                }
                            } else  echo "<center>
                                            <div>
                                                Erreur Les infos n'ont pas été trouvés <br>
                                                <a href='HomePage.php'>Home Page</a>
                                            </div>
                                        </center>";
                    }

                    if ($conf_achat==1) 
                    {


                        echo 
                        "
                                <div class='main'>
                                    <div class='main-center'>
                                        <center>
                                            <div>Félicitation votre achat à été confirmé!<br>
                                            <a href='HomePage.php'>Home Page</a><br>
                                            <a href='Mail.php'>Recevoir un mail</a>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                        ";

                        
                        if(isset($_SESSION["Panier"]))
                        {
                            if (sizeof($_SESSION["Panier"])!=0) 
                            {
                                for($i=0;$i<sizeof($_SESSION["Panier"]);$i++)
                                {
                                    $sql ="SELECT * FROM products WHERE ID = '".$_SESSION["Panier"][$i]."'";
                                    $result = $conn->query($sql);
                                        if (isset($result->num_rows)) 
                                        {
                                            if ($result->num_rows > 0) 
                                            {
                                                while ($row = $result->fetch_assoc()) 
                                                {
                                                    $qteprc=$row["Qty"]-1;
                                                    $sql2 = 'UPDATE products SET Qty=';
                                                    $sql2.=$qteprc;
                                                    $sql2.=' WHERE ID=';
                                                    $sql2.=$_SESSION["Panier"][$i];
                                                    
                                                    if($conn->query($sql2))
                                                    {
                                                        echo"Modification BDD OK ;)"; 
                                                        unset($_SESSION["Panier"]);
                                                    }
                                                    else
                                                    {
                                                        echo"Modification BDD PAS OK :C"; 
                                                    }
                                                }
                                            }
                                            else
                                                echo "Aucun résultat pour les id dans le Panier";
                                        }      
                                }
                            }
                            else
                            {
                                echo "Le Panier est vide";
                            }
                        }
                        else
                        {
                            echo "Le Panier n'a pas été initialisé";
                        }

                    }
                    else
                        echo"
                            <div class='main'>
                            <div class='main-center'>
                            <h4>Veuillez recommencer l'opération</h4>
                            <a href='HomePage.php'  class='btn btn-primary btn-block' role='button' >Home Page</a>
                            </div>
                            </div>
                            ";
    $conn->close();

    ?>
    </div>

</body>

</html>