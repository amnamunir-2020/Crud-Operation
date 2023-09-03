<?php include ('dbconfig.php');
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home -PDO CRUD</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>


<?php

if(isset($_SESSION['message'])){
  echo "<div class='alert alert-success'>".$_SESSION['message'] ."</div>" ;
  unset($_SESSION['message']);

}




?>


<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <diV class="mt-5" >



      <h2>PDO CRUD OPERATIONS</h2>
      <a href="user-add.php" class="btn btn-info" > ADD USER </a></div>
    </div>



    <table class="table mt-5 table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">FIRST NAME</th>
      <th scope="col">LAST  NAME</th>
      <th scope="col">USER NAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">EDIT</th>
      <th scope="col">DELETE</th>
    </tr>
  </thead>
  <tbody>
<?php 


$selectq="SELECT * FROM form_tb";
$stmt=$conn->prepare($selectq);
$stmt->execute();

$result=$stmt->fetchAll(PDO::FETCH_ASSOC);

if($result){


  foreach($result as $data){

    ?>

<tr>
  <td> <?= $data['id'] ;  ?></td>   
  <td> <?= $data['first_name'] ;  ?></td>
  <td> <?= $data['last_name'] ;  ?></td>
  <td> <?= $data['username'] ;  ?></td>
  <td> <?= $data['email'] ;  ?></td>
  <td> <a href="user-edit.php?id=<?= $data['id']; ?>" class="btn btn-primary">EDIT</a></td>
  <td><form action="code.php" method="POST"> <button type="submit" name="delete" value="<?=$data['id'];  ?>" class="btn btn-danger"> DELETE</button></form></td>
</tr>





<?php

  }



}

else{
?>
  <tr>
  <td> Data Not Found!</td>
</tr>


<?php
}



?>




 

  





  </tbody>
</table>



















  </div>



</div>












<!--<form action="code.php"  method="post" class="mt-5">
  <div class="form-group">
    <label >Name</label>
    <input type="text" class="form-control"  name="name"  required >
    
  </div>

  
  <div class="form-group">
    <label >Email</label>
    <input type="email" class="form-control" name="email"  required >
  </div>

   
  <div class="form-group">
    <label >Phone No</label>
    <input type="text" class="form-control" name="phone"  required>
  </div>



  <div class="form-group">
    <label >Password</label>
    <input type="password" class="form-control" name="password"  required >
  </div>

  
 

  
  <button type="submit" name="submit" class="btn btn-success">Submit</button>
</form>-->



</div>



</div>
</div>
</section>
    
</body>
</html>