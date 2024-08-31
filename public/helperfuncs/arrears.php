<?php
$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;
define('DB_CONN_PATH', $root . 'etc' . DIRECTORY_SEPARATOR);
require DB_CONN_PATH . 'db_conn.php';

class Arrears 
{
    private $sql;
    private $stmt;
    public $sess;

    public function __construct($sess)
    {
        $this->sess = $sess;
        global $conn;
        
        $this->sql = "SELECT ROUND(COALESCE(SUM(balances), 0), 2) AS total_balances FROM hseUnits WHERE u_landlord = ?";
        
        if ($this->stmt = $conn->prepare($this->sql)) {
            $this->stmt->bind_param('s', $this->sess);
            
            if ($this->stmt->execute()) {
                $result = $this->stmt->get_result();
                $row = $result->fetch_assoc();
                
                if ($row && isset($row['total_balances'])) {
                    $total_balances = $row['total_balances'];
                    if ($total_balances > 0) {
                        echo '<p class="text-lg font-semibold text-red-700 dark:text-red-200">Ksh ' . $total_balances . '</p>';
                    } else {
                        echo '<p class="text-lg font-semibold text-green-700 dark:text-green-200">Ksh 0.0</p>';
                    }
                } else {
                    echo '<p class="text-lg font-semibold text-green-700 dark:text-green-200">Ksh 0.0</p>';
                }
                
                $result->close();
            } else {
                echo '<p class="text-lg font-semibold text-red-700 dark:text-red-200">Error executing query.</p>';
            }
            
            $this->stmt->close();
        } else {
            echo '<p class="text-lg font-semibold text-red-700 dark:text-red-200">Error preparing statement.</p>';
        }
    }
}