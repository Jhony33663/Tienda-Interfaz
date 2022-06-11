<?php
include("Admin/BDD/Conexion.php");
include("fpdf/fpdf.php"); // libreria fpdf 


echo "aqui ---->";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Pagar"])) {

$idFactura=$_POST['idfactura'];


if(isset($idFactura)){

  echo $idFactura;

}


}
  



      ?> 
 
