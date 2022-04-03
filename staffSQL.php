<?php

function CreateRequest()
{
    $hour = date("H") - 1;
    $date = date(":i d/m/Y");
    $date = $hour.$date;
    
    $requestID = GenID();
    $db = new SQLite3('C:\xampp\Data\AZYDatabase.db');
    $sql = "INSERT INTO Requests(RequestID, StaffID, StaffName, Type, Location, Description, TimeSubmitted)
    VALUES (:requestID, :staffID, :name, :type, :location, :desc, :date)";
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':requestID', $requestID, SQLITE3_INTEGER);
    $stmt->bindParam(':staffID', $_SESSION['userID'], SQLITE3_INTEGER);
    $stmt->bindParam(':name', $_SESSION['name'], SQLITE3_TEXT);
    $stmt->bindParam(':type', $_POST['type'], SQLITE3_TEXT);
    $stmt->bindParam(':location', $_POST['location'], SQLITE3_TEXT);
    $stmt->bindParam(':desc', $_POST['desc'], SQLITE3_TEXT);
    $stmt->bindParam(':date', $date, SQLITE3_TEXT);

    $stmt->execute();
}

function GenID()
{
    $ran1 = rand(1, 9);
    $ran2 = rand(0, 9);
    $ran3 = rand(0, 9);
    $ran4 = rand(0, 9);
    $ran5 = rand(0, 9);
    $ran6 = rand(0, 9);

    return $ran1.$ran2.$ran3.$ran4.$ran5.$ran6;
}

function GetRequests()
{
    $db = new SQLite3('C:\xampp\Data\AZYDatabase.db');
    $sql = "SELECT * FROM Requests WHERE StaffID = :staffID";
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':staffID', $_SESSION['userID'], SQLITE3_INTEGER);

    $result = $stmt->execute();
    $arrayResult = [];

    while ($row = $result->fetchArray())
    {
        $arrayResult[] = $row;
    }

    return $arrayResult;
}