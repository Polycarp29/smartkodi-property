<?php
include('../etc/pdoconn.php');

$sessData = $_POST['sessionVariable'];
$column = array("id", "firstName", "lastName", "username", "email", "tntType", "gender", "nextofKin", "nextofKinC", "nationality", "idNo", "mobileNo", "ApartmtName", "hseNo", "dateTime");

$query = "SELECT * FROM hseTenantData";

if(isset($_POST["search"]["value"]))
{
    $query .= ' WHERE (firstName LIKE "%'.$_POST["search"]["value"].'%" 
    OR hseNo LIKE "%'.$_POST["search"]["value"].'%" 
    OR ApartmtName LIKE "%'.$_POST["search"]["value"].'%")
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
 $sub_array[] = $row['firstName'];
 $sub_array[] = $row['lastName'];
 $sub_array[] = $row['username'];
 $sub_array[] = $row['email'];
 $sub_array[] = $row['tntType'];
 $sub_array[] = $row['gender'];
 $sub_array[] = $row['nextofKin'];
 $sub_array[] = $row['nextofKinC'];
 $sub_array[] = $row['nationality'];
 $sub_array[] = $row['idNo'];
 $sub_array[] = $row['mobileNo'];
 $sub_array[] = $row['ApartmtName'];
 $sub_array[] = $row['hseNo'];
 $sub_array[] = $row['dateTime'];

 
 $data[] = $sub_array;
}

function count_all_data($conn)
{
 global $sessData;
 $query = "SELECT * FROM hseTenantData WHERE u_landlord='$sessData'";
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

?>