
<?php
require_once('header.php');

$users = new ViewUser();
$users->showAllUsers();
echo NewClass::staticMethod().' ';
echo NewClass::staticMethod().' ';
echo NewClass::staticMethod().' ';
echo NewClass::$static.' ';
echo NewClass::$static.'<br>';
$object = new NewClass('Object1'); // pass argument to constructor
$object2 = new NewClass('Object2');
var_dump($object);
echo $object->info.'<br>';
echo $object->name.'<br>';
echo $object->name().'<br>';
echo $object.'<br>';
unset($object); // delete object
echo $object2->getProp();
echo $object2->setProp('new data').'<br>';
echo $object2->getProp();
var_dump($object2);


require_once('footer.php');
?>