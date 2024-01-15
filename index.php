<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studio Rich</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <h2>List of clients</h2>
        <a class="btn btn-primary" href="./create.php" role="button">New client </a>
        <br>
        <table class="table">
            <thead>      
                <tr>
                    <th>ID</th> 
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>ADDRESS</th>
                    <th>CREATED AT</th>
                    <th>ACTION</th>
                    </tr>     
                 </thead>
                 <tbody>
                    <?php
                    $servername="localhost";
                    $username="root";
                    $password="";
                    $database="myshop";
                    $connection = new mysqli($servername,$username,$password,$database);

                    if($connection->connect_error)
                    {
                        die("connection failed:" . $connection->connect_error );
                    }
                    $sql="SELECT * FROM client";
                    $result=$connection->query($sql);
                    if(!$result)
                    {
                        die("invalid query:" . $connection->error);
                    }
                    while($row = $result->fetch_assoc())
                    {
                        echo"
                        <tr>
                        <td>$row[id]</td>
                        <td>$row[name]</td>
                        <td>$row[email]</td>
                        <td>$row[phone]</td>
                        <td>$row[adderss]</td>
                        <td>$row[created_at]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='./edit.php?id=$row[id]'>EDIT</a>
                            <a class='btn btn-danger btn-sm' href='./delete.php?id=$row[id]' >DELETE</a>
                        </td>
</tr>
                        ";
                    }
                    ?>
                   
</tbody>



        </table>
    </div>
</body>
</html>