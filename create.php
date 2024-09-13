<?php 
    require_once "./connection.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <form method="POST">
        <input id="Id" name="Id" class="form-control" type="text" placeholder="Default input" aria-label="default input example">
        </br>
        <input id="fName" name="fName" class="form-control" type="text" placeholder="Default input" aria-label="default input example">
        </br>
        <input id="lName" name="lName" class="form-control" type="text" placeholder="Default input" aria-label="default input example">
        </br>
        <input id="email" name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </br>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
    <?php 
        if($_SERVER['REQUEST_METHOD']==="POST"){
            $id = (int)$_POST["Id"];
            $fName = $_POST["fName"];
            $lName = $_POST["lName"];
            $email = $_POST["email"];
            //var_dump($id, $fName, $lName, $email);
            $stmt = $conn->prepare('INSERT INTO Employee ( Id , fName , lName , email ) VALUES ( :id, :fName, :lName, :email)');
            $stmt->bindParam(':id', $id);
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