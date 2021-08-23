<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=u415020159_mantizc;charset=utf8', 'u415020159_mantizc', 'Mantizc*#17');
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
