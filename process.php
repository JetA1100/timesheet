<?php
    include 'config.inc.php';
    $description = $_POST['description'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $rate = $_POST['rate'];
    $query = "INSERT INTO timesheet (description, date, time, rate) VALUES('$description', '$date', '$time', '$rate')";
    $result = pg_query($query);
    if (! $result) {
        die('Invalid query:' . pg_last_error());
    }
    echo "Data inserted successfully";
    header("Location: ./index.php");
    exit;
?>