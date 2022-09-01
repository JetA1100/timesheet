<?php
    include 'config.inc.php';
    $sql = "SELECT * FROM timesheet";
    $res = pg_query($sql);
    $description = $_POST['description'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $rate = $_POST['rate'];
    $query = "DELETE * FROM timesheet";
    //$query = "INSERT INTO timesheet (description, date, time, rate) VALUES('$description', '$date', '$time', '$rate')";
    $result = pg_query($query);
    if (! $result) {
        die('Invalid query:' . pg_last_error());
    }
    header("Location: ./index.php");
    exit;
?>