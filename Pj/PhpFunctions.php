<?php

//connect to the database after checking It exists with his tables
function ConnectDatabase()
{
    session_start();

    //declaration variables
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bdd_amazon_ece";

    ///     connection to Database and check if database and tables exist

    // Create connection and Check connection
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Set MySQLi to throw exceptions 

    try {
        $conn = @mysqli_connect($servername, $username, $password);
    } catch (mysqli_sql_exception $e) {

        $string = $e->getMessage();
        $string = preg_replace("#\n|\t|\r#", "", $string);
        $string = "Error trying to connect to mysql : " . $string;
        ?><script>
            console.log("<?php echo $string;  ?>");
        </script>
        <?php
        echo "<center style='font-size:12px'>|Connection failed to mysql|<br></center>";
        die();
    }
    mysqli_report(MYSQLI_REPORT_OFF);

    //connect and creating Database and tables

    $sql = "USE " . $dbname;
    //connecting to database
    if ($conn->query($sql) === TRUE) {
        $conn->set_charset('utf8');
        $conn->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
    }
    //If it not exist, we create it
    else {
        ?><script>
            console.log("<?php echo 'Error connecting to database: ' . $dbname . ' with error: ' . $conn->error; ?>");
        </script> <?php
            }

            return $conn;
        }
//code pour sauvegarder une image dans le répertoire du projet
function SauvegardeImage($fileName, $fileTMP, $fileSize)
{
    //répertoire de déstination
    $target_dir = "res/";
    $target_file = $target_dir . basename($fileName);
    ?><script>
        console.log(<?php echo "'$target_file'"; ?>);
    </script>
    <?php
    //on initialise la variable update ok
    $uploadOk = 1;
    //on recup l'extention du fichier
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);


    // le fichier existe déjà?
    if (file_exists($target_file)) {
        ?>
        <script>
            console.log("Le fichier existe déja");
        </script>
        <?php
        return $target_file;
        $uploadOk = 0;
    }

    // les formats autorisés
    if ($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "png" && $imageFileType != "PNG" && $imageFileType != "jpeg" && $imageFileType != "JPEG" && $imageFileType != "gif" && $imageFileType != "GIF") {
        ?><script>
            console.log("Format non autorisé");
        </script>
        <?php
        return false;
        $uploadOk = 0;
    }
    // erreur
    if ($uploadOk == 0) {
        ?><script>
            console.log("UploadOk=0");
        </script>
        <?php
        return false;

        // le poid de l'image
        if ($fileSize > 500000) {

            return true;
            $uploadOk = 0;
        }


        // tt c'est bien passé
    } else {
        if (move_uploaded_file($fileTMP, $target_file)) {

            ?>
            <script>
                console.log("Image ajoutée avec succès.");
            </script>
        <?php

    } else {
        ?><script>
                console.log("Probleme a l'enregistrement de l'image");
            </script>
            <?php
            return false;
        }
    }
    return $target_file;
}


?>