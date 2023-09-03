<?php  include('dbconfig.php');



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit & Update</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
       
     
      <a href="index.php" class="btn btn-dark" > Back </a>
      
      <h2>Edit & Update  </h2>

      <?php 

      if(isset($_GET['id'])){

       $userid=$_GET['id'];
       $editq="SELECT  * FROM  form_tb WHERE id=? LIMIT 1";
       $stmt=$conn->prepare($editq);
       $stmt->bindParam(1,$userid,PDO::PARAM_INT);
       $stmt->execute();

       $data=$stmt->fetch(PDO::FETCH_ASSOC);

       ?>


       

    <!--No need to fetch all data because just single data fetch and no show data as foreach loop-->

      <form action="code.php"  method="post" class="mt-5">

      <input type="hidden" class="form-control"  name="uid"  value="<?= $data['id'];  ?>" required >

  <div class="form-group">
    <label >First Name</label>
    <input type="text" class="form-control"  name="fname"  value="<?= $data['first_name'];  ?>" required >
    
  </div>

  <div class="form-group">
    <label >Last Name</label>
    <input type="text" class="form-control"  name="lname"  value="<?= $data['last_name'];  ?>"  required >
    
  </div>

  <div class="form-group">
    <label >User Name</label>
    <input type="text" class="form-control"  name="uname"  value="<?= $data['username'];  ?>"  required >
    
  </div>

  
  <div class="form-group">
    <label >Email</label>
    <input type="email" class="form-control" name="email"   value="<?= $data['email'];  ?>" required >
  </div>

   

  <div class="form-group">
    <label >Password</label>
    <input type="password" class="form-control" name="password" value="<?= $data['password']; ?>"  required >
  </div>
  
  <button type="submit" name="update" class="btn btn-success">Update</button>
</form>

<?Php 

      }

      else{
   echo "No Id Found!";

      }

      ?>
    




    </div>
  </div>



</div>




















    
</body>
</html>