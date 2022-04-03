<?php

function GetRequests()
{
    $db = new SQLite3('C:\xampp\Data\AZYDatabase.db');
    $sql = "SELECT * FROM Requests";
    $stmt = $db->prepare($sql);

    $result = $stmt->execute();
    $arrayResult = [];

    while ($row = $result->fetchArray())
    {
        $arrayResult[] = $row;
    }

    return $arrayResult;
}

function GetRequest()
{
    $id = $_GET['id'];
    
    $db = new SQLite3('C:\xampp\Data\AZYDatabase.db');
    $sql = "SELECT * FROM Requests WHERE RequestID = :requestID";
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':requestID', $id, SQLITE3_INTEGER);

    $result = $stmt->execute();
    $arrayResult = [];

    while ($row = $result->fetchArray())
    {
        $arrayResult[] = $row;
    }

    return $arrayResult;
}