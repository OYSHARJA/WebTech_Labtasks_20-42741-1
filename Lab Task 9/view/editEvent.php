<?php include ("header.php"); ?>
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<?php 

require_once '../controller/eventInfo.php';
$event = fetchEvent($_GET['id']);


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif;
        background-image: url('../assets/background.jpg'); }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>

 <form action="../controller/updateEvent.php" method="POST" enctype="multipart/form-data">
  <label for="name">Client Name</label><br>
  <input value="<?php echo $event['client_name'] ?>" type="text" id="client_name" name="client_name"><br>
  <label for="event">Event Name</label><br>
  <input value="<?php echo $event['event_name'] ?>" type="text" id="event_name" name="event_name"><br>
  <label for="price">Price</label><br>
  <input value="<?php echo $event['price'] ?>" type="text" id="price" name="price"><br>
  <label for="approve">Approval Status</label><br>
  <p>
    <input type="radio" id="approval_status" name="approval_status" value="1" >Yes</input>
  </p>
  <p>
    <input type="radio" id="approval_status" name="approval_status" value="0">No</input>
  </p>
  <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
  <input type="submit" name = "updateEvent" value="Update">
</form> 

</body>
</html>

<?php
include ("../view/footer.php");
?>

