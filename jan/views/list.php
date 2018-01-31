<?php 
require_once('header.php');

$SelectCategory=new SelectCategory('index.php?menu=list');

if(isset($_POST['selectcategory'])){
	$list = new DisplayBlog();
	$list->showBlogByCat($_POST['selectcategory']);
}

//$list = new DisplayBlog();
//$list->showBlogByCat(0);

echo '<hr>';



require_once('footer.php');
?>