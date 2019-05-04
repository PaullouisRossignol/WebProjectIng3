
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
    <script src="res/bootstrap-input-spinner.js"></script>

    <title>Amazon ECE</title>
</head>

<body>
    <script>
        $(document).ready(function() {

            $('#TypeProd').change(function() {

                if (document.getElementById("TypeProd").value == "Vetements") {
                    $('#vetements').show();
                } else {
                    $('#vetements').hide();
                }

            });
        });
    </script>

    <div class="container">
        <div class="main">
            <div class="main-center">
                <h3 style="text-align: center">Ajoutez un nouveau produit !</h3>
                <form enctype="multipart/form-data" method="POST" action="creationProduit.php">

                    <div class="form-group">
                        <label for="name"> Nom</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="name" id="name" placeholder="nom" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email"> Photo </label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                            <input style="font-size: 14px" accept="image/*" type="file" id="photo" name="photo" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email"> Vidéo </label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                            <input style="font-size: 14px" accept="video/*" type="file" id="vid" name="vid"  />
                        </div>
                    </div>

                    <div>
                        <div class="form-group">
                            <label for="username">Prix</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                <input type="number" class="form-control" min="0" name="prix" placeholder="Prix" required />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name"> Description </label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <textarea class="form-control" name="desc" rows="5" id="comment"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email"> Quantité</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                            <input type="number" class="form-control" min="1" name="Qt" placeholder="Quantité" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Catégorie de produit</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <select name="cat" id="TypeProd">
                                <option value="Livres">Livres</option>
                                <option value="Musique">Musique</option>
                                <option value="Vetements">Vêtements</option>
                                <option value="Sport">Sport & loisirs</option>
                            </select>
                        </div>

                        <div id="vetements" style="display:none">
                            <div class="form-group">
                                <label for="username">Taille</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                    <input type="number" class="form-control" name="taille" placeholder="Taille"  />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username">Couleur</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="couleur" placeholder="Couleur"  />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username">Morphologie</label>
                                <br>
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="radio1">
                                        <input type="radio" class="form-check-input" id="radio1" name="sexe" value="0" checked>Homme
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="radio2">
                                        <input type="radio" class="form-check-input" id="radio2" name="sexe" value="1">Femme
                                    </label>
                                </div>
                            </div>
                        </div>


                        <button type="submit" style="border-radius:12px">SUBMIT</button>

                </form>
            </div>
        </div>
    </div>
    <!-- bootstrap needs jQuery -->

    <script>
        $("input[type='number']").inputSpinner()
    </script>




</body>

</html>