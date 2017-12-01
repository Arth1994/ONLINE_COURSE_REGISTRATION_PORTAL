<?php
    session_start();

    // $course = $_POST['course'];
    // $department = $_POST['department'];
    // $college = $_POST['college'];
    // $section = $_POST['section'];
    // $id = $_SESSION['user'];

   
    $con = mysqli_connect('localhost', 'root', 'root', 'courseregistration');
    // $query = "SELECT DCode FROM department WHERE CName='" . $college . "'";
    // $result = mysqli_query($con, $query);
    // $dCode = mysqli_fetch_assoc($result)['DCode'];
    
    // $query = "SELECT CoCode FROM course WHERE CoDCode='" . $dCode . "'" . "AND CoDescription='" .
    //             $course . "'";

    // $result = mysqli_query($con, $query);
    // $courseCode = mysqli_fetch_assoc($result)['CoCode'];

    // $query = "SELECT SecId, SectionLimit FROM section WHERE CoCode='" . $courseCode . "'" . "AND SecNo='" .
    //             $section . "'";

   $sectionID = $_REQUEST['sectionID'];
   $userID = $_REQUEST['userID'];


    $query = "SELECT SectionLimit FROM section WHERE SecId = '$sectionID'";
    $result = mysqli_query($con, $query);
    $sectionLimit = mysqli_fetch_assoc($result)['SectionLimit'];

    print_r($sectionLimit);
    if($sectionLimit - 1 < 0){
        // section is full, reroute to search
       echo "Section is Full";
    }
    else{
        // add to cart table
        $query = "INSERT INTO cart (SecId, SID, Deleted) VALUES ('$sectionID', '$userID', 'N' )";
        if(mysqli_query($con, $query))
        {
            $sectionLimit = $sectionLimit - 1; 
         
            $query = "UPDATE section SET SectionLimit= $sectionLimit WHERE SecId='$sectionID'";
            mysqli_query($con, $query);
            echo "Added";
        }  
       else{
        echo $query . "<br>" . mysqli_error($con);
       }
      
        //header("Location: enrollment.php");
    }

    // route to view cart page
    mysqli_close($con);
    
?>
