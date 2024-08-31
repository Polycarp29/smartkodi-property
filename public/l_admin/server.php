<?php 
session_start();
// initiate dirs

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('DB_PATH', $root . 'etc' . DIRECTORY_SEPARATOR);

require DB_PATH . 'db_conn.php';
include '../etc/errors.php';

/* Variable Initiate */
$email = "";
$password ="";
$cpassword = "";
$errors = array();

if(isset($_POST['sign_up'])){
    $username = mysqli_real_escape_string($conn, $_POST['u_name']);
    $email = mysqli_real_escape_string($conn , $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $create_datetime = date("Y-m-d H-m-s");

    // Validate the form 
    if(Validate :: ValidateEmptySpace($username)){
        array_push($errors, "Username is empty");
    }
    if(Validate :: ValidateEmptySpace($email)){
        array_push($errors, "Email is empty!");
    }
    if(Validate :: ValidateEmptySpace($password)){
        array_push($errors, "Password is empty!");
    }
    if(Validate :: ValidateEmptySpace($cpassword)){
        array_push($errors, "Confirm Password is Empty!");
    }
    if($password !== $cpassword){
        array_push($errors, "Passwords do not match!");
    }
    if (!Validate :: ValidatePassword($password) ) {
        array_push($errors,'Password must be between 6 and 20 characters long!');
    }
    if(!preg_match("#[0-9]+#", $password)) {
        array_push($errors, "Password must include at least one number!");
    }
    if(!preg_match("#[A-Za-z]+#", $password)) {
        array_push($errors, "Password must include at least one letter!");
    }
    if(!Validate :: ValidateChar($password)) {
        array_push($errors, "Password must include at least one special character!");
    }
    if(Validate :: ValidateEmail($email)){

    }else{
        $errors[] = "Invalid Email";
    }

    /* Check from the db if the user is available */
    $sql = "SELECT * FROM User_landlord WHERE u_name = ? OR u_email = ? LIMIT 1";
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt, $sql)){
        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) > 0) {
            array_push($errors, "The Email or Username is taken try another");
        }
    }
    if(count($errors) == FALSE){
        /* Hashing the password with a strong alogarithm */
        $password = password_hash($password, PASSWORD_DEFAULT);
        /**Create a PDO DB Connection */
        require DB_PATH . 'pdoconn.php';
        try
        {
            $stmt = $conn->prepare("INSERT INTO User_landlord(u_name, u_email, password, create_datetime)VALUES(:u_name, :u_email, :password, :create_datetime)");
            $stmt->bindParam("u_name", $username);
            $stmt->bindParam("u_email", $email);
            $stmt->bindParam("password", $password);
            $stmt->bindParam("create_datetime", $create_datetime);
            $stmt->execute();
                $_SESSION['username'] = $password;
                $_SESSION['email'] = $email;
                sleep(10);
                header('Location:login');
           
        }catch(PDOException $e)
        {
            echo "<div class='min-w-0 p-4 text-red bg-purple-600 rounded-lg shadow-xs'>
                   <p> ERROR {$e->getMessage()} </p>
                    </div>
            ";
        }
        $conn = null;
        
        
        
    }
}

/* Login User */



if (isset($_POST['login_user'])) :
    // Assuming $db is your database connection
    $username = mysqli_real_escape_string($conn, $_POST['u_name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
     
    if ($validate->ValidateEmptySpace($username)) {
       $errors[] = "Username is required!";
    }
    if (Validate :: ValidateEmptySpace($password)) {
        $errors[] = "Password required!";
    }

    if (count($errors) == 0) {
        // Use a stronger hashing algorithm, such as bcrypt
        $query = "SELECT * FROM User_landlord WHERE u_name = ?";

// Create a prepared statement
        $stmt = $conn->prepare($query);

        if ($stmt) {
            // Bind the user input to the placeholders
            $stmt->bind_param("s", $username);

            // Execute the prepared statement
            $stmt->execute();

            // Get the result
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                if ($user && password_verify($password, $user['password'])) {
                    // Store user data in session
                    $_SESSION['username'] = $user['u_name'];
                    header('Location: dashboard');
                    exit(); // Important to prevent further execution
                } else {
                    $errors[] = "Wrong Username/Password!";
                }
            } else {
                $errors[] = "No user found with that username.";
            }

            // Close the statement
            $stmt->close();
        } else {
            // Handle prepare error
            $errors[] = "Error preparing SQL statement: " . $conn->error;
        }
    }
endif;


