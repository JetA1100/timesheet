<?php
    include 'config.inc.php';
    $sql = "SELECT * FROM timesheet";
    $result = pg_query($sql);
    $description = $_POST['description'];
    while($row=pg_fetch_assoc($result)) {
        if ($description == $row['description']) {
            alert("Can not have duplicate descriptions");
            //header("Location: ./index.php");
        }
    }
    $date = $_POST['date'];
    $time = $_POST['time'];
    $rate = $_POST['rate'];
    $query = "INSERT INTO timesheet (description, date, time, rate) VALUES('$description', '$date', '$time', '$rate')";
    $result = pg_query($query);
    if (! $result) {
        die('Invalid query:' . pg_last_error());
    }
    echo "Data inserted Successfully!";
    header("Location: ./index.php");
?>