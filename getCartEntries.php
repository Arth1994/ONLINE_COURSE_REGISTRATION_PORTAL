<?php
    session_start();

    $userID = $_REQUEST['userID'];
    // $userID = '0';
    $con = mysqli_connect('localhost', 'root', 'root', 'courseregistration');

    $query = "SELECT department.DName, course.Level, course.CoDescription, section.DaysTime, section.SecNo, cart.SecId, cart.Deleted FROM cart INNER JOIN section ON cart.SecId = section.SecId INNER JOIN course ON section.CoCode = course.CoCode INNER JOIN department ON course.CoDCode = department.DCode WHERE cart.SID = '$userID'";

    

    if($result = mysqli_query($con, $query)){
        $response = array();
        $response[] = "<tr><th>Department</th><th>Course Number</th><th>Course Name</th><th>Time</th><th>Section Number</th><th>Remove</th></tr>";
        while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
            if ($row[6] == 'N') {
                $response[] = "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td><td><button class='remove btn btn-danger' id ='". $row[5] ."'>Remove</button></td></tr>";
            } 
        }
        echo json_encode($response);
    } else {
      //  echo json_encode($data);
    }
    
    mysqli_close($con);
?>