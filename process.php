<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'activitiesdatabase') or die(mysqli_error($mysqli));

$update=false;
$id = 0;
$name = '';
$street = '';
$city = '';
$county = '';
$state = '';

if(isset($_POST['save'])){
	$name = $_POST['name'];
	$street = $_POST['street'];
	$city = $_POST['city'];
	$county = $_POST['county'];
	$state = $_POST['state'];

	

	$mysqli->query("INSERT INTO activities (name, street, city, county, state) VALUES('$name', '$street', '$city', '$county', '$state')") or die($mysqli->error);

$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";
	
	header("location: sql.php");
}

if (isset($_GET['delete'])){
	$id = $_GET['delete'];

	

	$mysqli->query("DELETE FROM activities WHERE ID=$id") or die($mysqli->error);

$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header("location: index.php");
}

if(isset($_GET['edit'])){
	$id=$_GET['edit'];
	$update = true;
	$result=$mysqli->query("SELECT * FROM activities WHERE ID=$id") or die($mysqli->error);

	
		$row=$result->fetch_array();
		$name = $row['Name'];
		$street = $row['Street'];
		$city = $row['City'];
		$county = $row['County'];
		$state = $row['State'];
	
}

if(isset($_POST['update'])){
	$id = $_POST['id'];
	$name = $_POST['name'];
	$street = $_POST['street'];
	$city = $_POST['city'];
	$county = $_POST['county'];
	$state = $_POST['state'];

	$mysqli->query("UPDATE activities SET name='$name', street='$street', city='$city', county='$county', state='$state' WHERE id=$id") or die($mysqli->error);

	$_SESSION['message'] = "Record has been updated!";
	$_SESSION['msg_type'] = "warning";

	header('location: index.php');
}