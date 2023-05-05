<?php

include('function.php');

$objCrud=new MyCrud();

if(isset($_POST['submit'])){
  $return_msg  = $objCrud->add_data($_POST);
}

$foods=$objCrud->display_data();

if(isset($_GET['status'])){
  if($_GET['status']='delete'){
     $del_id= $_GET['id'];
 
    $del_msg=$objCrud->delete_data($del_id);
  }

 
 }
 

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>PHP CRUD</title>
  </head>
  <body>
  
<div class="container my-4 py-4 shadow">

<h2> <a style=" text-decoration:none;" href="index.php">Healthy Food Charts</a> </h2>
<?php if(isset($del_msg)){
      echo $del_msg;
    }    ?>

<form class="form" action="" method="POST" enctype="multipart/form-data">
<?php if(isset($return_msg)){echo $return_msg;} ?>

<input class="form-control mb-2" type="number" name="food_id" placeholder="Enter ID">

<input class="form-control mb-2" type="text" name="food_name" placeholder="Enter Name">

<label for="image">Upload  Image </label>

<input class="form-control mb-2" type="file" name="food_image">
<input type="submit" value="Add Data" name="submit" class="form-control bg-success">
</form>
</div>


<div class="container my-4 py-4 shadow">
<table class="table table-responsive">
  <thead>
 <tr>

 <th>ID</th>
    <th>Name</th>
    <th>Image</th>
    <th>Action</th>
 </tr>
 </thead>

 <tbody>
  <?php while($foo= mysqli_fetch_assoc($foods))  { ?>
 <tr>
 <td><?php echo $foo['id']; ?></td>
 <td><?php echo $foo['food_name']; ?></td>
 <td><img style="height:60px;" src="upload/<?php echo $foo['food_image']; ?>"></td>
 <td>
  <a class="btn btn-danger" href="edit.php?status=edit&&id=<?php echo $foo['id']; ?>">Edit</a>
  <a class="btn btn-primary" href="?status=delete&&id=<?php echo $foo['id']; ?>">Delete</a>
 </td>




 </tr>
 <?php  } ?>
</tbody>
 
    
</table>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>