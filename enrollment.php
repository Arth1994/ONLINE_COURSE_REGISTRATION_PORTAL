<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
  	</script> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <script>
        
        $(document).ready(function(){
            $('#results').hide();
            $(document).on("keyup", '#txtsearch', function(e){
                
                
                var txtsearch = $('#txtsearch').val();
                if(txtsearch == '')
                {
                    $('#nav').remove();
                    $('#results').hide();
                }
                else{
                    $.ajax({
                    async:false,
                    url: 'getCourseTableEntries.php',
                    type: 'POST',
                    data: {txtsearch: txtsearch}, 
                    dataType : "json",
                    success: function (result) {
                        $('#results').empty();
                        // $('#department').empty();
                        // $('#course').empty();
                        // $('#section').empty();
                        for (var key in result){
                            $('#results').append(result[key]);
                        }
                        paginate();
                        $('#results').show();
                    }
                });
                }
                
                
            });
            $(document).on("change", '#college', function(e){
                var college = $('#college').val();
                $.ajax({
                    async:false,
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
                        paginate();
                        $('#results').show();
                    }
                }).done(function(){
                })
            });
            $(document).on("change", '#college', function(e){
                var college = $('#college').val();
                $.ajax({
                    async:false,
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
                    async:false,
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
                    async:false,
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
                        paginate();
                        $('#results').show();
                    }
                }).done(function(){
                })
            });
            $(document).on("change", '#course', function(e){
                var course = $('#course').val();
                $.ajax({
                    async:false,
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
                });
            });
            $(document).on("click", '.add', function(e){
                var sectionID = $(this).attr('id');
                var userID = <?php echo $_SESSION['user']['SID']; ?>; 
                $.ajax({
                    async: false,
                    url: 'addToCart.php',
                    type: 'POST',
                    data: {sectionID: sectionID, userID: userID},
                    success: function (result){
                        if (result == "Added" || result == "Section is Full"){
                            alert(result);
                        } else {
                            alert("This course is already in your cart");
                        }
                    },
                    error: function(e){
                        alert(e.responseText);
                    }
                });
            });


            function paginate(){
                $('#nav').remove();
	                $("#results").after('<div id="nav"></div>');
                    var table = document.getElementById("results");
					var numrows = table.getElementsByTagName("tr").length;

                    var rowsShown = 6;
                    var rowsTotal = numrows;

                   
                    var classrows = table.getElementsByTagName("tr");
                    
                    var numPages = rowsTotal/rowsShown;
                    for(i = 0;i < numPages;i++) {
                        var pageNum = i + 1;
                        $('#nav').append('<a href="#" rel="'+i+'">'+pageNum+'</a> ');
                    }
                    $(classrows).hide();
                    $(classrows).slice(0, rowsShown).show();
                    $('#nav a:first').addClass('active');
                    $('#nav a').bind('click', function(){

                        $('#nav a').removeClass('active');
                        $(this).addClass('active');
                        var currPage = $(this).attr('rel');
                        var startItem = currPage * rowsShown;
                        var endItem = startItem + rowsShown;
                        $(classrows).css('opacity','0.0').hide().slice(startItem, endItem).css('display','table-row').animate({opacity:1}, 300);
                    });

                }
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
        .form-inline .form-group {
  margin-right:8px;
}


	</style>
</head>

<body>

<h2 class="pageheader">Enrollment Page</h2>


    <form method='post' id='form' class="form-group" action="addToCart.php">
        
            
            <div >
                Search for Course: <input class="form-control" type="text" id="txtsearch"></input>
            </div>
        <br/>
        <div class="form-inline">
        <div class="form-group">
        <label for="college"> College:</label>
        <select name="college" class="form-control" id="college">
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
        </div>
        
        <div class="form-group">
        <label for="department">Department:</label>
        
        <select name="department" class="form-control" id="department">
            <option value = ""></option>
        </select>
        </div>
        <div class="form-group">
        <label for="course">Course:</label> 
        <select name="course" class="form-control" id="course">
            <option value = ""></option>
        </select>
        </div>
        <div class="form-group">
        <label for="section">Section:</label> 
        <select name="section" class="form-control" id="section">
            <option value = ""></option>
        </select>
        </div>
            </div> 
        <br/>
        <input type="submit" class="btn btn-primary" value="Add to cart" id="submit"/>
        
    </form>
    
    
    <table id='results'>
    </table>

    <a href='cart.php'>Cart</a>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</body>

</html>