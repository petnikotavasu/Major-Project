<html>
    <head>
        <title>Outpass System</title>
        <link rel="stylesheet" href="pendingcs.css">
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
                <a  href="warden.php"><i class="fa fa-fw fa-home"></i> Home</a>
                <a class="active" href="pending.html"><i class="fa fa-book"></i> Pending List</a>
                <a href="#"><i class="fa fa-fw fa-envelope"></i> Accepted List</a>
                <a href="#"><i class="fa fa-ban"></i> Rejected List</a>
                <a href="#"><i class="fa fa-fw fa-user"></i> Reset Password</a>
                <a href="logout.php" id="logout"><i class="fa fa-sign-in"></i>  Logout</a>
              </div>
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
                        $quer="SELECT * from reg where status='Pending' group by applydate  order by applydate DESC";
                        $select=mysqli_query($con,$quer);
                        $rows=mysqli_num_rows($select);
                        
                        if($rows==0)
                        {
                            echo "<h2><center><font color=red>No Records Found</font><strong></strong></center><h2>";
                        }else
                        {
                            
                        
                
                         echo "<div class='table1'>
                                <table class='table2'>
                                    <tr class='tr1'>
                                        <td colspan='9' id='tablehead'><b>Pending List</b></td>
                                    </tr>
                                    <tr class='tr1'>
                                        <td class='td1'><b>Outpass ID</b></td>
                                        <td class='td1'><b>Name</b></td>
                                        <td class='td1'><b>ID</b></td>
                                        <td class='td1'><b>Applied On</b></td>
                                        <td class='td1'><b>From Date</b></td>
                                        <td class='td1'><b>To Date</b></td>
                                        <td class='td1' colspan='2'><b>Action</b></td>
                                        <td class='td1'><b>More Details</b></td>
                                    </tr>";
                                    $_SESSION['oi']='';
                                    while($data=mysqli_fetch_assoc($select))
                                    {
                                        $ssid=$data['id'];
                                        
                                        $nam="select name from student_login where id='$ssid'";
                                        
                                        $name=mysqli_query($con,$nam);
                                        $dat=mysqli_fetch_assoc($name);
                                        $ssname=$dat['name'];
                                        
                                         echo "<tr >
                                         <td class='td1'>".$data['outpassId']."</td>
                                        <td class='td1'>".$ssname."</td>
                                        <td class='td1'>".$data['id']."</td>
                                        <td class='td1'>".$data['applydate']."</td>
                                        <td class='td1'>".$data['fromdate']."</td>
                                        <td class='td1'>".$data['todate']."</td>";
                                        $_SESSION['oi']=$data['outpassId'];
                                       echo "<td class='td1'><a href='approve.php?oi=$data[outpassId]' onclick='return checkApprove()' style='text-decoration:none;'><button class='btn' id='green'>Accept</button></a></td>
                                        <td class='td1'><a href='rej.php?oi=$data[outpassId]' onclick='return checkReject()' style='text-decoration:none;'><button class='btn' id='red'>Reject</button</a></td>
                                        <td class='td1'><a href='inner.php?oi=$data[outpassId]' id='myBtn'>View Details</a></td>
                                    </tr>";
                                    }
                                echo "</table>";
                                
                                
                                 echo" </div>";
                    }
            }
            else
            {
                header("Location:home.php");
            }
              ?>
        </div>
        <script>
            function checkReject()
        {
             return confirm('Are you sure you wanr to Reject');
        }
        function checkApprove()
         {
             return confirm('Are you sure you wanr to Approve');
         }
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on the button, open the modal
            btn.onclick = function() {
            modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
            modal.style.display = "none";
            window.location.href="http://localhost/Out%20Pass%20System/pending.php";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
                window.location.href="http://localhost/Out%20Pass%20System/pending.php";
            }
            }
        </script>
    </body>
</html>
