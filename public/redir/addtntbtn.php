<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $_SESSION['addTenant'] = $_POST['submit'];

        // Simulate a delay for demonstration purposes
        sleep(2);

        // Send a success response
        echo 'Form processed successfully';
    } else {
        http_response_code(400);
        echo 'Form submission error';
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo 'Invalid request method';
}
?>