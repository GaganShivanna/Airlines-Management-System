<?php
require_once "dbconnection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airlines ID</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: Century Gothic;
        }

        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(airlinesID.jpg);
            height: 100vh;
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .main {
            float: right;
            list-style-type: none;
            margin-top: 25px;
        }

        .main li {
            display: inline-block;
        }

        .main li a {
            text-decoration: none;
            color: #fff;
            padding: 5px 20px;
            border: 1px solid #fff;
            transition: 0.6s ease;
        }

        .main li a:hover {
            background-color: #fff;
            color: #000;
        }

        .main li.active a {
            background-color: #fff;
            color: #000;
        }

        .title {
            position: absolute;
            top: 15%;
            left: 40%;
        }

        .title h1 {
            color: #fff;
            font-size: 70px;
        }

        .container {
            position: absolute;
            top: 27%;
            left: 37%;
            border: 1px solid #fff;
            padding: 30px;
            background-color: #fff;
            transition: 0.6s ease;
            font-size: 25px;
        }

        .container:hover {
            background-color: #f0f0f0; /* Hover effect color */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #ff4500;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.7);
        }

        tr:hover {
            background-color: rgba(255, 255, 255, 0.9);
        }
    </style>
</head>
<body>
    <div class="main">
        <ul>
            <li class="active"><a href="#">Airlines Code</a></li>
            <li><a href="admin_form.html">Add Flights</a></li>
            <li><a href="homepage.html">Home</a></li>
        </ul>
    </div>
    <div class="title">
        <h1>Airlines ID</h1>
    </div>
    <div class="container">
        <table>
            <tr>
                <th>Airlines ID</th>
                <th>Airlines Name</th>
            </tr>
            <?php
            $query = mysqli_query($con, "select * from airline");
            $rowscount = mysqli_num_rows($query);
            for ($i = 1; $i <= $rowscount; $i++) {
                $rows = mysqli_fetch_array($query);
            ?>
                <tr>
                    <td><?php echo $rows['AIRLINE_ID'] ?></td>
                    <td><?php echo $rows['AIRLINE_NAME'] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>
</html>
