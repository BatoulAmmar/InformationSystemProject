<?php require('connection.php');

$action = $_REQUEST['action'];

if ($action == "selectAll") {
    $query = "select * from Major";
    $result = sqlsrv_query($conn, $query, array(), array("Scrollable" => "static")) or die(print_r(sqlsrv_errors(), true));
    $majorList = array();
    while ($row = sqlsrv_fetch_object($result)) {
        $majorList[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($majorList);
    return;
}

if ($action == "selectOne") {
    $id = $_REQUEST['MajorID'];
    $query = "select * from Major where MajorID = $id";
    $result = sqlsrv_query($conn, $query, array(), array("Scrollable" => "static")) or die(print_r(sqlsrv_errors(), true));
    $majorDetails = array();
    while ($row = sqlsrv_fetch_object($result)) {
        $majorDetails[] = $row;
    }
    echo json_encode($majorDetails);
    return;
}