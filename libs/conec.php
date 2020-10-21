<?php
if($con=mysql_connect("localhost:3306","root","abcdef")){
  mysql_select_db("kabum",$con);
}
else{
	header("Location:erro.php");
}      	

function limpa_campo($string) {
   $string = str_replace(' ', '-', $string);
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
}      
?>
