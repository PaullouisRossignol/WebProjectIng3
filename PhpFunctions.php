<?php

//connect to the database after checking It exists with his tables
function ConnectDatabase()
{
    session_start();

//declaration variables
$servername = "localhost";
$username = "username";
$password = "";
$dbname = "bdd_amazon_ece";

                            ///     connection to Database and check if database and tables exist

// Create connection and Check connection
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Set MySQLi to throw exceptions 

try {
    $conn = @mysqli_connect($servername, $username, $password);
} catch (mysqli_sql_exception $e) {
    
    $string=$e->getMessage();
    $string=preg_replace("#\n|\t|\r#","",$string);
    $string="Error trying to connect to mysql : ".$string;
    ?><script> console.log( "<?php echo $string;  ?>");</script>
<?php
echo "<center style='font-size:12px'>|Connection failed to mysql|<br></center>";
die();
}
mysqli_report(MYSQLI_REPORT_OFF);

//connect and creating Database and tables

    $sql = "USE ".$dbname;
    //connecting to database
    if ($conn->query($sql) === TRUE) {
        echo "<center style='font-size:12px'>|Connected to database|<br></center>";
        $conn->set_charset('utf8');
        $conn->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
    } 
    //If it not exist, we create it
    else {
        ?><script> console.log( "<?php echo 'Error connecting to database: '.$dbname.' with error: ' . $conn->error; ?>");</script> <?php 
        }
          
    return $conn;
}


?>