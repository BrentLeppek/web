<?php
    require '../database/database.php';
    if ( !empty($_POST)) {
    
    	// initialize user input validation variables
    	$nameError = null;
    	$eventError = null;
    	
    	// initialize $_POST variables
    	$name = $_POST['name'];    // same as HTML name= attribute in put box
    	$event = $_POST['event'];
    	
    	// validate user input
    	$valid = true;
    	if (empty($name)) {
    		$nameError = 'Please choose a customer';
    		$valid = false;
    	}
    	if (empty($event)) {
    		$eventError = 'Please choose an event';
    		$valid = false;
    	} 
    		
    	// insert data
    	if ($valid) {
    		$pdo = Database::connect();
    		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		$sql = "INSERT INTO assignments (assign_per_id,assign_event_id) values(?, ?)";
    		$q = $pdo->prepare($sql);
    		$q->execute(array($name,$event));
    		Database::disconnect();
    		header("Location: assignment.php");
    	}
    }
?>