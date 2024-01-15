<?php
$servername="localhost";
$username="root";
$password="";
$database="myshop";
$connection = new mysqli($servername,$username,$password,$database);

$id="";
$name="";
$email="";
$phone="";
$adderss="";
$em="";
$m="";

 if($_SERVER['REQUEST_METHOD']=='GET')
 {
    if(!isset($_GET["id"]))
    {
        header("location: /myshop/index.php");
        exit;
    }
    $id=$_GET["id"];

    $sql="select * from client where id=$id";
    $r=$connection->query($sql);
    $row=$r->fetch_assoc();

    if(!$row)
    {
        header("location: /myshop/index.php");
        exit;
    }
    $name= $row["name"];
    $email=$row["email"];
    $phone=$row["phone"];
    $adderss=$row["adderss"];
    
 }
 else 
 {
    $id=$_POST["id"];
    $name= $_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $adderss=$_POST["adderss"];
 

 do{
    if(empty($id)||empty($name)|| empty($email)|| empty($phone)|| empty($adderss))
    {
        $em="All fields are required";
        break;
    }

    $sql = "UPDATE client SET name = '$name', email = '$email', phone = '$phone', adderss = '$adderss' WHERE id = $id";

    $result=$connection->query($sql);

if(!$result)
{
    $em="Invalid query:". $connection->error;
    break;
}

$m="Client added successfully";

header("location: /myshop/index.php");
exit;
}while(false);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studio Rich</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
       
</head>
<body>
    <div class="container">
        <h2>Edit Client</h2>
        <?php
        if(!empty($em))
        {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$em</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
<div class="row-mb-3">
    <label  class="col-sm-3 col-form-label">Name</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" name="name" value=" <?php echo $name; ?>">
    </div>
</div>
<div class="row-mb-3">
    <label  class="col-sm-3 col-form-label">Email</label>
    <div class="col-sm-6">
        <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
    </div>
</div>
<div class="row-mb-3">
    <label  class="col-sm-3 col-form-label">Phone</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
    </div>
</div>
<div class="row-mb-3">
    <label  class="col-sm-3 col-form-label">Address</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" name="adderss" value="<?php echo $adderss; ?>">
    </div>
</div>
<?php
        if(!empty($m))
        {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$m</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

    <br>
    <div>
    <button style="display: inline-block;" class="btn btn-primary" type="submit">Edit</button>
    <a style="display: inline-block;" class="btn btn-outline-primary" href="/myshop/index.php" role="button">Cancel</a>
</div>

</form>
    
</body>
</html>
