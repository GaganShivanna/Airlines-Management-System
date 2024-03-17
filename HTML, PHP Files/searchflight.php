<?php 
	require_once "dbconnection.php";
	if(isset($_POST['search']))
	{
		if(isset($_POST['source']) && !empty($_POST['source']))
		{	
			if(isset($_POST['destination']) && !empty($_POST['destination']))
			{
				if(isset($_POST['date']) && !empty($_POST['date']))
				{
					$source=$_POST['source'];
					$destination=$_POST['destination'];
					$date=$_POST['date'];
					$query=mysqli_query($con,("select ARRIVAL,DEPARTURE,DURATION,FLIGHT_CODE,AIRLINE_ID,PRICE_BUSINESS,PRICE_ECONOMY,PRICE_STUDENTS,PRICE_DIFFERENTLYABLED from flight where SOURCE='$source' && DESTINATION='$destination' && DATE='$date'"));
					$rowscount=mysqli_num_rows($query);
					if ($rowscount==0){
						echo "<script>alert('No Flights available')</script>";
						echo "<script>window.location='searchflight.html'</script>";
					}
				}
				else{
					echo "<script>alert('Please Enter the details correctly')</script>";
					echo "<script>window.location='homepage.html'</script>";
				}
			}
			else{
				echo "<script>alert('Please Enter the details correctly')</script>";
				echo "<script>window.location='homepage.html'</script>";
			}
		}
		else{
			echo "<script>alert('Please Enter the details correctly')</script>";
			echo "<script>window.location='homepage.html'</script>";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Flights</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: Century Gothic;
        }

        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(availableflights.jpg);
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
            left: 35%;
        }

        .title h1 {
            color: #fff;
            font-size: 70px;
        }

        .container {
            position: absolute;
            top: 27%;
            left: 20%;
            border: 1px solid #fff;
            padding: 30px;
            background-color: #fff;
            transition: 0.6s ease;
            font-size: 20px;
        }

        .container:hover {
            background-color: #f0f0f0; /* Hover effect color */
        }

        button[type="submit"] {
            border: 1px solid #fff;
            padding: 10px 30px;
            text-decoration: none;
            transition: 0.6s ease;
            background-color: #ff4500; /* Button background color */
            color: #fff;
            text-decoration: none; /* Remove underline */
        }

        button[type="submit"]:hover {
            background-color: #ffa500; /* Hover effect color for the button */
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
            <li class="active"><a href="#">Available Flights</a></li>
            <li><a href="homepage.html">Home</a></li>
        </ul>
    </div>
    <div class="title">
        <h1>Available Flights</h1>
    </div>
    <div class="container">
        <table>
            <tr>
                <th>DEPARTURE</th>
                <th>ARRIVAL</th>
                <th>DURATION</th>
                <th>FLIGHT_CODE</th>
                <th>AIRLINE_ID</th>
                <th>PRICE</th>
                <th>TYPE</th>
                <th></th>
            </tr>
            <form action="postflightcode.php" method="post">
                <?php 
                    for($i=1;$i<=$rowscount;$i++)
                    {
                        $rows=mysqli_fetch_array($query);
                ?>
                    <tr>
                        <td><?php echo $rows['DEPARTURE'] ?></td>
                        <td><?php echo $rows['ARRIVAL'] ?></td>
                        <td><?php echo $rows['DURATION'] ?></td>
                        <td><?php echo $rows['FLIGHT_CODE']?></td>
                        <td><?php echo $rows['AIRLINE_ID']?></td>
                        <td><?php echo $rows['PRICE_BUSINESS']?></td>
                        <td><?php echo "BUSINESS";?></td>
                        <td>&nbsp;<button type="submit"><a href="postflightcodebusiness.php?id=<?php echo $rows['FLIGHT_CODE'] ?>">Select</a></button></td>
                    </tr>
                    <tr>
                        <td><?php echo $rows['DEPARTURE'] ?></td>
                        <td><?php echo $rows['ARRIVAL'] ?></td>
                        <td><?php echo $rows['DURATION'] ?></td>
                        <td><?php echo $rows['FLIGHT_CODE']?></td>
                        <td><?php echo $rows['AIRLINE_ID']?></td>
                        <td><?php echo $rows['PRICE_ECONOMY']?></td>
                        <td><?php echo "ECONOMY";?></td>
                        <td>&nbsp;<button type="submit"><a href="postflightcodeeconomy.php?id=<?php echo $rows['FLIGHT_CODE'] ?>">Select</a></button></td>
                    </tr>
                    <tr>
                        <td><?php echo $rows['DEPARTURE'] ?></td>
                        <td><?php echo $rows['ARRIVAL'] ?></td>
                        <td><?php echo $rows['DURATION'] ?></td>
                        <td><?php echo $rows['FLIGHT_CODE']?></td>
                        <td><?php echo $rows['AIRLINE_ID']?></td>
                        <td><?php echo $rows['PRICE_STUDENTS']?></td>
                        <td><?php echo "STUDENTS";?></td>
                        <td>&nbsp;<button type="submit"><a href="postflightcodestudents.php?id=<?php echo $rows['FLIGHT_CODE'] ?>">Select</a></button></td>
                    </tr>
                    <tr>
                        <td><?php echo $rows['DEPARTURE'] ?></td>
                        <td><?php echo $rows['ARRIVAL'] ?></td>
                        <td><?php echo $rows['DURATION'] ?></td>
                        <td><?php echo $rows['FLIGHT_CODE']?></td>
                        <td><?php echo $rows['AIRLINE_ID']?></td>
                        <td><?php echo $rows['PRICE_DIFFERENTLYABLED']?></td>
                        <td><?php echo "DIFFERENTLY ABLED";?></td>
                        <td>&nbsp;<button type="submit"><a href="postflightcodediff.php?id=<?php echo $rows['FLIGHT_CODE'] ?>">Select</a></button></td>
                    </tr>
                <?php   
                    }
                ?>
            </form>
        </table>
    </div>
</body>
</html>
