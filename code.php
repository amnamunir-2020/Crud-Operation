<?php  

include('dbconfig.php');

session_start();




//insert
if(isset($_POST['submit'])){

  $firstname=$_POST['fname'];
  $lastname=$_POST['lname'];
  $username=$_POST['uname'];
  $email=$_POST['email'];
  $password=$_POST['password'];


  try{

    $insertq="INSERT INTO form_tb  (first_name,last_name,username,email,password) VALUES (?,?,?,?,?)";
    $stmt=$conn->prepare( $insertq);

    $stmt->bindParam(1,$firstname,PDO::PARAM_STR);
    $stmt->bindParam(2,$lastname,PDO::PARAM_STR);
    $stmt->bindParam(3,$username,PDO::PARAM_STR);
    $stmt->bindParam(4,$email,PDO::PARAM_STR);
    $stmt->bindParam(5,$password,PDO::PARAM_STR);
  
    $check_execute=$stmt->execute();

    if($check_execute){
      $_SESSION['message']="Insert Successfully!";
      header('Location:index.php');
      exit();

    }

    else{
      $_SESSION['message']="Not Insert failed!";
      header('Location:index.php');
      exit();
    }

  }

  catch(PDOException $e){

    "Error is: " .$e->getMessage();
  }


}



//update

if(isset($_POST['update']))
{

  $iduser=$_POST['uid'];
  $firstname=$_POST['fname'];
  $lastname=$_POST['lname'];
  $username=$_POST['uname'];
  $email=$_POST['email'];
  $password=$_POST['password'];


  try{


    $updateq="UPDATE form_tb SET first_name=:firstname ,last_name=:lastname,username=:username,email=:useremail,password=:userpassword WHERE id=:userid LIMIT 1  ";
   $stmt=$conn->prepare($updateq);
   $stmt->bindParam(':firstname',$firstname);
   $stmt->bindParam(':lastname',$lastname);
   $stmt->bindParam(':username', $username);
   $stmt->bindParam(':useremail',$email);
   $stmt->bindParam(':userpassword',$password);
   $stmt->bindParam(':userid',$iduser);
   $ex_query=$stmt->execute();

   if($ex_query){
     
    $_SESSION['message']="Update  Successfully!";
    header('Location:index.php');
    exit();

   }

   else
   {
    $_SESSION['message']="Not Update  !";
    header('Location:index.php');
    exit();


   }


  }

  catch(PDOException $e ){


    echo $e->getMessage();



  }



}


//delete

if(isset($_POST['delete'])){

  $delid=$_POST['delete'];

  try{
    $deleteq="DELETE FROM form_tb WHERE id=? LIMIT 1 ";
    $stmt=$conn->prepare($deleteq);
    $stmt->bindParam(1,$delid,PDO::PARAM_INT);
    $execute_query=$stmt->execute();

    if( $execute_query){
       $_SESSION['message']="Delete Successfully!";
       header('Location:index.php');
       exit();
    }

    else{

      $_SESSION['message']="Not Deleted !";
       header('Location:index.php');
       exit();
    }



  }
catch(PDOException $e){
  
  echo $e->getMessage();

}



}








?>