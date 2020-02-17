<?php
     
    require '../database/database.php';
 
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
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO events (date, time, location, description) values(?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($date, $time, $location, $description));
            Database::disconnect();
            header("Location: events.php");
        }
    }
?>