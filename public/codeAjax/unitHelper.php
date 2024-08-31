<?php

/** Fetch House Unit Data Here */
$dir_path = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('PATH_DBC', $dir_path . 'etc' . DIRECTORY_SEPARATOR);

require PATH_DBC . 'pdoconn.php';

$sessData = $_POST['sessionVariable'];

$column = array("id", "	hseNo", "ApartmtName", "Floor", "Rent", "Deposit", 
"UnitSize", "HCondition", "HStatus", "h2oMeterNo", "balances");

$query = "SELECT * FROM hseUnits";

if(isset($_POST["search"]["value"]))
{
    $query .= ' WHERE (hseNo LIKE "%'.$_POST["search"]["value"].'%" 
    OR ApartmtName LIKE "%'.$_POST["search"]["value"].'%" 
    OR HStatus LIKE "%'.$_POST["search"]["value"].'%")
    AND u_landlord="'.$sessData.'"';

}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}
$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $conn->prepare($query);
$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $conn->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row['id'];
 $sub_array[] = $row['hseNo'];
 $sub_array[] = $row['ApartmtName'];
 $sub_array[] = $row['Floor'];
 $sub_array[] = $row['Rent'];
 $sub_array[] = $row['Deposit'];
 $sub_array[] = $row['UnitSize'];
 $sub_array[] = $row['HCondition'];
 $sub_array[] = $row['HStatus'];
 $sub_array[] = $row['h2oMeterNo'];
 $sub_array[] = $row['balances'];
 
 $data[] = $sub_array;
}

function count_all_data($conn)
{
 global $sessData;
 $query = "SELECT * FROM hseUnits WHERE u_landlord='$sessData'";
 $statement = $conn->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
    'draw'   => intval($_POST['draw']),
    'recordsTotal' => count_all_data($conn),
    'recordsFiltered' => $number_filter_row,
    'data'   => $data
   );
   
   echo json_encode($output);
   