<?php 
require_once('header.php');
?>
Beállítások?

<?php 
echo '<hr><h3>Users:</h3>';

$users = new ShowAllUsers();

echo '<hr><h3>Error logs:</h3>';

$errorlog = new Errorlog();

require_once('footer.php');
?>