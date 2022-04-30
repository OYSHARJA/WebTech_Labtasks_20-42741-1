<?php
// $name=$uname=$gr=$emailerr=$cp=$nameerr=$unameerr="";
// if(isset($_POST["submit"]))
// {

//     $name= $_REQUEST['name']; 

//     if(empty($name) || strlen($name)<3)
//     {
//         $nameerr= "The Name Must Be At Least 3 Characters";
//     }
//     else
//     {
//         $nameerr= "Name = ".$name;
//     }
     
//     $uname= $_REQUEST['uname'];
//     if(empty($uname) || strlen($uname)<6)
//     {
//         $unameerr= "The User Name Must Be At Least 5 Characters";
//     }
//     else
//     {
//         $unameerr= "User name = ".$uname;
//     } 
//     if(isset($_POST["gender"]))
//     {
//         $gr= "Gender =".$_POST["gender"] ;
//     }
//     else{
//         $gr= "Please select your gender ";
//     } 
//     $email= $_REQUEST['email'];

//         if(empty($email) || !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email))
//         {
//             $emailerr= "Please enter a valid email";
//         }
//         else
//         {
//             $emailerr= "Email Address = ".$email;
//         }

//         $password= $_REQUEST['password']; 
//         $confirmpassword=$_REQUEST['confirmpassword'];
    
//             if(empty($password) || strlen($password)<6)
//             {
//                 $cp=  "The Password Field Must Be At Least 5 Characters";
//             }
//             else if($password != $confirmpassword)
//             {
//                 $cp= "The Confirm Password Confirmation Does not Match";
//             }
//             else
//             {
//                 $cp= "Password is valid";
//             }

//     $formdata = array(
//         'name'=> $_POST["name"],
//         'uname'=> $_POST["uname"],
//         'gender'=> $_POST["gender"],
//         'email'=>$_POST["email"],
//         'password'=> $_POST["password"],
//         'confirmpassword'=>$_POST["confirmpassword"]
//      );
//      $existingdata = file_get_contents('data.json');
//      $tempJSONdata = json_decode($existingdata);
//      $tempJSONdata[] =$formdata;
//      $jsondata = json_encode($tempJSONdata, JSON_PRETTY_PRINT);
    
//      if(file_put_contents('data.json', $jsondata)) {
//           echo "Data successfully saved <br>";
//       }
//      else 
//      {
//           echo "no data saved";
//      }
// }

// Include config file
require_once "../config.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: ../view/profile.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}



?>