<?php include_once('connections/DBconnection.php'); ?>
<?php include_once('login.php') ?>

<?php 

$db = new DBconnection();
$con = $db->connection();

    if(isset($_POST['strDate'])){

       $userId = $_SESSION['UserId'];
       $strDate = $_POST['strDate'];

       $query_employee_work_update = "SELECT * FROM `employees_updates_task` WHERE employee_id = '$userId' AND date = '$strDate' ORDER BY id ASC";
       $employee_work_update = $con->query($query_employee_work_update) or die ($con->error);
       $row = $employee_work_update->fetch_assoc();

       $output = '';

       if($employee_work_update->num_rows != 0){
        
            do {

                $output .= "<tr class='mylogs_update' id='". $row['id'] ."'>
                    <td>". $row['project_name'] ."</td>
                    <td>". $row['services'] ."</td>
                    <td>". $row['phase_of_work'] ."</td>
                    <td class='taskId' value='" . $row['task_id'] . "'>". $row['task_title'] ."</td>
                    <td>". $row['task_update'] ."</td>
                    <td class='spendHours'>". $row['spend_hours'] ."</td>
                    <td class='delete_update_task'>-</td>
                </tr>";

            } while($row = $employee_work_update->fetch_assoc());

        }

        // $query_employee_work_update = "SELECT * FROM `employees_updates` WHERE employee_id = '$userId' AND date = '$strDate' ORDER BY id ASC";
        // $employee_work_update = $con->query($query_employee_work_update) or die ($con->error);
        // $row = $employee_work_update->fetch_assoc();

        echo $output;
    
    }

?>