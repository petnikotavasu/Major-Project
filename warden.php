<html>
    <head>
        <title>Outpass System</title>
        <link rel="stylesheet" href="wardencs.css">
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
                <a class="active" href="warden.php"><i class="fa fa-fw fa-home"></i> Home</a>
                <a href="pending.php"><i class="fa fa-book"></i> Pending List</a>
                <a href="accept.php"><i class="fa fa-fw fa-envelope"></i> Accepted List</a>
                <a href="reject.php"><i class="fa fa-ban"></i> Rejected List</a>
                <a href="freset.php"><i class="fa fa-fw fa-user"></i> Reset Password</a>
                <a href="logout.php" id="logout"><i class="fa fa-sign-in"></i>  Logout</a>
              </div>
              <div class="card">
                <img src="dummyprofile.png" alt="image" />
                <?php
                session_start();
                $con=new mysqli("localhost","root","","outpass");
                $id=$_SESSION['empid'];
                if(($_SESSION['empid']!='') && $_SESSION['login']!=false )
                {
                    if(!$con)
                    {
                        echo "There is an error while connecting";
                    }
                    $query="SELECT * from warden_login where empId='$id'";
                    $data=mysqli_query($con,$query);
                    $result=mysqli_fetch_assoc($data);
		    echo "<h2>".$result['name']."</h2>
                    <table>
                        <tr>
                            <td><strong>Employee ID</strong></td>
                            <td>".$result['empId']."</td>
                        </tr>
                        <tr>
                            <td><strong>Gender</strong></td>
                            <td>".$result['gender']."</td>
                        </tr>
                        <tr>
                            <td><strong>Email ID</strong></td>
                            <td>".$result['email']."</td>
                        </tr>
                        <tr>
                            <td><strong>Designation</strong></td>
                            <td>Warden</td>
                        </tr>
                    </table>";
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
