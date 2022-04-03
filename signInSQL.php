<?php

function getStaff()
{
    $db = new SQLite3('C:\xampp\Data\AZYDatabase.db');
    $sql = "SELECT * FROM Staff";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    $arrayResult = [];

    while ($row = $result->fetchArray())
    {
        $arrayResult [] = $row;
    }

    return $arrayResult;
}

function getAdmins()
{
    $db = new SQLite3('C:\xampp\Data\AZYDatabase.db');
    $sql = "SELECT * FROM Admins";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    $arrayResult = [];

    while ($row = $result->fetchArray())
    {
        $arrayResult [] = $row;
    }

    return $arrayResult;
}