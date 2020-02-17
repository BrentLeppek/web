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
                        <h3>Update an Event</h3>
                    </div>
             
                    <form class="form-horizontal" action="updateevent.php?id=<?php echo $id?>" method="post">
                      <div class="control-group <?php echo !empty($dateError)?'error':'';?>">
                        <label class="control-label">Date</label>
                        <div class="controls">
                            <input name="date" type="date"  placeholder="Date" value="<?php echo !empty($date)?$date:'';?>">
                            <?php if (!empty($dateError)): ?>
                                <span class="help-inline"><?php echo $dateError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($timeError)?'error':'';?>">
                        <label class="control-label">Time</label>
                        <div class="controls">
                            <input name="time" type="time" placeholder="Time" value="<?php echo !empty($time)?$time:'';?>">
                            <?php if (!empty($timeError)): ?>
                                <span class="help-inline"><?php echo $timeError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($locationError)?'error':'';?>">
                        <label class="control-label">Location</label>
                        <div class="controls">
                            <input name="location" type="text"  placeholder="Location" value="<?php echo !empty($location)?$location:'';?>">
                            <?php if (!empty($locationError)): ?>
                                <span class="help-inline"><?php echo $locationError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($descriptionError)?'error':'';?>">
                        <label class="control-label">Description</label>
                        <div class="controls">
                            <input name="description" type="text"  placeholder="Description" value="<?php echo !empty($description)?$description:'';?>">
                            <?php if (!empty($descriptionError)): ?>
                                <span class="help-inline"><?php echo $descriptionError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn btn-light" href="events.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>