<!DOCTYPE html>
<html>
<body>

<div style="text-align : center;">
<h3 style="color:red">Start Typing Our Event Name</h3>

<h3>Suggestions: <span id="txtHint"></span><h3/>
<h3 style="color:#000080">Our Event Name: <input type="text" id="txt1" onkeyup="showHint(this.value)"></h3>

</div>

<script>
function showHint(str) {
  if (str.length == 0) { 
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("txtHint").innerHTML =
    this.responseText;
  }
  xhttp.open("GET", "gethint.php?q="+str);
  xhttp.send();   
}
</script>

</body>
</html>




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

$events = fetchAllEvent();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif;
        background-image: url('../assets/background.jpg'); }
        .wrapper{ width: 360px; padding: 20px; }
        #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;

  
    </style>
</head>
<body>
    <h1 class="my-3">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    <p>
        <a href="../controller/logout.php" class="btn btn-danger ml-1">Sign Out of Your Account</a>
    </p>
    <table id="customers">
    <thead>
        <tr>
            <th>Client Name</th>
            <th>Event Name</th>
            <th>Event Price</th>
            <th>Approval Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($events as $i => $event): ?>
            <tr>
                <td><?php echo $event['client_name'] ?></td>
                <td><?php echo $event['event_name'] ?></td>
                <td><?php echo $event['price'] ?></td>
                <td><?php if ($event['approval_status'] == 0) {
                 echo "Not Approved"; 
                }
                else {
                echo "Approved";
                } ?></td>
                <td><a href="editEvent.php?id=<?php echo $event['id'] ?>">Edit</a>&nbsp<a href="../controller/deleteEvent.php?id=<?php echo $event['id'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a></td>
            </tr>
        <?php endforeach; ?>
        

    </tbody>
    

</table>
</body>
</html>

<?php
include ("../view/footer.php");
?>

