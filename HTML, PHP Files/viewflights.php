<?php
require_once "dbconnection.php";

// Check if the database connection is successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Proceed with the query only if the connection is successful
$query = mysqli_query($con, "SELECT * FROM flight");

// Check if the query was successful
if (!$query) {
    die("Query failed: " . mysqli_error($con));
}

$rowscount = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Flights</title>
    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Century Gothic', sans-serif;
    background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(allfights.jpg);
    background-size: cover;
    background-position: center;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #000; /* Changed text color to black */
}

.container {
    max-width: 1200px;
    padding: 20px;
    background-color: rgba(255, 255, 255, 0.9);
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
}

.navbar {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 20px;
}

.navbar a {
    text-decoration: none;
    color: #000;
    background-color: #fff;
    padding: 8px 15px;
    border-radius: 5px;
    margin-left: 10px;
    transition: background-color 0.3s ease;
}

.navbar a:hover {
    background-color: #ff4500;
    color: #fff;
}

.title {
    text-align: center;
    margin-bottom: 20px;
}

.title h1 {
    font-size: 48px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid #ddd;
    color: #000; /* Changed text color to black */
}

th {
    background-color: #ff4500;
    color: #fff;
}

th.date-column {
    min-width: 120px; /* Increased width for the date column */
}

tr:nth-child(even) {
    background-color: rgba(255, 255, 255, 0.7);
}

tr:hover {
    background-color: rgba(255, 255, 255, 0.9);
}

button[type="submit"] {
    padding: 8px 15px;
    background-color: #ff4500;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #ff6347;
}


    </style>
</head>
<body>
    <div class="container">
        <div class="navbar">
            <a href="#">All Flights</a>
            <a href="adminchoice.html">Admin</a>
            <a href="homepage.html">Home</a>
        </div>
        <div class="title">
            <h1>All Flights</h1>
        </div>
        <table>
            <thead>
                <tr>
                    <th>SOURCE</th>
                    <th>DESTINATION</th>
                    <th>DEPARTURE</th>
                    <th>ARRIVAL</th>
                    <th>DURATION</th>
                    <th>FLIGHT CODE</th>
                    <th>AIRLINE ID</th>
                    <th>PRICE (BUSINESS)</th>
                    <th>PRICE (ECONOMY)</th>
                    <th>PRICE (STUDENT)</th>
                    <th>PRICE (DIFF)</th>
                    <th>DATE</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 1; $i <= $rowscount; $i++) {
                    $rows = mysqli_fetch_array($query);
                ?>
                    <tr>
                        <td><?php echo $rows['SOURCE'] ?></td>
                        <td><?php echo $rows['DESTINATION'] ?></td>
                        <td><?php echo $rows['DEPARTURE'] ?></td>
                        <td><?php echo $rows['ARRIVAL'] ?></td>
                        <td><?php echo $rows['DURATION'] ?></td>
                        <td><?php echo $rows['FLIGHT_CODE'] ?></td>
                        <td><?php echo $rows['AIRLINE_ID'] ?></td>
                        <td><?php echo $rows['PRICE_BUSINESS'] ?></td>
                        <td><?php echo $rows['PRICE_ECONOMY'] ?></td>
                        <td><?php echo $rows['PRICE_STUDENTS'] ?></td>
                        <td><?php echo $rows['PRICE_DIFFERENTLYABLED'] ?></td>
                        <td><?php echo $rows['DATE'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
