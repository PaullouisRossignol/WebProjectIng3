<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="suppVendeur.css">


    <title>ECE Amazon</title>
</head>

<body>

<div class='main' id='conteneur'>
    <script>
            <?php

            include "PhpFunctions.php";

            //connection a la base de données
            $conn = ConnectDatabase();
            $sql = "DELETE FROM seller WHERE Email='" . $_GET['compte'] . "' ;";
            if ($conn->query($sql) === TRUE) 
            {
                $sql = "DELETE FROM users WHERE Email='" . $_GET['compte'] . "';";
                if ($conn->query($sql) === TRUE) {
                    $sql = "DELETE FROM products WHERE Seller='" . $_GET['compte'] . "';";
                    if ($conn->query($sql) === TRUE) {
                        $string ="<div class='main-center'><center>" . $_GET['compte'] . " ainsi que tout les produits qu il vendait ont été supprimés.<br> <a href='HomePage.php'>Home Page</a></center></div>";
                        ?> document.getElementById('conteneur').innerHTML =  <?php echo '"'.$string.'"' ;
                    
                        } else {
                        ?><script>
                    console.log(<?php echo '"Problème a la suppression dans la table des produits avec l erreur: ' . $conn->error.'"'; ?>);
                </script> <?php
                    }

                } else {
                    ?><script>
                console.log(<?php echo '"Problème a la suppression dans la table des users avec l erreur: ' . $conn->error.'"'; ?>);
            </script> <?php
                }
            } 
            else {
                ?><script>
            console.log(<?php echo '"Problème a la suppression dans la table des vendeurs avec l erreur: "' . $conn->error; ?>);
        </script> <?php
            }
            ?>
    


    </script>
</div>
</body>

</html>