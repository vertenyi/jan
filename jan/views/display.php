
<?php
require_once('header.php');

$SelectTitle=new SelectTitle('index.php?menu=display');

if(isset($_POST['selecttitle'])){
	$list = new DisplayBlog();
	$list->showBlogItem($_POST['selecttitle']);
}

require_once('footer.php');
?>