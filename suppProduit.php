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
            $sql = "DELETE FROM products WHERE ID='" . $_GET['Id'] . "' ;";
            if ($conn->query($sql) === TRUE) 
            {
                $string ="<div class='main-center'><center>" . $_GET['Nom'] . " a été supprimé.<br> <a href='HomePage.php'>Home Page</a></center></div>";
                ?> document.getElementById('conteneur').innerHTML =  <?php echo '"'.$string.'"' ;

            } 
            else {
                ?><script>
                    console.log(<?php echo '"Problème a la suppression d un produit: ' . $conn->error.'"'; ?>);
                </script> <?php

            }
            ?>
    


    </script>
</div>
</body>

</html>