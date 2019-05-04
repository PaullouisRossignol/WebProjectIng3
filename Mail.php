<?php

    require_once('PHPMailer/PHPMailerAutoload.php');

    include 'PhpFunctions.php';
      
      $connected=0;

      $conn=ConnectDatabase();

      $adress=$_SESSION["user"];
      $prix=0;
      if (isset($_SESSION["total_price"])) 
      {
          $prix=$_SESSION["total_price"];
      }
       $sql="SELECT * FROM clients WHERE Email = '".$_SESSION["user"]."'";
       $result = $conn->query($sql);

                    if (isset($result->num_rows)) 
                    {
                        if ($result->num_rows > 0) 
                            {
                              while ($row = $result->fetch_assoc()) 
                                {
                                    $Nom=$row['Name'];
                                    $Prenom=$row['Surname'];
                                    $num=$row['Card_num'];
                                }
                            } else  echo "<center>
                                                <div>
                                                    Erreur La carte n'a pas été trouvée <br>
                                                    <a href='HomePage.php'>Home Page</a>
                                                </div>
                                            </center>";
                    }


                    $content=
                    '<body> <center><h1>Merci de Votre achat!</h1>
                    <p> Bonjour '. $Prenom.' '.$Nom.' vous recevez ce mail suite a une commande d un montant de : '.$prix.' effectuer sur notre site web Eceamazone!</p>
                    <p>Retrouvez votre compte <a href="http://localhost/maisquoi/MyAccount.php">ICI</a>. </center> </body>';




    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '465';
    $mail->isHTML();
    $mail->Username = 'amazonece123@gmail.com';
    $mail->Password = 'rntM6GP5TV96tA6x';
    $mail->SetFrom('amazonece123@gmail.com');
    $mail->Subject = 'Confirmation de payement';
    $mail->Body = $content;
    $mail->AddAddress($adress);

    $mail->Send();

    ?>