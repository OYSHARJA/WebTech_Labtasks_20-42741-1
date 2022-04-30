<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  overflow: hidden;
  background-color: transparent;
  padding: 5px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}
</style>
</head>
<body>

<div class="header">
  <div class="header-left">
  <img src='../assets/sitelogo.jpg' alt='Site Logo'>
  <h1 style="text-align:left">Wed-site Event Management</h1>
  </div>
  <!-- <h1> Wed-site Event Management &nbsp; </h1> -->
  <div class="header-right">
    <a href="../view/home.php">Home</a>
    <a href="../view/login.php"> Moderator </a>
    <a href="../view/home.php" > Admin </a>
    <a href="../view/home.php" > Client </a>
    <a href="../view/home.php" > Vendor </a>
  </div>
</div>


</body>
</html>
