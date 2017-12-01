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
            $('#results').hide();
            $(document).on("change", '#college', function(e){
                var college = $('#college').val();
                $.ajax({
                    url: 'getCourseTableEntries.php',
                    type: 'POST',
                    data: {college: college}, 
                    dataType : "json",
                    success: function (result) {
                        $('#results').empty();
                        // $('#department').empty();
                        // $('#course').empty();
                        // $('#section').empty();
                        for (var key in result){
                            $('#results').append(result[key]);
                        }
                        $('#results').show();
                    }
                }).done(function(){
                })
            });
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
            $(document).on("change", '#department', function(e){
                var college = $('#college').val();
                var department = $('#department').val();
                $.ajax({
                    url: 'getCourseTableEntries.php',
                    type: 'POST',
                    data: {college: college, department: department}, 
                    dataType : "json",
                    success: function (result) {
                        $('#results').empty();
                        // $('#department').empty();
                        // $('#course').empty();
                        // $('#section').empty();
                        for (var key in result){
                            $('#results').append(result[key]);
                        }
                        $('#results').show();
                    }
                }).done(function(){
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
    	<style>
		body {
			background-color: black;
			font-family: Georgia, 'Times New Roman', Times, serif;
			color: white;
		}
		select {
			background-color: white;
		}
		button {
			background-color: white;
			text-align: center;
			font-size: 15px;
		}
		table,
		td,
		th {
			border: 1px solid #ddd;
			text-align: left;
		}
		table {
			border-collapse: collapse;
			width: 100%;
		}
		.pageheader {
			text-align: center;
            
		}
        .pageheader a{
			text-decoration: none;
            color: white;
		}
		th,
		td {
			padding: 15px;
		}
		tr:hover {
			background-color: #f5f5f580;
			color: black;
		}
		td:hover {
			background-color: #ddda2393;
			color: black;
		}
		.btncancel {
  font: 15px Arial;
  text-decoration: none;
  background-color: white;
  color: #333333;
  padding: 2px 6px 2px 6px;
  border-top: 1px solid #CCCCCC;
  border-right: 1px solid #333333;
  border-bottom: 1px solid #333333;
  border-left: 1px solid #CCCCCC;
}
	</style>
</head>

<body>

    <form method='post' id='class' action="addToCart.php">
        <select name="college" form="class" id="college">
            <option value = ""></option>
            <?php
                $con = mysqli_connect('localhost', 'root', 'root', 'courseregistration');
                $query = "SELECT DISTINCT CName FROM college";
                $result = mysqli_query($con, $query);
                while($row = mysqli_fetch_assoc($result)){
                    echo "<option value ='" . $row['CName'] . "'>" . $row['CName'] . "</option>";
                }
                mysqli_close($con);
            ?>
        </select>
        <br>
        <br>
        <select name="department" form="class" id="department">
            <option value = ""></option>
        </select>
        <br>
        <br>
        <select name="course" form="class" id="course">
            <option value = ""></option>
        </select>
        <br>
        <br>
        <select name="section" form="class" id="section">
            <option value = ""></option>
        </select>
        <br>
        <br>
        <input type="submit" value="Add to cart" id="submit"/>
        <br>
        <br>
    </form>
    
    <table id='results'>
            <!-- <tr>
                <th>Department</th>
                <th>Course Number</th> 
                <th>Course Name</th>
                <th>Day</th>
                <th>Time</th>
                <th>Section Number</th>
            </tr> -->
    </table>
    <!-- <form method='post' id='class' action="addToCart.php">
        <table id='results'>
            <tr>
                <th>Department</th>
                <th>Course Number</th> 
                <th>Course Name</th>
                <th>Day</th>
                <th>Time</th>
                <th>Section Number</th>
            </tr>
        </table>
    </form> -->
</body>

</html>