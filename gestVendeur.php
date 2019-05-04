<!DOCTYPE html>
<html>

<head>
    <title>ECE Amazon</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="HomePage.css">
    <script type="text/javascript">
    function checkSuppr(email)
        {
            var r = confirm("L'utilisateur " + email+ " sera supprimé ainsi que tout ses produits mis en vente.");
            if (r == true) {
                document.location.href = "suppVendeur.php?compte=" + email ;
            } 
        }
        $(document).ready(function() {
            $('.header').height($(window).height());
        });
        
    </script>
    <style>
    #suppr {
        color:blue;
        text-decoration: underline;
    }
    #suppr:hover{
        color:red;
        text-decoration: none;
    }
    
    </style>
</head>

<body>


    <!------ HEADER NAVBAR ----------> 
    <?php include("header.php"); ?>


    <!------ CONTAINER BODY ---------->
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-11">

                <?php
                include "PhpFunctions.php";


                //connection a la base de données
                $conn = ConnectDatabase();
                $sql = "SELECT * FROM Seller";
                $result = $conn->query($sql);

                if (isset($result->num_rows)) {
                    if ($result->num_rows > 0) {
                        echo "<table class='table'> <caption style='caption-side: top;'> Liste des vendeurs</caption>";
                        echo "<thead class='thead-dark'><tr><th> </th>  <th> Nom</th>  <th>Prénom </th>  <th> Email</th> <th> </th> ";
                        echo "</tr></thead>";

                        // parcourt de chaque ligne
                        while ($row = $result->fetch_assoc()) {
                            $mail="'".$row['Email']."'";
                            $string='onclick="checkSuppr(' . $mail . ')"';
                            echo "<tr><td>   <img src='" . $row['Pic_loc'] . "' class='img-thumbnail' alt='Photo de Profil' width='114.5' height='100'> </td>";
                            echo "<td>" . $row['Name'] . "</td>";
                            echo "<td>" . $row['Surname'] . "</td>";
                            echo "<td>" . $row['Email'] . "</td>";
                            echo "<td> <div id ='suppr'".$string."  > supprimer ce vendeur  </div></td></tr>";
                        }
                    } else
                        echo "<center><div>Il n'y a pas de compte Vendeur<br><a href='HomePage.html'>Home Page</a></div></center>";
                    echo "</table>";

                    echo "<form  method='POST' action='creerVendeur.php'>
        <button type='submit' class='btn btn-success' >Ajouter un utilisateur</button></form> <br>";
                } else
                    echo "<center><div>Il n'y a pas de compte dans la base de données<br><br><a href='HomePage.php'>Home Page</a></div></center>";

                $conn->close();
                ?>
            </div>

        </div>
    </div>

    <!------ FOOTER ---------->
    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <h6 class="text-uppercase font-weight-bold">Information additionnelle</h6>
                    <p>
                        Sed aliquet dolor id sapien rutrum, id vulputate quam iaculis.
                    </p>
                    <p>
                        Sed aliquet dolor id sapien rutrum, id vulputate quam iaculis.
                    </p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <h6 class="text-uppercase font-weight-bold">Contact</h6>
                    <p>
                        37, quai de Grenelle, 75015 Paris, France <br>
                        info@webDynamique.ece.fr <br>
                    </p>
                </div>
            </div>
        </div>
        <div class="footer-copyright text-center">&copy; 2019 Copyright | Droit d'auteur: webDynamique.ece.fr</div>
    </footer>



</body>

</html>















