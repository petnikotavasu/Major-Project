<?php
if(isset($_post['sub']))
{
    session_start();
    $id=$_SESSION['id'];
    $gaudianName=$_POST['gname'];
    $gaudianNumber=$_POST['gnumber'];
    $studentNumber=$_POST['snumber'];
    $fromDate=$_POST['fromdate'];
    $toDate=$_POST['todate'];
    $reason=$_POST['reason'];
    if((is_numeric($$gaudianNumber))&&(is_numeric($$studentNumber))
    {
        echo "Registration Fail";
    }
    else
    {
        /*echo "ID: ".$id;
        echo "<br>Gaudian Name: ".$gaudianName;
        echo "<br>Gaudian Number: ".$gaudianNumber;
        echo "<br>Student number: ".$studentNumber;
        echo "<br>From: ".$fromDate;
        echo "<br>To: ".$toDate;
        echo "<br>Reason: ".$reason;*/
        $con=new mysqli("localhost","root","","outpass");
        if(!$con)
        {
            echo "there is a problem in connecting";
        }
        $ins="INSERT INTO `reg`(`id`, `gname`, `gnumber`, `snumber`, `fromdate`, `todate`, `reason`) VALUES ('$id','$gaudianName',$gaudianNumber,$studentNumber,'$fromDate','$toDate','$reason')";
        $quer=mysqli_query($con,$ins);
        if($quer){
            echo "Sucessfully registered";
            
        }
    }
}

?>