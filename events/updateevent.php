<?php
    require '../database/database.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: events.php");
    }
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $dateError = null;
        $timeError = null;
        $locationError = null;
        $descriptionError = null;
         
        // keep track post values
        $date = $_POST['date'];
        $time = $_POST['time'];
        $location = $_POST['location'];
        $description = $_POST['description'];
         
        // validate input
        $valid = true;
        if (empty($date)) {
            $dateError = 'Please enter Date';
            $valid = false;
        }
         
        if (empty($time)) {
            $timeError = 'Please enter Time';
            $valid = false;
        }
         
        if (empty($location)) {
            $locationError = 'Please enter Location';
            $valid = false;
        }
        
        if (empty($description)) {
            $descriptionError = 'Please enter Description';
            $valid = false;
        }        
         
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE events  set date = $date, time = $time, location = $location, description = $description WHERE id = $id";
            $q = $pdo->prepare($sql);
            $q->execute(array($date,$time,$location,$description,$id));
            Database::disconnect();
            header("Location: events.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM events where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $date = $data['date'];
        $time = $data['time'];
        $location = $data['location'];
        $description = $data['description'];
        Database::disconnect();
    }
?>