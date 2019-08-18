<?php 

	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	
	$conn = new mysqli('localhost', 'arma2', '123456', 'emps');
	
	$result = $conn->query("SELECT * FROM employees");
	
	$outp = "";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	    if ($outp != "") {$outp .= ",";}
	    $outp .= '{"Name":"'  . $rs["name"] . '",';
	    $outp .= '"Address":"'   . $rs["address"]        . '",';
	    $outp .= '"Department":"'. $rs["department"]     . '",';
	    $outp .= '"Salary":"'. $rs["salary"]     . '"}';
	}
	$outp ='{"records":['.$outp.']}';
	$conn->close();
	
	echo($outp);
	
?>