<html>
    <head>
        <title>Outpass System</title>
        <link rel="stylesheet" href="detailscs.css">
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
                <a  class="active"  href="accept.php"><i class="fa fa-fw fa-envelope"></i> Accepted List</a>
                <a href="reject.php"><i class="fa fa-ban"></i> Rejected List</a>
                <a href="freset.php"><i class="fa fa-fw fa-user"></i> Reset Password</a>
                <a href="logout.php" id="logout"><i class="fa fa-sign-in"></i>  Logout</a>
              </div>
              <div>
                <div id="dbtn">
                    <center><a href="accept.php"><button  class="btn"><i class="fa fa-arrow-circle-left"></i> Back</button></a></center>
                </div>
                    <?php
                    session_start();
                    $oi=$_GET['oi'];
                    if($_SESSION['empid']!='')
                    {
                        $con=new mysqli("localhost","root","","outpass");
                        if(!$con)
                        {
                            echo "There is an error while connecting to database";
                        }
                        $quer="SELECT * from reg  where outpassId='$oi'";
                        $select=mysqli_query($con,$quer);
                        while($data=mysqli_fetch_assoc($select))
                        {
                            $id=$data['id'];
                            $dq="SELECT * from student_login where id='$id'";
                            $detail=mysqli_query($con,$dq);
                            $da=mysqli_fetch_assoc($detail);
                            echo"<table class='table2'>
                            <tr class='tr1'>
                                <td colspan='2' id='tablehead'><b>Outpass Details</b></td>
                            </tr>
                            <tr class='tr1'>
                                <td><b>Outpass Id</b></td>
                                <td>".$data['outpassId']."</td>
                            </tr>
                            <tr class='tr1'>
                                <td><b>Name</b></td>
                                <td>".$da['name']."</td>
                            </tr>
                            <tr >
                                <td><b>Student ID</b></td>
                                <td>".$da['id']."</td>
                            </tr>
                            <tr >
                                <td><b>gender</b></td>
                                <td>".$da['gender']."</td>
                            </tr>
                            <tr >
                                <td><b>Phone Number</b></td>
                                <td>".$data['snumber']."</td>
                            </tr>
                            <tr >
                                <td><b>Email</b></td>
                                <td>".$da['email']."</td>
                            </tr>
                            <tr >
                                <td><b>Guardian Name</b></td>
                                <td>".$data['gname']."</td>
                            </tr>
                            <tr >
                                <td><b>Guardian Number</b></td>
                                <td>".$data['gnumber']."</td>
                            </tr>
                            <tr >
                                <td><b>From Date</b></td>
                                <td>".$data['fromdate']."</td>
                            </tr>
                            <tr >
                                <td><b>To date</b></td>
                                <td>".$data['todate']."</td>
                            </tr>
                            <tr >
                                <td><b>Reason</b></td>
                                <td>".$data['reason']."</td>
                            </tr>
                            <tr >
                                <td><b>Applied date</b></td>
                                <td>".$data['applydate']."</td>
                            </tr>
                            <tr >
                                <td><b>Status</b></td>";
                                //<td>".$data['status']."</td>
                                if($data['status']=='Pending')
                                {
                                    echo "<td style='color: blue;'>".$data['status']."</td>";

                                }
                                else if ($data['status']=='Approved')
                                    echo "<td style='color: green;'>".$data['status']."</td>";
                                else
                                 echo "<td style='color: red;'>".$data['status']."</td>
                            </tr>
                            </table>";
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
