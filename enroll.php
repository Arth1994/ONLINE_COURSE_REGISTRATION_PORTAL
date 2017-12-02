<?php
    session_start();

   
    $con = mysqli_connect('localhost', 'root', 'root', 'courseregistration');

    $sectionIDS = $_REQUEST['sectionIDS'];
    $userID = $_REQUEST['userID'];
    $test = "true";
    foreach($sectionIDS as $i  => $item){
        $query = "INSERT INTO takes (SID, SecID) VALUES ('$userID', '$item')";
        if(mysqli_query($con, $query))
        {

        }
        else{
            $test = "false";
        }
    }

    if($test == "false")
    {
        echo "You've already been enrolled in one or more of these classes.";
    }
    else{
        echo "You've been enrolled in your classes";
    }
    

    // route to view cart page
    mysqli_close($con);
    
?>
