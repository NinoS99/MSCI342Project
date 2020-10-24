<?php

  include_once('../my_connect.php');

  if (isset($_POST["create"])){
    $mysqli = get_mysqli_conn();
    $required = array('firstName', 'lastName');
    $error = false;
    foreach($required as $field){
      if(empty($_POST[$field])){
        $error = true;
      }
    }
    if ($error){
      $warningMessage = "All fields are required.";
    }
    else {

      $firstName = $_POST['firstName'];
      $lastName = $_POST['lastName'];
      $sql = 'INSERT into users (first_name,last_name)
              values ("'.$firstName.'","'.$lastName.'")';
      $mysqli -> query($sql);
      $warningMessage = "Name added to database!";
    }
  }
  ?>

  <html>
    <link rel = 'stylesheet' type = 'text/css' href = 'style.css'>
    <h1>Please enter your full name!</h1>

      <form method="post" enctype="multipart/form-data">
        <label for = 'firstName' > First Name </label>
        <input type = 'text' id = 'firstName' name = 'firstName' value="<?php
        echo isset($_POST['firstName']) ? $_POST['firstName'] : '';
        ?>"><br><br>
        <label for = 'lastName' > Last Name </label>
        <input type = 'text' id = 'lastName' name = 'lastName' value="<?php
        echo isset($_POST['lastName']) ? $_POST['lastName'] : '';
        ?>"><br><br>
      <button type = 'submit' name = 'create'>Insert User Name</button>
      </form>
</html>
<?php print "<h2>$warningMessage</h2>";
?>
