<?php require('connection.php');?>
<?php

	$action = $_REQUEST['action'];
	
	if ($action == "selectAll" ) {
		$query = "select * from Course" ; 
		$result= sqlsrv_query($conn, $query , array() , array("Scrollable" => "static")) or  die( print_r( sqlsrv_errors(), true)) ;
		$courseName= array() ;  
		while($row = sqlsrv_fetch_object($result)) {
			$courseName[] = $row ; 
		}
        header('Content-Type: application/json');
		echo json_encode($courseName) ;
		return;		
	}
	
		if ($action == "selectOne" ) {
		$id = $_REQUEST['CourseID'];
		$query = "select * from Course where CourseID = $id" ; 
		$result= sqlsrv_query($conn, $query , array() , array("Scrollable" => "static")) or  die( print_r( sqlsrv_errors(), true)) ;
		$courseName = array() ;  
		while($row = sqlsrv_fetch_object($result)) {
			$courseName[] = $row ; 
		}
		echo json_encode($courseName) ;
		return;		
	}

	if ($action == "delete") {
		$id = $_REQUEST['CourseID'];
		$query = "delete from Course where CourseID = $id" ; 
		sqlsrv_query($conn, $query , array() , array("Scrollable" => "static")) or  die( print_r( sqlsrv_errors(), true)) ;
		echo json_encode(" Record has been deleted successfully ") ; 
		return; 

	}
	
	 $CourseName = $_REQUEST['CourseName'];
	//  complete all fields here...
	 
	 
	if ($action == "insert") {
			$query = "insert into Course (CourseName) values (N'$CourseName') " ; 

	}
	
	if ($action == "update" )  {
			$id = $_REQUEST['CourseID'];
			$query  = "update Course set CourseName = '$CourseName' where CourseID = $id " ;
		}
	sqlsrv_query($conn, $query , array() , array("Scrollable" => "static")) or  die( print_r( sqlsrv_errors(), true)) ;
	echo json_encode(" Record has been updated successfully ") ; 
			

?>