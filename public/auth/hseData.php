<?php
$db_conn = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('CONN_PATH', $db_conn . 'etc' . DIRECTORY_SEPARATOR);

require CONN_PATH . 'pdoconn.php';

/**Initiate Variables */
$errors = [];

if ($_SERVER['REQUEST_METHOD'] && isset($_POST['regSubmit'])) {
    $datasub = [
        'custF' => filter_input(INPUT_POST, 'custF', FILTER_SANITIZE_STRING),
        'hseNo' => filter_input(INPUT_POST, 'hseNo', FILTER_SANITIZE_STRING),
        'prptyName' => filter_input(INPUT_POST, 'prptyname', FILTER_SANITIZE_STRING),
        'floor' => filter_input(INPUT_POST, 'floor', FILTER_SANITIZE_STRING),
        'first_name' => 'Null',
        'last_name' => 'Null',
        'rent' => filter_input(INPUT_POST, 'rent', FILTER_SANITIZE_STRING),
        'deposit' => filter_input(INPUT_POST, 'deposit', FILTER_SANITIZE_STRING),
        'hseType' => filter_input(INPUT_POST, 'hseType', FILTER_SANITIZE_STRING),
        'condition' => filter_input(INPUT_POST, 'condition', FILTER_SANITIZE_STRING),
        'status' => filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING),
        'h2ono' => filter_input(INPUT_POST, 'h2ono', FILTER_SANITIZE_STRING),
        'balances' => '0.0'
    ];

    // Check for empty fields
    foreach ($datasub as $key => $value) {
        if (empty($value)) {
            $errors[] = ucfirst($key) . " is Empty";
        }
    }

    /** Check to see if the submission of  */

    try {
        // Prepare the SQL statement
        $statement = $conn->prepare("SELECT hseNo, h2oMeterNo FROM hseUnits WHERE u_landlord = :custF AND ApartmtName = :prptyName");
        
        // Execute the statement with the parameters
        $statement->execute([':custF' => $datasub['custF'], ':prptyName' => $datasub['prptyName']]);
        
        // Set the fetch mode to associative array
        $statement->setFetchMode(PDO::FETCH_ASSOC);
    
        // Fetch all the results
        $data = $statement->fetchAll();
    
        // Iterate through the results and check for duplicates
        foreach($data as $row) {
            if ($row['hseNo'] == $datasub['hseNo']) {
                $errors[] = "Unit Number is Already Recorded Check Modal Entries";
            }
            if ($row['h2oMeterNo'] == $datasub['h2ono']) {
                $errors[] = "Water Meter Number Already Exists.";
            }
        }
    } catch (PDOException $e) {
        // Handle the exception
        echo "ERROR" . "<br />" . $e->getMessage();
    }
      
    // If there are no errors, proceed to database insertion
    if (empty($errors)) {
        // Perform database insertion using prepared statements
        try{
          $stmt = $conn->prepare("INSERT INTO hseUnits(u_landlord, hseNo, ApartmtName, Floor, first_name, last_name, Rent, Deposit, UnitSize, HCondition, HStatus, h2oMeterNo, balances)
          VALUES(:u_landlord, :hseNo, :ApartmtName, :Floor, :first_name, :last_name, :Rent, :Deposit, :UnitSize, :HCondition, :HStatus, :h2oMeterNo, :balances)");
          $stmt->execute([
            ':u_landlord'=> $datasub['custF'],
            ':hseNo'=> $datasub['hseNo'],
            ':ApartmtName'=> $datasub['prptyName'],
            ':Floor'=> $datasub['floor'],
            ':first_name'=> $datasub['first_name'],
            ':last_name'=> $datasub['last_name'],
            ':Rent'=> $datasub['rent'],
            ':Deposit'=> $datasub['deposit'],
            ':UnitSize'=> $datasub['hseType'],
            ':HCondition'=> $datasub['condition'],
            ':HStatus' => $datasub['status'],
            ':h2oMeterNo'=> $datasub['h2ono'],
            ':balances' => $datasub['balances']
          ]);
          echo '<div class="alert alert-success">Data submitted successfully!</div>;';
        }catch(PDOException $e){
            echo "ERROR". "<br />". $e->getMessage();
        }
        
        
    } else {
        // If there are errors, display them to the user
        foreach ($errors as $error) {
            echo '<div class="alert alert-danger">' . $error . '</div>';
        }
    }
}
?>




