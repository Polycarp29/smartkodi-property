<?php

include 'siteConf.php';

function InsertData(string $f_name, $l_name, $email)
{   
    $stmt = $conn->prepare("INSERT INTO Users(f_name, l_name, email)VALUES(:f_name, :l_name, :email)");
    $stmt->bindParam(":f_name", $f_name);
    $stmt->bindParam(":l_name", $l_name);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    if($stmt->execute() === true)
    {
        echo "Data Inserted Successfully";
    }else
    {
        echo "Problem Submitting data";
    }
}

InsertData("Mary","Charles", "marycharles@yahoo.com");