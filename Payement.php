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
                    <h3 style="text-align: center">Veuillez rentrer vos infortmations de payement</h3>
                        <form enctype="multipart/form-data" method="POST" action="ConfirmationPayement.php">

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
                                        <input type="password" class="form-control" name="numCard" placeholder="Numéro de carte"required />
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
                                        <input type="password" class="form-control" name="codeSec" placeholder="Code de sécurité"required />
                                    </div>
                                    <br>
                                    
                            </div>
    
                    <button type="submit" style="border-radius:5px">SUBMIT</button>
                            
                        </form>
                    </div><!--main-center"-->
                </div><!--main-->
            </div><!--container-->
</body>

</html>