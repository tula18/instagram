<?php 
$con= mysqli_connect("127.0.0.1", "root", "Starkova24", "inst"); 

$query = mysqli_query($con, "INSERT INTO posts(users_id, text, location, image)

VALUES ('3',
		'".$_POST['text']."',
		'".$_POST['location']."',
		'images/".$_FILES['image']['name']."')");


move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $_FILES['image']['name']);

header('location: http://localhost/portfolio/instagram/feed/index.php');
 ?>