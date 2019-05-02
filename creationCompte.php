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
            $adr1 = $_POST["adr1"];
            $adr2 = ($_POST["adr2"] != "") ? $_POST["adr2"] : " ";
            $ville = $_POST["ville"];
            $codePost = $_POST["codePost"];
            $Pays = $_POST["Pays"];
            $phone = $_POST["phone"];
            $TypeCard = $_POST["TypeCard"];
            $numCard = $_POST["numCard"];
            $nameCard = $_POST["nameCard"];
            $dateExp = $_POST["dateExp"];
            $codeSec = $_POST["codeSec"];
            if (isset($_FILES['photo']))
            {
                $photoName = SauvegardeImage($_FILES["photo"]["name"], $_FILES["photo"]["tmp_name"],$_FILES["photo"]["size"]);
            

            if ($photoName != false) {
                //adding the new user in users table
                $sql = "INSERT INTO users (Email,Password,Type) VALUES ('" . $Email . "',  '" . $password . "','0')";
                if ($conn->query($sql) === TRUE) {
                    ?>
                    <script>
                        console.log("New record in users created successfully");
                    </script>
                    <?php
                    $_SESSION["user"] = $Email;
                    $_SESSION["type"] = 0;

                    //adding the new user in clients table
                    $sql = "INSERT INTO clients (Email,Name,Surname,Card_num,Pic_loc) VALUES ('" . $Email . "',  '" . $nom . "','" . $prenom . "','" . $numCard . "','" . $photoName . "')";
                    if ($conn->query($sql) === TRUE) {
                        ?>
                        <script>
                            console.log("New record in clients created successfully");
                        </script>
                        <?php
                        $sql = "SELECT Card_num FROM bank_info";
                        $result = $conn->query($sql);

                        if (isset($result->num_rows)) {
                            if ($result->num_rows > 0) {

                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    //on regarde si le compte existe déja 
                                    if ($row["Card_num"] == $numCard)
                                        $occurenceCompte += 1;
                                }
                            }
                        } //si on a pas trouvé de compte bancaire déja existant, on en crée un nouveau dans la bdd
                        if ($occurenceCompte == 0) {
                            $sql = 'INSERT INTO bank_info (Card_num,Type,Name_card,Exp_date,PostCode,Adr_1,Adr_2,City,Sec_code,Country,Phone_number) 
                            VALUES ("' . $numCard . '",  "' . $TypeCard . '","' . $nameCard . '","' . $dateExp . '","' . $codePost . '"
                            ,"' . $adr1 . '","' . $adr2 . '","' . $ville . '","' . $codeSec . '","' . $Pays . '","' . $phone . '");';

                            if ($conn->query($sql) === TRUE) {
                                ?>
                                <script>
                                    console.log("New record in bank_info created successfully");
                                </script>
                            <?php
                        } else
                            echo " <div class='main-center'>Error: " . $sql . "<br>" . $conn->error . "</div>";
                    } else
                        ?>
                        <script>
                            console.log("Card number already taken, no account created");
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