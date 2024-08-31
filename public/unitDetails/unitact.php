

<?php 
include('../l_admin/server.php');
if($_SERVER['REQUEST_METHOD'] === 'POST')
{   
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
    
        $sessionfirstName = $_POST['firstName'] ?? '';
        $sessionlastName = $_POST['lastName'] ?? '';
        $ApartmtName = $_POST['ApartmtName'] ?? '';
        $hseNum = $_POST['HseN'] ?? '';
        $sessionBal = $_POST['bal'] ?? '';
    
        $_SESSION['firstName'] = $sessionfirstName;
        $_SESSION['lastName'] = $sessionlastName;
        $_SESSION['bal'] = $sessionBal;
        $_SESSION['ApartmtName'] =$ApartmtName;
        $_SESSION['HseNum'] = $hseNum;

        header("Location:../l_admin/updatepayments");
    }
?>
