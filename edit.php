<?php
   $conn = mysqli_connect('localhost','root','','phpcrud');
   
   if($_GET['id']) {
     $getid = $_GET['id'];

     $sql = "SELECT * FROM users WHERE id=$getid";

     $query = mysqli_query($conn, $sql);

     $data = mysqli_fetch_assoc($query);

     $id = $data['id'];
     $firstname = $data['firstname'];
     $lastname = $data['lastname'];
     $email = $data['email'];
   }

   if(isset($_POST['edit'])) {
       $id        =  $_POST['id'];
       $firstname =  $_POST['firstname'];
       $lastname  =  $_POST['lastname'];
       $email     =  $_POST['email'];

       $sql1 = "UPDATE users 
       SET firstname='$firstname', lastname='$lastname', email='$email' WHERE id = '$id'";

       if(mysqli_query($conn, $sql1) == TRUE) {
        header('location:view.php');  
        echo "Data Updated";
       }else{
          echo "Data not update";
       }
   }
  

?>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
        <div class="col-sm-6 pt-4 mt-4 border border-dark">
        <h3>Registration Form</h3>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
         Firstname :<br>   
         <input type="text" name="firstname" value="<?php echo $firstname ?>"><br><br>
         Lastname :<br>   
         <input type="text" name="lastname" value="<?php echo $lastname ?>"><br><br>
         Email :<br>   
         <input type="email" name="email" value="<?php echo $email ?>"><br><br>
         <input type="text" name="id" value="<?php echo $id ?>" hidden>
         <input type="submit" value="edit" name="edit" class="btn btn-primary">
         </form>
         </div>  
         <div class="col-sm-3"></div>  
</div>
</div>
  </body>
</html>

