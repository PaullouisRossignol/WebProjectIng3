
<?php 
echo"<link href='creerCompte.css' rel='stylesheet' id='bootstrap-css'>";
if (session_id() == "") {
	session_start();
}
session_unset(); 



echo"
	<div class='main'>
 		<div class='main-center'> 
 			<center> 
 				Vous êtes déconnecté. <br>
  				<a href='HomePage.php'> Home Page </a> 
  			</center> 
  		</div>
 	 </div>";
?>
