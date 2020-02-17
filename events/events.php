<!DOCTYPE html>
<html>
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
            <div class="row">
                <h3>Events Grid</h3>
            </div>
            <div class="row">
                <p>
                    <a href="eventcreate.php" class="btn btn-success">Create</a>
                </p>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Location</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include '../database/database.php';
                            $pdo = Database::connect();
                            $sql = 'SELECT * FROM events ORDER BY id DESC';
                            foreach($pdo->query($sql) as $row) {
                                echo '<tr>';
                                echo '<td>'. $row['date'] . '</td>';
                                echo '<td>'. $row['time'] . '</td>';
                                echo '<td>'. $row['location'] . '</td>';
                                echo '<td>'. $row['description'] . '</td>';
                                echo '<td width=250>';
                                echo '<a class="btn btn-light" href="eventread.php?id='.$row['id'].'">Read</a>';
                                echo '';
                                echo '<a class="btn btn-success" href="eventupdate.php?id='.$row['id'].'">Update</a>';
                                echo '';
                                echo '<a class="btn btn-danger" href="eventdelete.php?id='.$row['id'].'">Delete</a>';
                                echo '</td>';
                                echo '</tr>';
                            }
                            Database::disconnect();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
