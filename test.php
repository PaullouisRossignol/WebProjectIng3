<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <script>
        function trotro(){
            <?php

            print_r($_SERVER["panier"]);

            ?>
        }
        </script>

<?php
    session_start();
/*
    $_SERVER["panier"]= array(1,2,3);
    for ($i=0;$i<10;$i++)
    {
        $_SERVER["panier"]=$_SERVER["panier"].",".$i;
    }
    echo $_SERVER["panier"];
*/


// Création d'un tableau simple.
$_SERVER["panier"] = array(1, 2, 3, 4, 5);
print_r($_SERVER["panier"]);
echo "<br>";

// Maintennant, on efface tous les éléments, mais on conserve le tableau :
$_SERVER["panier"]= array();
print_r($_SERVER["panier"]);
echo "<br>";


// Ajout d'un élément (notez que la nouvelle clé est 5, et non 0).
$_SERVER["panier"][] = 6;
print_r($_SERVER["panier"]);
echo "<br>";


// Ré-indexation :
$_SERVER["panier"] = array_values($_SERVER["panier"]);
$_SERVER["panier"][] = 7;
print_r($_SERVER["panier"]);
echo "<br>";


?>
 <button onclick="trotro()">   TouT </button>
</body>
</html>