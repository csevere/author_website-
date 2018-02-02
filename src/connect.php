<?php
 
 $configs = include('config.php');
  // echo json_encode($configs->pass);
  $host = $configs->host;
  $user = $configs->user;  
  $pass = $configs->pass;  
  $dbname = $configs->dbname; 

try {
  $conn = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pass);
  // echo "connected"; 
  // var_dump($conn);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($_POST['messageSubmit'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $message = $_POST['message'];
      $date = $_POST['date'];

    //form validation 
      if($name == ''|| $email =='' || $message == ''){
        echo "<div class='message' style='color:red; width: 21%; margin:auto; padding:10px;'>Cannot leave forms empty! Please try again.</div>";
      }elseif(!preg_match('/^([a-zA-Z]+[\'-]?[a-zA-Z]+[ ]?)+$/', $name)){
        echo "<div class='message' style='color:red; width: 21%; margin:auto; padding:10px;'>Please enter a valid name.</div>";
      }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "";
      }else{
        $insert = $conn->prepare('INSERT INTO comments (name, email, message, date)
        values(:name,:email,:message,:date)');

        $insert->bindParam(':name',$name);
        $insert->bindParam(':email',$email);
        $insert->bindParam(':message',$message);
        $insert->bindParam(':date',$date);
        header("Location:guest.php");
        $insert->execute();
      }
    }
}

catch(PDOException $e){  
  echo "error" . $e->getMessage(); 
}	
