<?php

$servername="localhost";
$username="root";
$password="";
$database="myshop";
$connection = new mysqli($servername,$username,$password,$database);

$name="";
$email="";
$phone="";
$adderss="";
 $em="";
 $m="";
if($_SERVER['REQUEST_METHOD']== 'POST'){
    $name= $_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $adderss=$_POST["adderss"];
}
do{
    if(empty($name)|| empty($email)|| empty($phone)|| empty($adderss))
    {
        $em="All fields are required";
        break;
    }
    $sql="insert into client(name,email,phone,adderss)". "values('$name' , '$email','$phone','$adderss' )";
    $result=$connection->query($sql);

    if(!$result)
    {
        $em="Invalid query:". $connection->error;
        break;
    }

$name="";
$email="";
$phone="";
$adderss="";
$m="Client added successfully";

header("location: /myshop/index.php");
}while(false);

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
        <h2>New Client</h2>
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
    <button style="display: inline-block;" class="btn btn-primary" type="submit">Submit</button>
    <a style="display: inline-block;" class="btn btn-outline-primary" href="/myshop/index.php" role="button">Cancel</a>
</div>

</form>
    
</body>
</html>
