<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert data into database using PHP PDO Re-db</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">

                <div class="card">
                    <div class="card-header">
                        <h3>Insert data into database using PHP PDO Re-db
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">

                    <form action="code.php" method="POST"  >
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="age">Age</label>
                            <input type="text" name="age" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="gender">Gender</label>
                            <input type="text" name="gender" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="contact">Contact</label>
                            <input type="text" name="contact" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="education_level">Education_level</label>
                            <!-- <input type="select" name="education_level" class="form-control" /> -->
                            <label for="education_level">Choose a level:</label>
                        <select name="education_level">
                        <?php
                        require_once 'dbcon.php';
                        try{
                            $query = "select * from education_level";
                            $query_run = $conn->prepare($query);
                            $query_run->execute();
                            $result = $query_run->fetchAll(PDO::FETCH_ASSOC);
                            if($result){
                                foreach($result as $row){
                                    ?>
                                    <option value='<?= $row['id'] ?>'><?=$row['education_name'] ?></option>
                                <?php
                                }
                            }
                        }catch(PDOException $e){
                            echo"error". $e->getMessage();
                        }
                            
                        ?>
                        
                        </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="save_teacher_btn" class="btn btn-primary">Save Teacher</button>
                        </div>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>