<?php
    session_start();

    $course = $_POST['course'];
    $department = $_POST['department'];
    $college = $_POST['college'];
    $section = $_POST['section'];
    $id = $_POST['id'];

   
    
    $con = mysqli_connect('localhost', 'root', 'root', 'courseregistration');
    $query = "SELECT DCode FROM department WHERE CName='" . $college . "'";
    $result = mysqli_query($con, $query);
    $dCode = mysqli_fetch_assoc($result)['DCode'];
    
    $query = "SELECT CoCode FROM course WHERE CoDCode='" . $dCode . "'" . "AND CoDescription='" .
                $course . "'";

    $result = mysqli_query($con, $query);
    $courseCode = mysqli_fetch_assoc($result)['CoCode'];

    $query = "SELECT SecId, SectionLimit FROM section WHERE CoCode='" . $courseCode . "'" . "AND SecNo='" .
                $section . "'";

    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_assoc($result)){
        $sectionCode = $row['SecId'];
        $sectionLimit = $row['SectionLimit'];
    }

    if($sectionLimit - 1 <= 0){
        // section is full, reroute to search
    }
    else{
        // add to cart table
    }

    // route to view cart page
    mysqli_close($con);
    
    // $result = mysqli_query($con, $query);
    // if (!mysqli_query($con, $query)){
    //     echo("Error description: " . mysqli_error($con));
    // }
    // $response = array();
    // $response[0] = '<option value = ""></option>';
    // $count = 1;
    // while($row = mysqli_fetch_assoc($result)){
    //     $response[$count] = "<option value ='" . $row['SecNo'] . "'>" . $row['SecNo'] . "</option>";
    //     $count++;
    // }
    // echo json_encode($response);
    // mysqli_close($con);
    
?>
