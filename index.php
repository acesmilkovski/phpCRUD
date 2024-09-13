<?php 
    require_once "./connection.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table of content</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <h1 style="text-align:center">Table Of Content</h1>
    <a href="./create.php" type="button" class="btn btn-success">New Record</a>
    <?php 
        $stmt = $conn->prepare("SELECT Id, fName, lName, email FROM Employee");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
    ?>
    <table class="table table-striped">
        <?php
            foreach($result as $row){
        ?>
            <tr>
                <td><?php echo $row['Id']?></td>
                <td><?php echo $row['fName']?></td>
                <td><?php echo $row['lName']?></td>
                <td><?php echo $row['email']?></td>
                <td><a type="button" class="btn btn-danger" href="./delete.php?id=<?php echo $row['Id']?>">Delete</a></td>
                <td><a type="button" class="btn btn-primary" href="./edit.php?id=<?php echo $row['Id']?>">Edit</a></td>
            </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>