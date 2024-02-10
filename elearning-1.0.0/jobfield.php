<?php require('connection.php');

$action = $_REQUEST['action'];

if ($action == "selectAll") {
    $query = "select * from JobField";
    $result = sqlsrv_query($conn, $query, array(), array("Scrollable" => "static")) or die(print_r(sqlsrv_errors(), true));
    $jobFields = array();
    while ($row = sqlsrv_fetch_object($result)) {
        $jobFields[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($jobFields);
    return;
}

if ($action == "selectOne") {
    $id = $_REQUEST['JobID'];
    $query = "select * from JobField where JobID = $id";
    $result = sqlsrv_query($conn, $query, array(), array("Scrollable" => "static")) or die(print_r(sqlsrv_errors(), true));
    $jobFieldDetails = array();
    while ($row = sqlsrv_fetch_object($result)) {
        $jobFieldDetails[] = $row;
    }
    echo json_encode($jobFieldDetails);
    return;
}

if ($action == "delete") {
    $id = $_REQUEST['JobID'];
    $query = "delete from JobField where JobID = $id";
    sqlsrv_query($conn, $query, array(), array("Scrollable" => "static")) or die(print_r(sqlsrv_errors(), true));
    echo json_encode("Record has been deleted successfully");
    return;
}

$jobName = $_REQUEST['JobName'];

if ($action == "insert") {
    $query = "insert into JobField (JobName) values (N'$jobName')";
}

if ($action == "update") {
    $id = $_REQUEST['JobID'];
    $query = "update JobField set JobName = '$jobName' where JobID = $id";
}

sqlsrv_query($conn, $query, array(), array("Scrollable" => "static")) or die(print_r(sqlsrv_errors(), true));
echo json_encode("Record has been updated successfully");
?>
