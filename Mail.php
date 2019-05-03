<?php

    require_once('PHPMailer/PHPMailerAutoload.php');

    include 'PhpFunctions.php';
      
      $connected=0;

      $conn=ConnectDatabase();

      $adress=$_SESSION["user"];

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
                                                    <a href='HomePage.html'>Home Page</a>
                                                </div>
                                            </center>";
                    }


                    $content='Bonjour '.$Nom.' '. $Prenom.' vous recevez ce mail suite à une commande effectuer sur notre site web Eceamazone!';



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
    $mail->Subject = 'Hello World';
    $mail->Body = $content;
    $mail->AddAddress($adress);

    $mail->Send();

    ?>