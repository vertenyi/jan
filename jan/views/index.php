<?php 
require_once('header.php');
?>

<p>
Na! Kezdjük már el....
</p>


<div>
filelist
<ul>

<?php

$files = scandir('.');
$path = '/jan/';

for($i=0; $i < (count($files)); $i++){
	if		(substr($files[$i], 0, 1)=='.'){}
	elseif	(substr($files[$i], 0, 1)=='_'){}
	elseif	(substr($files[$i], -4, 1)!='.'){}
	else{ 
		echo '<li><a href="'.$path.$files[$i].'" target="_blank">'.$files[$i].'</a></li>';
	}
}


?>
</ul>
</div>
<?php
require_once('footer.php');
?>