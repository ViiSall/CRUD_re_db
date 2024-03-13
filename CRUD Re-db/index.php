<?php 
    session_start(); 
    include('dbcon.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PDO Re-db</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">

            <?php if(isset($_SESSION['message'])) : ?>
                <h5 class="alert alert-success"><?= $_SESSION['message'] ?></h5>
            <?php 
            unset($_SESSION['message']);
            endif; 
            ?>
                <div class="card">
                    <div class="card-header">
                        <h3>PHP CRUD PDO Re-db
                            <a href="teacher-add.php" class="btn btn-primary float-end">Add Teacher</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Contact</th>
                                    <th>Education_Level</th>
                                    <th>Edit</th>
                                    <th>Delect</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM teachers";
                                    $statement = $conn->prepare($query);
                                    $statement->execute();

                                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                    if($result){
                                        foreach($result as $row){
                                            ?>
                                            <tr>
                                                <td><?= $row['id']; ?></td>
                                                <td><?= $row['name']; ?></td>
                                                <td><?= $row['age']; ?></td>
                                                <td><?= $row['gender']; ?></td>
                                                <td><?= $row['contact']; ?></td>
                                                <td><?= $row['education_level']; ?></td>
                                                <td>
                                                    <a href="teacher-edit.php?id=<?= $row['id']; ?>" class="btn btn-primary">Edit</a>
                                                </td>
                                                <td>
                                                    <form action="code.php" method="POST">
                                                        <button type="submit" name="delete_teacher" value="<?= $row['id']; ?>" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }else{
                                        ?>
                                        <tr>
                                            <td colspan="6">No Record Found</td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>