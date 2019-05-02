
<?php 
echo"<link href='creerCompte.css' rel='stylesheet' id='bootstrap-css'>";
session_start();
session_destroy(); 
/*session deleted. if you try using this you've got an error*/


echo"
	<div class='main'>
 		<div class='main-center'> 
 			<center> 
 				Vous êtes déconecté <br>
  				<a href='HomePage.php'> Home Page </a> 
  			</center> 
  		</div>
 	 </div>";
?>
