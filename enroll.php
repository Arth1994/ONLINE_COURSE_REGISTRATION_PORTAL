<?php
    session_start();

   
    $con = mysqli_connect('localhost', 'root', 'root', 'courseregistration');

    $sectionIDS = $_REQUEST['sectionIDS'];
    $userID = $_REQUEST['userID'];
    $test = "true";
    $testsection = "true";
    

    
    
    foreach($sectionIDS as $i  => $item){
        
        $query = "SELECT SectionLimit FROM section WHERE SecId = '$item'";
        $result = mysqli_query($con, $query);
        $sectionLimit = mysqli_fetch_assoc($result)['SectionLimit'];
    
    
        if($sectionLimit - 1 < 0){
            // section is full, reroute to search
           echo "One or more of the sections is Full";
           $testsection = false;
        }
        
        else{

            $query = "INSERT INTO takes (SID, SecID) VALUES ('$userID', '$item')";
            if(mysqli_query($con, $query))
            {
                   $sectionLimit = $sectionLimit - 1; 
                
                   $query = "UPDATE section SET SectionLimit= $sectionLimit WHERE SecId='$item'";
                   mysqli_query($con, $query);
            }
            else{
                $test = "false";
            }
        }
       
    }

    if($test == "false")
    {
        echo "You've already been enrolled in one or more of these classes.";
    }
    
    else{
        if($testsection == "true")
        echo "You've been enrolled in your classes";
    }
    

    // route to view cart page
    mysqli_close($con);
    
?>
