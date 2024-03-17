<?php 
require_once "dbconnection.php";
if(isset($_POST['submit']))
{
	$count=0;
	$catch=$_POST['flightcode'];
	$sql="select * from flight where FLIGHT_CODE='$catch'";
	$res=mysqli_query($con,$sql);
	if(mysqli_num_rows($res)>0)
	{
		while($row=mysqli_fetch_assoc($res))
		{
			if($catch==$row['FLIGHT_CODE'])
			{
				$duration=$row['DURATION'];
				$arrival=$row['ARRIVAL'];
				$departure=$row['DEPARTURE'];
				$economyclass=$row['PRICE_ECONOMY'];
				$businessclass=$row['PRICE_BUSINESS'];
				$students=$row['PRICE_STUDENTS'];
				$diff=$row['PRICE_DIFFERENTLYABLED'];
				$count+=1;
			}
			else
			{
				$count=0;
			}
		}
	}
	if($count==0)
	{
		echo "<script>alert('Flight Code not in database')</script>";
		echo "<script>window.location='modifyadmindetails.html'</script>";
	}
	$sql="insert into selected(FLIGHT_CODE) values('$catch')";
	$res=mysqli_query($con,$sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Flight Details</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Century Gothic', sans-serif;
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(modifyflightdetails.jpg);
            height: 100vh;
            background-size: cover;
            background-position: center;
            color: #000; /* Changed text color to black */
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff; /* Added white background */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
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
            color: #000;
            background-color: #fff;
            padding: 5px 20px;
            border: 1px solid #fff;
            transition: 0.6s ease;
        }

        .main li a:hover {
            background-color: #ff4500;
            color: #fff;
        }

        .main li.active a {
            background-color: #ff4500;
            color: #fff;
        }

        .title {
            text-align: center;
            margin: 20px 0;
        }

        .title h1 {
            font-size: 70px;
        }

        table.a {
            width: 100%;
            border: 1px solid #fff;
            padding: 10px 30px;
            color: #000;
            text-decoration: none;
            transition: 0.6s ease;
            font-size: 25px;
        }

        input[type="submit"] {
            border: 1px solid #fff;
            padding: 10px 30px;
            text-decoration: none;
            transition: 0.6s ease;
        }

        input[type="submit"]:hover {
            background-color: #ff6347
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="main">
            <ul>
                <li class="active"><a href="#">Modify Flight Details</a></li>
            </ul>
        </div>
        <div class="title">
            <h1>Modify Flight Details</h1>
        </div>
        <form action="modifyflightdetails.php" method="post">
            <table class='a' cellspacing="30">
                <tr>
                    <td>Departure</td>
                    <td><input type="text" placeholder=<?php echo $departure ?> name="departure"></td>
                    <td>Arrival</td>
                    <td><input type="text" placeholder=<?php echo $arrival ?> name="arrival"></td>
                    <td class="date-column">Duration</td> <!-- Increased column size -->
                    <td><input type="text" placeholder=<?php echo $duration ?> name="duration"></td>
                </tr>
                <tr>
                    <td>Price </td>
                </tr>
                <tr>
                    <td>
                        Business Class
                    </td>
                    <td>
                        <input type="number" placeholder=<?php echo $businessclass ?> name="businessclass">
                    </td>
                    <td>
                        Economy Class
                    </td>
                    <td>
                        <input type="number" placeholder=<?php echo $economyclass ?> name="economyclass">
                    </td>
                    <td>
                        For Students
                    </td>
                    <td>
                        <input type="number" placeholder=<?php echo $students ?> name="students">
                    </td>
                </tr>
                <tr>
                    <td>
                        For Differently Abled
                    </td>
                    <td>
                        <input type="number" placeholder=<?php echo $diff ?> name="diff">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="Submit" value="Modify" name="submit">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
