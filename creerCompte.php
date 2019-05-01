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
<div class="container">
                <div class="main">
                    <div class="main-center">
                    <h3 style="text-align: center">Inscrivez-vous pour avoir accès à toute notre gamme de produits !</h3>
                        <form enctype="multipart/form-data" method="POST" action="creationCompte.php">
                            
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
                            <h4>Adresse de livraison</h4>
                            <div class="form-group">
                                <label for="password">Adresse</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="adr1" placeholder="Ligne Adresse 1"required />
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="adr2" placeholder="Ligne Adresse 2"/>
                                    </div>
                            </div>
    
                            <div class="form-group">
                                <label for="password">Ville</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="ville" placeholder="Ville"required />
                                    </div>
                                    <br>
                                    
                            </div>
                            <div class="form-group">
                                <label for="password">Code Postal</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="codePost" placeholder="Code Postal"required />
                                    </div>
                                    <br>
                                    
                            </div>
                            <div class="form-group">
                                <label for="password">Pays</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="Pays" placeholder="Pays"required />
                                    </div>
                                    <br>
                                    
                            </div>
                            <div class="form-group">
                                <label for="password">Numéro de téléphone</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="phone" placeholder="téléphone"required />
                                    </div>
                                    <br>
                                    
                            </div>
                            <h4>Coordonnées bancaire</h4>
                            <div class="form-group">
                                <label for="password">Type de carte de crédit</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <select name="TypeCard" >
                                            <option value="Visa">Visa</option>
                                            <option value="Master Card">Master Card</option>
                                            <option value="American Express">American Express</option>
                                        </select>
                                    </div>
                                    <br>
                                    
                            </div>
                            <div class="form-group">
                                <label for="password">Numéro de carte</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="numCard" placeholder="Numéro de carte"required />
                                    </div>
                                    <br>
                                    
                            </div>
                            <div class="form-group">
                                <label for="password">Nom du propriétaire</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="nameCard" placeholder="Nom du propriétaire"required />
                                    </div>
                                    <br>
                                    
                            </div>
                            <div class="form-group">
                                <label for="password">Date d'expiration</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input style="font-size:13px; color:lightslategray" type="date" class="form-control" name="dateExp" placeholder="Date d'expiration"required />
                                    </div>
                                    <br>
                                    
                            </div>
                            <div class="form-group">
                                <label for="password">Code de sécurité</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="codeSec" placeholder="Code de sécurité"required />
                                    </div>
                                    <br>
                                    
                            </div>
    
                    <button type="submit" style="border-radius:12px">SUBMIT</button>
                            
                        </form>
                    </div><!--main-center"-->
                </div><!--main-->
            </div><!--container-->
</body>

</html>