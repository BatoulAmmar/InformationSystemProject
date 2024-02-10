<?php require('connection.php');

$action = $_REQUEST['action'];

if ($action == "selectAll") {
    $query = "select * from Degree";
    $result = sqlsrv_query($conn, $query, array(), array("Scrollable" => "static")) or die(print_r(sqlsrv_errors(), true));
    $degrees = array();
    while ($row = sqlsrv_fetch_object($result)) {
        $degrees[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($degrees);
    return;
}

if ($action == "selectOne") {
    $id = $_REQUEST['DegreeID'];
    $query = "select * from Degree where DegreeID = $id";
    $result = sqlsrv_query($conn, $query, array(), array("Scrollable" => "static")) or die(print_r(sqlsrv_errors(), true));
    $degreeDetails = array();
    while ($row = sqlsrv_fetch_object($result)) {
        $degreeDetails[] = $row;
    }
    echo json_encode($degreeDetails);
    return;
}

if ($action == "delete") {
    $id = $_REQUEST['DegreeID'];
    $query = "delete from Degree where DegreeID = $id";
    sqlsrv_query($conn, $query, array(), array("Scrollable" => "static")) or die(print_r(sqlsrv_errors(), true));
    echo json_encode("Record has been deleted successfully");
    return;
}

$degreeName = $_REQUEST['DegreeName'];

if ($action == "insert") {
    $query = "insert into Degree (DegreeName) values (N'$degreeName')";
}

if ($action == "update") {
    $id = $_REQUEST['DegreeID'];
    $query = "update Degree set DegreeName = '$degreeName' where DegreeID = $id";
}

sqlsrv_query($conn, $query, array(), array("Scrollable" => "static")) or die(print_r(sqlsrv_errors(), true));
echo json_encode("Record has been updated successfully");
?>
