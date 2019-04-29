<!DOCTYPE html>
<html lang="fr">

 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="Login.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Amazon ECE</title>
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="Connection" />
            </div>

            <!-- Login Form -->
            <form action="Connection.php" method="POST">
                <input type="text" id="login" class="fadeIn second" name="email" placeholder="Email">
                <input type="password" id="password" class="fadeIn third" name="pwd" placeholder="password">
                <input type="submit" class="fadeIn fourth" value="Se connecter">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="creerCompte.html">Pas encore de compte?</a>
            </div>

        </div>
    </div>

</body>

</html>