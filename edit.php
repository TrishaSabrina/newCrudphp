<?php

include('function.php');

$objCrud=new MyCrud();


$foods=$objCrud->display_data();

if(isset($_GET['status'])){
 if($_GET['status']='edit'){
    $id= $_GET['id'];

    $rd=$objCrud->display_data_by_id($id);
 }

 if(isset($_POST['edit_btn'])){

  $msg=$objCrud->update_data($_POST);
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

<form class="form" action="" method="POST" enctype="multipart/form-data">
<?php if(isset($msg)){echo $msg;} ?>

<input class="form-control mb-2" type="number" name="ufood_id" value="<?php echo $rd['id'];   ?>">

<input class="form-control mb-2" type="text" name="ufood_name" value="<?php echo $rd['food_name']   ?>">

<label for="image">Upload  Image </label>

<input class="form-control mb-2" type="file" name="ufood_image">

<input type="hidden" name="id" value="<?php echo $rd['id'] ;  ?>">

<input type="submit" value="Update Data" name="edit_btn" class="form-control bg-success">
</form>
</div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>