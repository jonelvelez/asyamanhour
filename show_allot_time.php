<?php 
if(!isset($_SESSION)){
    session_start();
}

include_once('login.php'); 
include_once("connections/DBconnection.php");

$db = new DBconnection();
$con = $db->connection();

if(isset($_POST['projectId'])) {

    $projectId = $_POST['projectId'];
    $services = $_POST['services'];
    $phase_of_work = $_POST['phase_of_work'];
    $userId = $_SESSION['UserId'];
    
    $query_allot_time = "SELECT * FROM managers_allot_time WHERE employee_id = '$userId' AND project_id = '$projectId' AND services = '$services' AND phase_of_work = '$phase_of_work'";
    $managers_allot_time = $con->query($query_allot_time) or die ($con->error);
    $allot_time = $managers_allot_time->fetch_assoc();

    echo $allot_time['remaining_time'];

}




?>