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
     
        $conn = ConnectDatabase();

            $name = $_POST["name"];
            $prix = $_POST["prix"];
            $Qt = $_POST["Qt"];
            $size = $_POST["taille"];
            $couleur = $_POST["couleur"];
            $sexe = $_POST["sexe"];
            $desc= $_POST["desc"];
            

             switch($_POST["cat"]){
                 case "Livres":
                    $Cat=0;
                    break;
                case "Musique":
                    $Cat=1;
                    break;
                case "Vetements":
                    $Cat=2;
                    break;
                case "Sport":
                    $Cat=3;
                    break;
             }
                //l'ajout de vidéo n'est pas une obligation
             if ($_FILES['vid']["name"]!="")
             {
                $vidName = SauvegardeImage($_FILES["vid"]["name"], $_FILES["vid"]["tmp_name"],$_FILES["vid"]["size"]);
                
             }
             else{
                $vidName='' ;
             }
            if (isset($_FILES['photo']) )
            {
                $photoName = SauvegardeImage($_FILES["photo"]["name"], $_FILES["photo"]["tmp_name"],$_FILES["photo"]["size"]);

            if ($photoName != false || $vidName!= false) {

                //on met la photo dans un tableau car un produit peut avoir plusieurs photos
                $tabPhoto=Array($photoName);
                $tabPhoto=serialize($tabPhoto);

                //si c'est un admin qui met un produit en vente, son mail est celui de la société
                if ($_SESSION["type"]==2)
                {
                    $mail="amazonece123@gmail.com";
                }
                else
                     $mail=$_SESSION["user"];

                //adding the new user in users table
                if($Cat==2)
                {
                    $sql = "INSERT INTO products (Name,Price,Descr,Cat,Qty,Size,Color,Sex,Seller,Pic_loc,Vid_link) VALUES ('" . $name . "',  '" . $prix . "','$desc','$Cat','$Qt','$size','$couleur','$sexe','$mail', '$tabPhoto','$vidName')";
                }
                else
                {
                    $sql = "INSERT INTO products (Name,Price,Descr,Cat,Qty,Seller,Pic_loc,Vid_link) VALUES ('" . $name . "',  '" . $prix . "','$desc','$Cat','$Qt','$mail', '$tabPhoto','$vidName')";
                }
                if ($conn->query($sql) === TRUE) {
                    ?>
                    <script>
                        console.log("New record in users created successfully");
                    </script>
                    <?php
                     echo "<div class='main-center'><center>". $name . " a été crée. <br> <a href='HomePage.php'>Home Page</a></center></div>";
                         
                }
             else
                 echo "<div class='main-center'>Error: " . $sql . "<br>" . $conn->error . "</div>";


             
        }else if($photoName==false)
        {
            echo "<div class='main-center'> Erreur a l'enregistrement de la photo</div>";
        }
        else if($photoName==true)
        {
            echo "<div class='main-center'> Votre image est trop grosse</div>";
        }
    }else
    {
        echo "<div class='main-center'> Erreur a l'upload de la photo ";
        echo $_FILES["photo"]["name"]." & ".$_FILES["vid"]["name"]."</div>";
    }
   









    $conn->close();

    ?>
    </div>

</body>

</html>