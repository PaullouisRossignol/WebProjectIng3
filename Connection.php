<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Amazon ECE</title>
</head>

<body>
    <?php
    include 'PhpFunctions.php';
    //compteur utilisé pour vérifier que l'utilisateur est enregistré dans la bdd
    $connected = 0;

    //connection a la base de données
    $conn = ConnectDatabase();
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if (isset($result->num_rows)) {
            if ($result->num_rows > 0) {

                // parcourt de chaque ligne
                while ($row = $result->fetch_assoc()) {
                    if ($row["Email"] == $_POST["email"]) {
                            if ($row["Password"] == $_POST["pwd"]) {
                                    $_SESSION["user"] = $_POST["email"];
                                    $_SESSION["type"] = $row["Type"];
                                    echo "<center>" . $_POST["email"] . " est connecté comme un ";
                                    switch ($_SESSION["type"]) {
                                        case 0:
                                            echo "client.";
                                            break;
                                        case 1:
                                            echo "vendeur.";
                                            break;
                                        case 2:
                                            echo "admin.";
                                            break;
                                    }
                                    echo "<br><a href='index.html'>Home Page</a></center>";
                                    $connected += 1;
                                    break;
                                } else {
                                    echo "<center><div >Wrong password<br>Try again<br><a href='index.html'>Home Page</a></div></center>";
                                    $connected += 1;
                                    break;
                                }
                        }
                }
                if ($connected == 0)
                    echo "<center><div >Your pseudo does not exists<br>Please create an account<br><a href='index.html'>Home Page</a></div></center>";
            } else
                echo "<center><div>There is not any account yet<br>Please create an account<br><a href='index.html'>Home Page</a></div></center>";
        }
        else
            echo"<center><div>There is not any account on the database yet<br>Please create an account<br><a href='index.html'>Home Page</a></div></center>";

    $conn->close();








    ?>


</body>

</html>