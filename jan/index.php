<?php 
// this is my rooting, for now
if(isset($_GET['menu'])){
	require_once('views/'.$_GET['menu'].'.php');
}else{require_once('views/index.php');}
?>