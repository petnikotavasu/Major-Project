<html>
    <head>
        <title>Outpass System</title>
        <link rel="stylesheet" href="studentcs.css">
	<link rel="stylesheet" href="header.css">
	<link rel="stylesheet" href="navbar.css">
	<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    </head>
    
    <body>
        <div class="header">
            <p>Online Outpass System</p>
        </div>
        <div id="user">
            <div class="navbar">
                <a class="active" href="student.php"><i class="fa fa-fw fa-home"></i> Home</a>
                <a href="apply.php"><i class="fa fa-fw fa-envelope"></i> Apply</a>
                <a href="check.php"><i class="fa fa-fw fa-search"></i> Check Status</a>
                <a href="sreset.php"><i class="fa fa-fw fa-user"></i> Reset Password</a>
                <a href="logout.php" id="logout" ><i class="fa fa-sign-in"></i>  Logout</a>
            </div>
            <div class="card">
                <img src="dummyprofile.png" alt="image" />
                <?php
                session_start();
                $rid=$_SESSION['id'];
                $id=$_GET['user'];
                if(( $_SESSION['id']!='')&& $_SESSION['login']==true)
                {
                    	$con=new mysqli("localhost","root","","outpass");
                	if(!$con)
		        {
		            echo "There is an error while connecting";
		        }
		    
		        $query="SELECT * from student_login where id='$rid'";
		        
		      
		        $data=mysqli_query($con,$query);
		        $result=mysqli_fetch_assoc($data);
			echo "<h1>".$result['name']."</h1>
		       <table>
		            <tr>
		                <td><strong>Student ID</strong></td>
		                <td>".$result['id']."</td>
		            </tr>
		            <tr>
		                <td><strong>Gender</strong></td>
		                <td>".$result['gender']."</td>
		            </tr>
		            <tr>
		                <td><strong>Email ID</strong></td>
		                <td>".$result['email']."</td>
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
