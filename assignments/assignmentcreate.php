<?php
require '../database/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Create an Assignment</h3>
                    </div>
             
                    <form class="form-horizontal" action="insertassignment.php" method="post">
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                           <?php
							$pdo = Database::connect();
							$sql = 'SELECT * FROM customers';
							echo "<select class='form-control' name='person' id='person_id'>";
							if($eventid) // if $_GET exists restrict person options to logged in user
								foreach ($pdo->query($sql) as $row) {
									if($personid==$row['id'])
										echo "<option value='" . $row['id'] . " '> " . $row['name'] . "</option>";
								}
							else
								foreach ($pdo->query($sql) as $row) {
									echo "<option value='" . $row['id'] . " '> " . $row['name'] . "</option>";
								} 
							echo "</select>"; 
							Database::disconnect();
						?> 
                        </div>
                      </div>
                      <div class="control-group" <?php echo !empty($eventError)?'error':'';?>>
                        <label class="control-label">Event</label>
                        <div class="controls">
                            <?php
							$pdo = Database::connect();
							$sql = 'SELECT * FROM events ORDER BY date ASC, time ASC';
							echo "<select class='form-control' name='event' id='event_id'>";
							if($eventid) // if $_GET exists restrict person options to logged in user
								foreach ($pdo->query($sql) as $row) {
									if($personid==$row['id'])
										echo "<option value='" . $row['id'] . " '> " . $row['date'] . " " . $row['time'] . " " . $row['description'] . "</option>";
								}
							else
								foreach ($pdo->query($sql) as $row) {
									echo "<option value='" . $row['id'] . " '> " . $row['date'] . " " . $row['time'] . " " . $row['description'] . "</option>";
								}
							echo "</select>";
							Database::disconnect();
						?> 
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="assignments.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>