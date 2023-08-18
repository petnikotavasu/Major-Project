<html>
    <head>
        <title>Outpass System</title>
        <link rel="stylesheet" href="acceptcs.css">
	<link rel="stylesheet" href="header.css">
	<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
	<link rel="stylesheet" href="wardennav.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    </head>
    <body>
        <div class="header">
            <p>Online Outpass System</p>
        </div>
	<div id="user">
            <div class="navbar">
                <a href="warden.php"><i class="fa fa-fw fa-home"></i> Home</a>
                <a href="pending.php"><i class="fa fa-book"></i> Pending List</a>
                <a class="active" href="accept.php" class="active"><i class="fa fa-fw fa-envelope"></i> Accepted List</a>
                <a href="reject.php"><i class="fa fa-ban"></i> Rejected List</a>
                <a href="freset.php"><i class="fa fa-fw fa-user"></i> Reset Password</a>
                <a href="logout.php" id="logout"><i class="fa fa-sign-in"></i>  Logout</a>
              </div>
              <?php
              session_start();
              $id=$_SESSION['empid'];
                if($_SESSION['empid']!='' && $_SESSION['login']!=false)
                {
                    	$con=new mysqli("localhost","root","","outpass");
                        if(!$con)
                        {
                            echo "There is an error while connecting to database";
                        }
                        $quer="SELECT * from reg where status='Approved' group by applydate  order by applydate DESC";
                        $select=mysqli_query($con,$quer);
                        $rows=mysqli_num_rows($select);
                        
                        if($rows==0)
                        {
                            echo "<h2><center><font color=red>No Records Found</font><strong></strong></center><h2>";
                        }
                        echo "<table class='table2'>
		            <tr class='tr1'>
		                <td colspan='6' id='tablehead'><b>Accepted List</b></td>
		            </tr>
		            <tr class='tr1'>
		            <td class='td1'><b>Outpass Id</b></td>
		                <td class='td1'><b>Name</b></td>
		                <td class='td1'><b>ID</b></td>
		                <td class='td1'><b>Appilied on</b></td>
		                <td class='td1'><b>From Date</b></td>
		                <td class='td1'><b>To Date</b></td>
		                <td class='td1'><b>More Details</b></td>
		            </tr>";
		            while($data=mysqli_fetch_assoc($select))
		            {
		                $ssid=$data['id'];
		                                
		                $nam="select name from student_login where id='$ssid'";                
		                $name=mysqli_query($con,$nam);
		                $dat=mysqli_fetch_assoc($name);
		                $ssname=$dat['name'];
		                $oi=$data['outpassId'];
		               	echo"<tr >
		                
				        <td class='td1'>".$data['outpassId']."</td>
				        <td class='td1'>".$ssname."</td>
				        <td class='td1'>".$data['id']."</td>
				        <td class='td1'>".$data['applydate']."</td>
				        <td class='td1'>".$data['fromdate']."</td>
				        <td class='td1'>".$data['todate']."</td>
				        <td class='td1'><a href='details.php?oi=$oi' id='myBtn'>View Details</a></td>
		            	</tr>";
		            }
		       echo "</table>";
                }
		else
		{
			header("Location:home.php");
		}
                ?>
	</div>
    </body>
</html>
