<?php
    session_start();
    
    $course = $_POST['course'];
    $department = $_POST['department'];
    $college = $_REQUEST['college'];
    $section = $_REQUEST['section'];
    // $id = $_POST['id'];

    $con = mysqli_connect('localhost', 'root', 'root', 'courseregistration');

    if (isset($college) and !isset($department) and !isset($course) and !isset($section)){
        $query = "SELECT department.DName, course.Level, course.CoDescription, section.DaysTime, section.SecNo FROM department INNER JOIN course ON department.DCode = course.CoDCode INNER JOIN section ON course.CoCode = section.CoCode WHERE department.CName ='" . $college . "'";
        
        $result = mysqli_query($con, $query);
        $response = array();
        $response[] = "<tr><th>Department</th><th>Course Number</th><th>Course Name</th><th>Time</th><th>Section Number</th></tr>";
        while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
            $response[] = "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td></tr>";
        }
    } elseif (isset($college) and isset($department) and !isset($course) and !isset($section)) {
        $query = "SELECT department.DName, course.Level, course.CoDescription, section.DaysTime, section.SecNo FROM department INNER JOIN course ON department.DCode = course.CoDCode INNER JOIN section ON course.CoCode = section.CoCode WHERE department.CName ='" . $college . "' AND department.DName='" . $department . "'";
        
        $result = mysqli_query($con, $query);
        $response = array();
        $response[] = "<tr><th>Department</th><th>Course Number</th><th>Course Name</th><th>Time</th><th>Section Number</th></tr>";
        while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
            $response[] = "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td></tr>";
        }
    } elseif (isset($college) and isset($department) and isset($course) and !isset($section)) {
        $query = "SELECT department.DName, course.Level, course.CoDescription, section.DaysTime, section.SecNo FROM department INNER JOIN course ON department.DCode = course.CoDCode INNER JOIN section ON course.CoCode = section.CoCode WHERE department.CName ='" . $college . "' AND department.DName='" . $department . "'" . "' AND course.CoDescription='" . $course . "'";
        
        $result = mysqli_query($con, $query);
        $response = array();
        $response[] = "<tr><th>Department</th><th>Course Number</th><th>Course Name</th><th>Time</th><th>Section Number</th></tr>";
        while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
            $response[] = "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td></tr>";
        }
    }

    echo json_encode($response);
    
    mysqli_close($con);
        
?>