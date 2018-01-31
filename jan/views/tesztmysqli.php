
<?php
require_once('header.php');

echo 'q: <br>';
print_r(q("SELECT * FROM teszt"));
//echo '<br>Pre query pq: <br>';
//pq("SELECT * FROM teszt");
echo '<br>Table query tq: <br>';
tq("SELECT * FROM teszt","text","");
echo '<br>Table query tq: <br>';
tq("SELECT * FROM faq","text","");
echo '<br>Table query tq: <br>';
tq("SELECT * FROM text","text","");

require_once('footer.php');
?>