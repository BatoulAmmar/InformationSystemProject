<?php require('connection.php');?>
<?php
	$action = $_REQUEST['action'];
	if ($action == "selectAll" ) {
		$query = "select * from Level" ; 
		$result= sqlsrv_query($conn, $query , array() , array("Scrollable" => "static")) or  die( print_r( sqlsrv_errors(), true)) ;
		$arr = array() ;  
		while($row = sqlsrv_fetch_object($result)) {
			$arr[] = $row ; 
		}
		echo json_encode($arr) ;
		return;		
	}
	
		if ($action == "selectOne" ) {
			$id = $_REQUEST['LevelID'];
		$query = "select * from Level where LevelID = $id" ; 
		$result= sqlsrv_query($conn, $query , array() , array("Scrollable" => "static")) or  die( print_r( sqlsrv_errors(), true)) ;
		$arr = array() ;  
		while($row = sqlsrv_fetch_object($result)) {
			$arr[] = $row ; 
		}
		echo json_encode($arr) ;
		return;		
	}
	
	
	if ($action == "delete") {
		
		$id = $_REQUEST['LevelID'];
		
		$query = "delete from Level where LevelID = $id" ; 
		sqlsrv_query($conn, $query , array() , array("Scrollable" => "static")) or  die( print_r( sqlsrv_errors(), true)) ;
		echo json_encode(" Record has been deleted successfully ") ; 
		return; 

	}
	
	 $Level = $_REQUEST['Level'];
	//  complete all fields here...
	 
	 
	if ($action == "insert") {
			$query = "insert into Level (LevelName) values (N'$Level', ....) " ; 

	}
	
	if ($action == "update" )  {
			$id = $_REQUEST['LevelID'];
			$query  = "update Level set LevelName = '$Level' where LevelID = $id " ;
		}
	sqlsrv_query($conn, $query , array() , array("Scrollable" => "static")) or  die( print_r( sqlsrv_errors(), true)) ;
	echo json_encode(" Record has been updated successfully ") ; 	
?>