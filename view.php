<?php
  $conn = mysqli_connect('localhost','root','','phpcrud');
  
  if(isset($_GET['deleteid'])) {
     $deleteid = $_GET['deleteid'];

     $sql = "DELETE FROM users WHERE id = $deleteid";

     if(mysqli_query($conn, $sql) == TRUE) {
          header('location:view.php');
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
            <div class="col-sm-2">
            <span class='mt-4 text-center btn btn-primary'>
            <a href='insert.php' class='text-white text-decoration-none'>Add User</a>
            </span> 
            </div>
        <div class="col-sm-8 pt-4 mt-4 border border-dark">
           <h3 class="text-center bg-primary text-white">User's Information</h3>
           <?php
             $sql = "SELECT * FROM users"; 
             $query = mysqli_query($conn, $sql);
           
            echo "<table class='table table-success' >
                     <tr>
                     <th>Id</th>
                     <th>First Name</th>
                     <th>Last Name</th>
                     <th>Email</th>
                     <th>Action</th>
                     </tr>
            ";
             while($data = mysqli_fetch_assoc($query)){
            
                $id = $data['id'];
                $firstname = $data['firstname'];
                $lastname = $data['lastname'];
                $email = $data['email'];

            echo "<tr>
            <td>$id</td>
            <td>$firstname</td>
            <td>$lastname</td>
            <td>$email</td>
            <td>
            <span class='btn btn-primary'>
            <a href='edit.php?id=$id' class='text-white text-decoration-none'>Edit</a>
            </span> 
            <span class='btn btn-danger'>
            <a href='view.php?deleteid=$id' class='text-white text-decoration-none'>Delete</a>
            </span>
            </td>
            </tr>";
          
          }
           
           ?>
         </div>  
         <div class="col-sm-2">
          
        </div>  
</div>
</div>
  </body>
</html>

