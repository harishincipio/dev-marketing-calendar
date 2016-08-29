<?php 
try {
    $id = $_POST['id'];
	 echo $id;
} catch (PDOException $e){
	print "Error: " . $e->getMessage();
	die();
}
?>