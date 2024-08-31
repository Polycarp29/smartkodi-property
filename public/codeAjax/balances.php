<?php
// fetch_data.php
include '../etc/db_conn.php';
include '../l_admin/server.php';

// Get the session username securely
$username = $_POST['sessionUsername'];

// Sanitize inputs
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$limit = 10; // Number of entries to show in a page.
$start = ($page - 1) * $limit;

// Construct the base SQL query
$sql = "SELECT billings.*, hseUnits.ApartmtName, hseUnits.hseNo, hseUnits.balances FROM billings 
        INNER JOIN hseUnits ON billings.first_name = hseUnits.first_name 
        WHERE billings.u_landlord = '$username'";

if (!empty($search)) {
    $sql .= " AND (billings.first_name LIKE '%$search%' OR hseUnits.hseNo LIKE '%$search%')";
}

$sql .= " LIMIT $start, $limit";

$result = $conn->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Total count for pagination
$sqlTotal = "SELECT COUNT(*) as total FROM billings 
             INNER JOIN hseUnits ON billings.first_name = hseUnits.first_name 
             WHERE billings.u_landlord = '$username'";

if (!empty($search)) {
    $sqlTotal .= " AND (billings.first_name LIKE '%$search%' OR hseUnits.hseNo LIKE '%$search%')";
}

$resultTotal = $conn->query($sqlTotal);
$total = $resultTotal->fetch_assoc()['total'];
$pages = ceil($total / $limit);

$response = [
    'data' => $data,
    'total' => $total,
    'pages' => $pages,
    'current' => $page
];

echo json_encode($response);

$conn->close();
?>
