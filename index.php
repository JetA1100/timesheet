<?php
    include 'config.inc.php';
    $sql = "SELECT * FROM timesheet";
    $result = pg_query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TimeSheet</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="./resources/css/style.css">
</head>
<body onload="calculate()">
    <h1>Zaw Aung's TimeSheet</h1>
    <div class="row">
        <div class="column">
            <form id="timesheet-entry" method="post" action="process.php">
                <table id="timesheet">
                    <caption style="text-align: top;"><h2></h2></caption>
                    <thead>
                        <tr>
                            <th class="description" scope="col">Description</th>
                            <th class="date" scope="col">Date</th>
                            <th class="time" scope="col">Time (in minutes)</th>
                            <th class="rate" scope="col">Rate</th>
                        </tr>
                    </thead>
                    <tbody id="data">
                        <?php
                            while($row=pg_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td><textarea class='description' name='description' rows='2' required readonly>" . $row['description'] . "</textarea></td>";
                            echo "<td><input class='date' type='date'  name='date' required value='" . $row['date'] . "' readonly></td>";
                            echo "<td><input class='time' type='number' name='time' min='0' required value='" . $row['time'] . "' readonly></td>";
                            echo "<td><input class='rate' type='number' name='rate' min='0' required value='" . $row['rate'] . "' readonly></td>";
                            echo "</tr>";
                            }
                        ?>
                    </tbody>
                    <tbody id="insert">
                        <tr>
                            <td><textarea class="description" name="description" rows="2" required></textarea></td>
                            <td><input class="date" type="date"  name="date" required></td>
                            <td><input class="time" type="number" name="time" min="0" required></td>
                            <td><input class="rate" type="number" name="rate" min="0" required></td>
                        </tr>
                    </tbody>
                </table>
        </div>
        <div class="column">
            <div id="calculations">
                <table id="total-time">
                    <thead>
                        <tr>
                            <th>Total Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span id="time">0</span></td>
                        </tr>
                    </tbody>
                </table>
                <table id="total-cost">
                    <thead>
                        <tr>
                            <th>Total Cost</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span id="cost">0</span></td>
                        </tr>
                    </tbody>
                </table>
                </div>
        </div>
    </div>
        <br>
        
        <div class="buttons">
            <button id="submitBtn" type="submit" name="submit">Insert Entry</button>
        </div>
    </form>
    <form action="delete.php">
        <div class="buttons">
        <button id="deleteBtn" type="submit" name="delete">Delete all</button>
        </div>
    </form>

    <script type="text/javascript" src="./resources/js/app.js"></script>

</body>
</html>