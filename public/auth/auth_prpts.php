<?php 

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

/**Directory to handle the path */

define('PDO_PATH', $root . 'etc'. DIRECTORY_SEPARATOR);

require PDO_PATH . 'pdoconn.php';
include __DIR__ . '/str_sanitize.php';

$errors = [];
$name = "";
$h20 = "";
$elect = "";
$ucartaker = "";
$nocaretaker = "";
$location = "";

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])):
    $uname = sanitize_input($_POST['custId']);
    $name = sanitize_input($_POST['name']);
    $nounit = sanitize_input($_POST['no_uni']);
    $ucaretaker = sanitize_input($_POST['u_caretaker']);
    $nocaretaker = sanitize_input($_POST['no_caretaker']);
    $location = sanitize_input($_POST['location']);

    /** Validate with class */
    
    if(empty($name)):
        $errors[] = "Property Name Cant be Empty";
    endif;
    if(empty($nounit)):
        $erros[] = "Unit No is Empty";
    endif;
    if(empty($ucaretaker)):
        $errors[] = "Field Caretaker Name is Empty";
    endif;
    if(empty($nocaretaker)):
        $errors[] = "Field Caretaker Number is Empty";
    endif;
    if(empty($location)):
        $errors[] = "Location Field is Empty";
    endif;
endif;

/** Insert Property Details */

if(count($errors) == FALSE):
    try
    {
        $stmt = $conn->prepare("INSERT INTO property_details(u_landlord, prptyName, no_units, caretaker_name, caretaker_no, location)VALUES(:u_landlord, :prptyName, :no_units, :caretaker_name, :caretaker_no, :location)");
        $stmt->bindParam(":u_landlord", $uname);
        $stmt->bindParam(":prptyName", $name);
        $stmt->bindParam(":no_units", $nounit);
        $stmt->bindParam(":caretaker_name", $ucaretaker);
        $stmt->bindParam(":caretaker_no", $nocaretaker);
        $stmt->bindParam(":location", $location);
        $stmt->execute();
        echo
        '<div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg">
                <p class="text-lg font-semibold"> Success </p>
                <p> Data Recorded Successfully </p>
            </div>';
    }
    catch(PDOException $e)
    {
       
    }
endif;

    