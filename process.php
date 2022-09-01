<html>
<body>
<?php

    echo "AHHHH";
    include 'config.inc.php0';
    $description = pg_escape_string($_POST['description']);
    $date = pg_escape_string($_POST['date']);
    $time = pg_escape_string($_POST['time']);
    $rate = pg_escape_string($_POST['rate']);
    $query = "INSERT INTO timesheet (description, date, time, rate) VALUES('$description', '$date', '$time', '$rate')";
    $result = pg_query($query);
    if (! $result) {
        die('Invalid query:' . pg_last_error());
    }
    echo "Data inserted Successfully!";
?>
</body>
</html>