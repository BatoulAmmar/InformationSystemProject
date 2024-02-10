<?php require('connection.php');?>
<?php

	$action = $_REQUEST['action'];
	
	if ($action == "selectAll" ) {
		$query = "select * from University" ; 
		$result= sqlsrv_query($conn, $query , array() , array("Scrollable" => "static")) or  die( print_r( sqlsrv_errors(), true)) ;
		$UniversityName= array() ;  
		while($row = sqlsrv_fetch_object($result)) {
			$UniversityName[] = $row ; 
		}
        header('Content-Type: application/json');
		echo json_encode($UniversityName) ;
		return;		
	}
	
		if ($action == "selectOne" ) {
		$id = $_REQUEST['CourseID'];
		$query = "select * from University where UniversityID = $id" ; 
		$result= sqlsrv_query($conn, $query , array() , array("Scrollable" => "static")) or  die( print_r( sqlsrv_errors(), true)) ;
		$courseName = array() ;  
		while($row = sqlsrv_fetch_object($result)) {
			$UniversityName[] = $row ; 
		}
		echo json_encode($UniversityName) ;
		return;		
	}

	if ($action == "delete") {
		$id = $_REQUEST['UniversityID'];
		$query = "delete from University where UniversityID = $id" ; 
		sqlsrv_query($conn, $query , array() , array("Scrollable" => "static")) or  die( print_r( sqlsrv_errors(), true)) ;
		echo json_encode(" Record has been deleted successfully ") ; 
		return; 

	}
	
	 $UniversityName = $_REQUEST['UniversityName'];
	//  complete all fields here...
	 
	 
	if ($action == "insert") {
			$query = "insert into University (UniversityName) values (N'$UniversityName') " ; 

	}
	
	if ($action == "update" )  {
			$id = $_REQUEST['UniversityID'];
			$query  = "update University set UniversityName = '$UniversityName' where UniversityID = $id " ;
		}
	sqlsrv_query($conn, $query , array() , array("Scrollable" => "static")) or  die( print_r( sqlsrv_errors(), true)) ;
	echo json_encode(" Record has been updated successfully ") ; 
			

?>