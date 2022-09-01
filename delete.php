<?php
    include 'config.inc.php';
    $query = "DELETE FROM timesheet";
    $result = pg_query($query);
    if (! $result) {
        die('Invalid query:' . pg_last_error());
    }
    echo "Data deleted successfully";
    header("Location: ./index.php");
    exit;
?>