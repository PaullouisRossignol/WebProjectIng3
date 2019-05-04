<?php

	include 'PhpFunctions.php';
        $conf_achat = 0;
        $conn = ConnectDatabase();

	$_SESSION['Panier']= array(252528,252529);
	if(isset($_SESSION["Panier"]))
    {
        if (sizeof($_SESSION["Panier"])!=0) 
        {
            for($i=0;$i<sizeof($_SESSION["Panier"]);$i++)
            {
                $sql ="SELECT * FROM products WHERE ID = '".$_SESSION["Panier"][$i]."'";
                $result = $conn->query($sql);
                    if (isset($result->num_rows)) 
                    {
                        if ($result->num_rows > 0) 
                        {
                            while ($row = $result->fetch_assoc()) 
                            {
                                $qteprc=$row["Qty"]-1;
                                $sql2 = 'UPDATE products SET Qty=';
                                $sql2.=$qteprc;
                                $sql2.=' WHERE ID=';
                                $sql2.=$_SESSION["Panier"][$i];
                                
                                if($conn->query($sql2))
                                {
                                    echo"Modification BDD OK ;)"; 
                                    unset($_SESSION["Panier"]);
                                }
                                else
                                {
                                    echo"Modification BDD PAS OK :C"; 
                                }
                            }
                        }
                        else
                            echo "Aucun résultat pour les id dans le Panier";
                    }      
            }
        }
        else
        {
            echo "Le Panier est vide";
        }
    }
    else
    {
        echo "Le Panier n'a pas été initialisé";
    }
?>