<?php
    require '../database/database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM events where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <title></title>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Read an Event</h3>
                    </div>
                     
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Date</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['date'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Time</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['time'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Location</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['location'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Description</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['description'];?>
                            </label>
                        </div>
                      </div>
                        <div class="form-actions">
                          <a class="btn" href="events.php">Back</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>