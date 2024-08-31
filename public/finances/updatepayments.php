<?php

include('../helperfuncs/frmValidate.php');
include('../etc/pdoconn.php');

class ValidateEmpty extends ValidateData
{   
    public function CheckEmpty()
    {
        $this->validateEmptyFeilds();
        $this->showErrors();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
    $datavld = new ValidateEmpty($_POST);
    $datavld->CheckEmpty();

    $data = array(
        'u_landlord' => filter_input(INPUT_POST, 'custF', FILTER_SANITIZE_STRING),
        'firstName' => filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING),
        'lastName' => filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING),
        'ApartmtName' => filter_input(INPUT_POST, 'ApartmtName', FILTER_SANITIZE_STRING),
        'unitNo' => filter_input(INPUT_POST, 'unitNo', FILTER_SANITIZE_STRING),
        'bal' => filter_input(INPUT_POST, 'bal', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION),
        'amount' => filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION),
        'pay_method' => filter_input(INPUT_POST, 'pay_method', FILTER_SANITIZE_STRING),
        'ref' => filter_input(INPUT_POST, 'ref', FILTER_SANITIZE_STRING),
        'date' => filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING)
    );

    $errors = [];
    if(empty($data['ref'])){
        $errors[] = "Transaction Reference is Empty";
    }

    /** Check for duplicates */
    try {
        $stmt = $conn->prepare("SELECT refNo FROM statements WHERE u_landlord = :u_landlord AND ApartmtName = :ApartmtName AND hseNo = :hseNo");
        $stmt->execute([
            ':u_landlord' => $data['u_landlord'],
            ':ApartmtName' => $data['ApartmtName'],
            ':hseNo' => $data['unitNo']
        ]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $fetchdata = $stmt->fetchAll();

        foreach ($fetchdata as $rv) {
            if ($rv['refNo'] == $data['ref']) {
                $errors[] = "Incorrect Reference Number. Seems to have been Recorded";
            }
        }
    } catch (PDOException $e) {
        echo "ERROR" . "<br />" . $e->getMessage();
    }

    function getBal($x, $a) {
        return $x - $a;
    }

    $recurBal = getBal(+$data['bal'], +$data['amount']);

    if (empty($errors)) {
        try {
            $datetimeSubmitted = date('Y-m-d H:i:s');

            $conn->beginTransaction();

            $stmt = $conn->prepare("UPDATE hseUnits SET balances = balances - :amount WHERE u_landlord = :u_landlord AND ApartmtName = :ApartmtName AND hseNo = :hseNo");
            $stmt->execute([
                ':amount' => $data['amount'],
                ':u_landlord' => $data['u_landlord'],
                ':ApartmtName' => $data['ApartmtName'],
                ':hseNo' => $data['unitNo']
            ]);

            $stmtsql = $conn->prepare("UPDATE billings SET transaction_id = :ref, amount = :amount, payDate = :payDate WHERE u_landlord = :u_landlord AND first_name = :first_name AND last_name = :last_name");
            $stmtsql->execute([
                ':ref' => $data['ref'],
                ':amount' => $data['amount'],
                ':payDate' => $data['date'],
                ':u_landlord' => $data['u_landlord'],
                ':first_name' => $data['firstName'],
                ':last_name' => $data['lastName'],
            ]);

            $stmtStmt = $conn->prepare("INSERT INTO statements(u_landlord, firstName, lastName, ApartmtName, hseNo, balances, amount, paymentMethod, refNo, date_paid, datetimeSubmitted)
            VALUES(:u_landlord, :firstName, :lastName, :ApartmtName, :hseNo, :balances, :amount, :paymentMethod, :refNo, :date_paid, :datetimeSubmitted)");
            $stmtStmt->execute([
                ':u_landlord' => $data['u_landlord'],
                ':firstName' => $data['firstName'],
                ':lastName' => $data['lastName'],
                ':ApartmtName' => $data['ApartmtName'],
                ':hseNo' => $data['unitNo'],
                ':balances' => $recurBal,
                ':amount' => $data['amount'],
                ':paymentMethod' => $data['pay_method'],
                ':refNo' => $data['ref'],
                ':date_paid' => $data['date'],
                ':datetimeSubmitted' => $datetimeSubmitted
            ]);
            echo '
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg">
                <p class="text-lg font-semibold">Status: Success</p>
                <p>Request received successfully. Awaits Confirmation.</p>
            </div>
            <br>
            ';
            $conn->commit();
        } catch (PDOException $e) {
            echo "ERROR" . "<br />" . $e->getMessage();
            $conn->rollBack();
        }
    }
}
foreach($errors as $error)
{
    echo '<div class="bg-red-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg">' . $error . '&ensp;'.'</div>'.'<br />';
}
?>
