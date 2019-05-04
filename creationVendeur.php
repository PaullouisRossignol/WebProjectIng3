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
        $occurenceUser = 0;
        $occurenceCompte = 0;
        $conn = ConnectDatabase();


        $sql = "SELECT Email FROM users";
        $result = $conn->query($sql);

        if (isset($result->num_rows)) {
            if ($result->num_rows > 0) {

                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    if ($row["Email"] == $_POST["email"])
                        $occurenceUser += 1;
                }
            }
        }
        //This Pseudo is ok
        if ($occurenceUser == 0) {
            $Email = $_POST["email"];
            $password = $_POST["pwd"];
            $prenom = $_POST["prenom"];
            $nom = $_POST["nom"];
            
            if (isset($_FILES['photo'])  && isset($_FILES['font']))
            {
                $photoName = SauvegardeImage($_FILES["photo"]["name"], $_FILES["photo"]["tmp_name"],$_FILES["photo"]["size"]);
                $fontName = SauvegardeImage($_FILES["font"]["name"], $_FILES["font"]["tmp_name"],$_FILES["font"]["size"]);

            if ($photoName != false || $fontName!= false) {
                //adding the new user in users table
                $sql = "INSERT INTO users (Email,Password,Type) VALUES ('" . $Email . "',  '" . $password . "','1')";
                if ($conn->query($sql) === TRUE) {
                    ?>
                    <script>
                        console.log("New record in users created successfully");
                    </script>
                    <?php
                    $_SESSION["user"] = $Email;
                    $_SESSION["type"] = 0;

                    //adding the new user in clients table
                    $sql = "INSERT INTO seller (Email,Name,Surname,Pic_loc,Back_pic_loc) VALUES ('" . $Email . "',  '" . $nom . "','" . $prenom . "','" . $photoName . "','" . $fontName . "')";
                    if ($conn->query($sql) === TRUE) {
                        ?>
                        <script>
                            console.log("New record in seller created successfully");
                        </script>
                        <?php
                         
                } else
                    echo "<div class='main-center'>Error: " . $sql . "<br>" . $conn->error . "</div>";


                echo "<div class='main-center'><center>" . $prenom . " " . $nom . " is connected<br> <a href='HomePage.php'>Home Page</a></center></div>";
            } else {
                echo "<div class='main-center'>Error: " . $sql . "<br>" . $conn->error . "</div>";
            }
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
        echo "<div class='main-center'> Erreur a l'upload de la photo ".$_FILES['photo']."</div>";
    }
    } else {
        echo "<center><div class='main-center'  ><br>Ce pseudo existe déja.<br>Merci d'en choisir un autre.<br><br><a href='creerCompte.php'></a> </div></center>";
    }









    $conn->close();

    ?>
    </div>

</body>

</html>