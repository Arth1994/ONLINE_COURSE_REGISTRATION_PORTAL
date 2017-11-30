<?php
session_start()
?>

<!DOCTYPE html>
<html>

<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
    </script> 

    <script>
        $(document).ready(function(){
            $(document).on("change", '#college', function(e){
                var college = $('#college').val();
                $.ajax({
                    url: 'getDepartments.php',
                    type: 'POST',
                    data: {college: college}, 
                    dataType : "json",
                    success: function (result) {
                        $('#department').empty();
                        $('#course').empty();
                        $('#section').empty();
                        for (var key in result){
                            $('#department').append(result[key]);
                        }
                    }
                }).done(function(){
                })
            });
            $(document).on("change", '#department', function(e){
                var department = $('#department').val();
                $.ajax({
                    url: 'getCourses.php',
                    type: 'POST',
                    data: {department: department}, 
                    dataType : "json",
                    success: function (result) {
                        $('#course').empty();
                        $('#section').empty();
                        for (var key in result){
                            $('#course').append(result[key]);
                        }
                    }
                })
            });
            $(document).on("change", '#course', function(e){
                var course = $('#course').val();
                $.ajax({
                    url: 'getSections.php',
                    type: 'POST',
                    data: {course: course}, 
                    dataType : "json",
                    success: function (result) {
                        $('#section').empty();
                        for (var key in result){
                            $('#section').append(result[key]);
                        }
                    }
                })
            });
        });
    </script>
</head>

<body>

    <form method='post' id='class' action="addToCart.php">
        <table style="width:100%">
            <tr>
                <th>Firstname</th>
                <th>Lastname</th> 
                <th>Age</th>
            </tr>
            <tr>
                <td>Jill</td>
                <td>Smith</td> 
                <td>50</td>
            </tr>
            <tr>
                <td>Eve</td>
                <td>Jackson</td> 
                <td>94</td>
            </tr>
        </table>
    </form>
    
</body>

</html>