<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=u415020159_mantizb;charset=utf8', 'u415020159_mantizb', 'Mantizb*#17');
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
