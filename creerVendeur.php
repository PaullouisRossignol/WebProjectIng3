<!DOCTYPE html>
<html lang="fr">

 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="creerCompte.css" rel="stylesheet" id="bootstrap-css">

    <title>Amazon ECE</title>
</head>

<body>
<div class="container">
                <div class="main">
                    <div class="main-center">
                    <h3 style="text-align: center">Inscrivez-vous pour avoir accès à notre formidable espace de vente !</h3>
                        <form enctype="multipart/form-data" method="POST" action="creationVendeur.php">
                            
                            <div class="form-group">
                                <label for="name"> Email</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                    <input type="email" class="form-control" name="email" id="name"  placeholder="Entrer votre email"required />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email"> Photo de profil</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                        <input style="font-size: 14px"  accept="image/*" type="file" id="photo" name="photo" required />
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="email"> Photo de fond d'écran</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                        <input style="font-size: 14px"  accept="image/*" type="file" id="font" name="font" required />
                                    </div>
                            </div>
    
                            <div class="form-group">
                                <label for="email"> Mot de passe</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                        <input type="password" class="form-control" name="pwd" placeholder="Entrer votre mot de passe"required />
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label for="username">Prenom</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="prenom" placeholder="Prenom"required />
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="username">Nom</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="nom" placeholder="Nom"required />
                                    </div>
                            </div>
                            
    
                    <button type="submit" style="border-radius:12px">SUBMIT</button>
                            
                        </form>
                    </div><!--main-center"-->
                </div><!--main-->
            </div><!--container-->
</body>

</html>