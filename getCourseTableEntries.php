<?php
    session_start();
    
    // $course = $_POST['course'];
    // $department = $_POST['department'];
    // $college = $_POST['college'];
    // $section = $_POST['section'];
    // $id = $_POST['id'];

    $college = 'ATEC';

    $con = mysqli_connect('localhost', 'root', 'root', 'courseregistration');

    if (isset($college)){
        $query = "SELECT department.DName, course.Level, course.CoDescription, section.DaysTime, section.SecNo FROM department INNER JOIN course ON department.DCode = course.CoDCode INNER JOIN section ON course.CoCode = section.CoCode WHERE department.CName ='" . $college . "'";
        
        $result = mysqli_query($con, $query);
        $response = array();
        $response[] = "<tr><th>Department</th><th>Course Number</th><th>Course Name</th><th>Day</th><th>Time</th><th>Section Number</th></tr>";
        while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
            $response[] = "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td></tr>";
        }
        echo json_encode($response);
    }
    
    // $con = mysqli_connect('localhost', 'root', 'root', 'courseregistration');
    // $query = "SELECT DCode FROM department WHERE CName='" . $college . "'";
    // $result = mysqli_query($con, $query);
    // $dCode = mysqli_fetch_assoc($result)['DCode'];
    
    // $query = "SELECT CoCode FROM course WHERE CoDCode='" . $dCode . "'" . "AND CoDescription='" .
    //             $course . "'";

    // $result = mysqli_query($con, $query);
    // $courseCode = mysqli_fetch_assoc($result)['CoCode'];

    // $query = "SELECT SecId, SectionLimit FROM section WHERE CoCode='" . $courseCode . "'" . "AND SecNo='" .
    //             $section . "'";

    // $result = mysqli_query($con, $query);
    // while($row = mysqli_fetch_assoc($result)){
    //     $sectionCode = $row['SecId'];
    //     $sectionLimit = $row['SectionLimit'];
    // }

    // if($sectionLimit - 1 <= 0){
    //     // section is full, reroute to search
    //     header("Location: enrollment.php");
    // }
    // else{
    //     // add to cart table
    //     $query = "INSERT INTO cart (SecId, SID, Deleted) VALUES (". $sectionCode .
    //                 ", " . $id . ", 'N' )";
    //     mysqli_query($con, $query);  
    //     $query = "UPDATE section SET SectionLimit =" . $sectionLimit - 1 . 
    //                 "WHERE SecId='" . $sectionCode . "'";
    //     mysqli_query($con, $query);
    //     header("Location: cart.php");
    // }

    // // route to view cart page
    mysqli_close($con);
        
?>