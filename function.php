<?php
class MyCrud{

    private $conn;

    public function __construct(){

        //database host, database user, database pass, database name.

        $dbhost= 'localhost';
        $dbuser='root';
        $dbpass='';
        $dbname='crudphp';

        $this->conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

        if(!$this->conn){
            die( "Databse Connection Error!!");
        }
    }
   

    public function add_data($data){
       

        $food_name=$data['food_name'];
        $food_image=$_FILES['food_image']['name'];
        $temp_img=$_FILES['food_image']['tmp_name'];
        //move_uploaded_file($temp_img, 'upload/'.$foodImage);

    $query="INSERT INTO foods(food_name,food_image)  VALUES( '$food_name','$food_image')";  
   
    
    if(mysqli_query($this->conn, $query)){
        move_uploaded_file($temp_img, 'upload/'.$food_image);
        return "Information Added Successfully";

    }  
    }


    public function display_data(){

        $query="SELECT * FROM foods";

        if(mysqli_query($this->conn, $query)){

          $return_data= mysqli_query($this->conn, $query);
          return $return_data;
        }
    }


    public function display_data_by_id($id){

        $query="SELECT * FROM foods WHERE id=$id";

        if(mysqli_query($this->conn, $query)){

          $return_data= mysqli_query($this->conn, $query);
          $aret=mysqli_fetch_assoc($return_data);
          return $aret;
          
        }
    }

    public function update_data($data){
     $id= $data['ufood_id'];
     $name2=$data['ufood_name'];
     $image=$_FILES['ufood_image']['name'];
     $tmp_name=$_FILES['ufood_image']['tmp_name'];

     $query="UPDATE foods SET food_name='$name2', food_image='$image' WHERE id=$id";

     if(mysqli_query($this->conn, $query)){
        move_uploaded_file($tmp_name, 'upload/'.$image);

        return "Information Updated Successfully!!";
     }

    }


    public function delete_data($data){
        $catch_image="SELECT * FROM foods WHERE id=$data";

           $del_info=mysqli_query($this->conn, $catch_image);
           $del_fetch=mysqli_fetch_assoc($del_info);
           $del_img=$del_fetch['food_image'];

        $query="DELETE FROM foods WHERE id=$data";
        
        if(mysqli_query($this->conn, $query)){
        
            unlink('upload/'.$del_img);
    
            return "Deleted Successfully!!";
         }

    }
}


?>