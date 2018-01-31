<?php 
require_once('header.php');

$list = new DisplayBlog();
$list->showAllBlog();

echo '<hr>';


// frequent reload loop
echo '<meta http-equiv="refresh" content="30"/>';


require_once('footer.php');
?>