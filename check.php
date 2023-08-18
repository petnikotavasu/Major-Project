<html>
    <head>
        <title>Outpass System</title>
        <link rel="stylesheet" href="checkcs.css">
	<link rel="stylesheet" href="header.css">
	<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
	<link rel="stylesheet" href="navbar.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    </head>
    <body>
        <div class="header">
            <p>Online Outpass System</p>
        </div>
        <div id="user">
            <div class="navbar">
                <a href="student.php"><i class="fa fa-fw fa-home"></i> Home</a>
                <a href="apply.php"><i class="fa fa-fw fa-envelope"></i> Apply</a>
                <a href="check.php" class="active" ><i class="fa fa-fw fa-search"></i> Check Status</a>
                <a href="sreset.php"><i class="fa fa-fw fa-user"></i> Reset Password</a>
                <a href="logout.php" id="logout"><i class="fa fa-sign-in"></i>  Logout</a>
              </div>
              <div class="table1">
                <?php
                session_start();
                $id=$_SESSION['id'];
                
                if($_SESSION['id']!='' && $_SESSION['login']!=false)
                {
                    $con=new mysqli("localhost","root","","outpass");
                        if(!$con)
                        {
                            echo "There is an error while connecting to database";
                        }
                        $quer="SELECT * from reg where id='$id' group by outpassId  order by outpassId DESC";
                        $select=mysqli_query($con,$quer);
                        $rows=mysqli_num_rows($select);
                        if($rows==0)
                        {
                            echo "<h2><center><font color=red>No Records Found</font><strong></strong></center><h2>";
                        }
                        else
                        {
                            echo "<table>
                            <tr>
                                <td colspan='6' id='tablehead'><b>Outpass Status / History</b></td>
                            </tr>
                            <tr class='tr1'>
                                <td><b>Outpass ID</b></td>
                                <td><b>Applied On</b></td>
                                <td><b>From Date</b></td>
                                <td><b>To Date</b></td>
                                <td><b>Reason</b></td>
                                <td><b>Status</b></td>
                            </tr>";
                           while($data=mysqli_fetch_assoc($select))
                           {
                               	echo" <tr class='tr1'>
		                    	<td>".$data['outpassId']."</td>
		                        <td>".$data['applydate']."</td>
		                        <td>".$data['fromdate']."</td>
		                        <td>".$data['todate']."</td>
		                        <td>".$data['reason']."</td>";
		                        if($data['status']=='Pending')
		                        {
		                            echo "<td style='color: blue;'>".$data['status']."</td>";
					}
		                        else if ($data['status']=='Approved')
		                            echo "<td style='color: green;'>".$data['status']."</td>";
		                        else
		                            echo "<td style='color: red;'>".$data['status']."</td>
					</tr>";
                           		};
			   echo " </table>";
                       	   }
                }
                else
                {
                    header("Location:home.php");
                }
                ?>
                </div>
        </div>
    </body>
</html>
