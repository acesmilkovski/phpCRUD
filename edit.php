<?php 
    require "./connection.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <?php 
        $id;
        $fName;
        $lName;
        $email;
        $idNumber;
        if($_SERVER['REQUEST_METHOD']==="GET"){
            $id = (int)$_GET['id'];
            $stmt = $conn->prepare("SELECT Id, fName, lName, email FROM Employee WHERE Id=:id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            $fName = $result[0]['fName'];
            $lName = $result[0]['lName'];
            $email = $result[0]['email'];
            $idNumber = (int)$id;
            $conn = null;
        }
    ?>
    <form method="POST">
        <p>Editing Record with Id <?php echo $id?></p>
        <input value="<?php echo $id?>" id="id" name="id" class="form-control" type="hidden" placeholder="Default input" aria-label="default input example">
        </br>
        <input value="<?php echo $fName?>" id="fName" name="fName" class="form-control" type="text" placeholder="Default input" aria-label="default input example">
        </br>
        <input value="<?php echo $lName?>" id="lName" name="lName" class="form-control" type="text" placeholder="Default input" aria-label="default input example">
        </br>
        <input value="<?php echo $email?>" id="email" name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </br>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
    <?php 
        if($_SERVER['REQUEST_METHOD']==="POST"){
            require "./connection.php";
            $id = (int)$_POST['id'];
            $fName = $_POST["fName"];
            $lName = $_POST["lName"];
            $email = $_POST["email"];
            $stmt = $conn->prepare("UPDATE Employee
            SET fName = :fName , lName = :lName , email = :email 
            WHERE Id = $id ");
            $stmt->bindParam(':fName', $fName);
            $stmt->bindParam(':lName', $lName);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            echo "Success";
            $conn = null;
            header("Location: index.php");
        }
    ?>
</body>
</html>