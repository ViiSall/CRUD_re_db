<?php
    session_start();
    include 'dbcon.php';

    if(isset($_POST['delete_teacher'])){
        $teacher_id = $_POST['delete_teacher'];

        try{

            $query = "DELETE FROM teachers WHERE id=:teacher_id";
            $statement = $conn->prepare($query);
            $data = [
                ':teacher_id' => $teacher_id
            ];
            $query_execute = $statement->execute($data);

            if($query_execute) {
                $_SESSION['message'] = "Deleted Successfully";
                header('Location: index.php');
                exit(0);
            }else {
                $_SESSION['message'] = "Not Deleted";
                header('Location: index.php');
                exit(0);
            }
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    if(isset($_POST['update_teacher_btn'])){
        $teacher_id = $_POST['teacher_id'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $contact = $_POST['contact'];
        $education_level = $_POST['education_level'];

        try {
            $query = "UPDATE teachers SET name=:name, age=:age, gender=:gender, contact=:contact, education_level=:education_level WHERE id=:teacher_id LIMIT 1";
            $statement = $conn->prepare($query);
            
            $data = [
                ':name' => $name,
                ':age' => $age,
                ':gender' => $gender,
                ':contact' => $contact,
                ':education_level' => $education_level,
                ':teacher_id' => $teacher_id
            ];

            $query_execute = $statement->execute($data);

            if($query_execute) {
                $_SESSION['message'] = "Updated Successfully";
                header('Location: index.php');
                exit(0);
            }else {
                $_SESSION['message'] = "Not Updated";
                header('Location: index.php');
                exit(0);
            }
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    if(isset($_POST['save_teacher_btn'])) {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $contact = $_POST['contact'];
        $education_level = $_POST['education_level']; 

        try{
            $query = "INSERT INTO teachers (name, age, gender, contact, education_level) VALUES (:name, :age, :gender, :contact, :education_level)";
            $query_run = $conn->prepare($query);
        
            $data = [
                ':name' => $name,
                ':age' => $age,
                ':gender' => $gender,
                ':contact' => $contact,
                ':education_level' => $education_level
            ];
        
            $query_execute = $query_run->execute($data);
        
            if($query_execute) {
                $_SESSION['message'] = "Inserted Successfully";
                header('Location: index.php');
                exit(0);
            }else {
                $_SESSION['message'] = "Not Inserted";
                header('Location: index.php');
                exit(0);
            }
            }catch(PDOException $e) {
                echo $e->getMessage();
            }
    }
    
?>
