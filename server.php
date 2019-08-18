<?php 
	session_start();
	$db = mysqli_connect('localhost', 'arma2', '123456', 'emps');

	// initialize variables
	$name = "";
	$address = "";
	$department = "";
	$salary = 0;
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];
		$department = $_POST['department'];
		$salary = $_POST['salary'];

		mysqli_query($db, "INSERT INTO employees (name, address, department, salary) VALUES ('$name', '$address', '$department', '$salary')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: index.php');
	}

	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$address = $_POST['address'];
		$department = $_POST['department'];
		$salary = $_POST['salary'];

		mysqli_query($db, "UPDATE employees SET name = '$name', address = '$address', department = '$department', salary = '$salary' WHERE id=$id");
		$_SESSION['message'] = "Address updated!"; 
		header('location: index.php');
	}

	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM employees WHERE id=$id");
		$_SESSION['message'] = "Address deleted!"; 
		header('location: index.php');
	}
