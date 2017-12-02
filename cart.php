<?php
session_start()
?>

<!DOCTYPE html>
<html>

<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
    </script> 
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <script>
        $(document).ready(function(){
            var userID = <?php echo $_SESSION['user']['SID'];?>;
            $.ajax({
                async: false,
                url: 'getCartEntries.php',
                type: 'POST',
                data: {userID: userID},
                dataType: 'json',
                success: function(result) {
                    $('#results').empty();
                    for (var key in result){
                        $('#results').append(result[key]);
                    }
                }

            });
            $(document).on("click", ".remove", function(e){
                var primarykeyValue1 = $(this).attr('id');
                var primekey1 = 'SecId';
                var primarykeyValue2 = userID;
                var primekey2 = 'SID';
                var tablechoice = 'cart';
  $.ajax({
                    async: false,
                    url: 'deleteEntry.php',
                    type: 'GET',
                    data: {primarykeyValue1: primarykeyValue1, primekey1:primekey1, primarykeyValue2:primarykeyValue2, primekey2:primekey2, tablechoice:tablechoice},
                    dataType: 'text',
                    success: function(result) {
                        alert(result);
                        location.reload();
                        // trelement.parent.parent.remove(trelement.selectedIndex);
                    }

                });
            });
            $(document).on("click", "#enroll", function(e){
               var rowCount = $('#results tr').length - 1;
               if(rowCount <= 0 || rowCount > 3){
                    alert("You can only enroll in up to 3 classes")
               } else {
                //    $('#results').each(function(i, row) {

                //    })
                    var sectionIDS = [];
                    $(".remove").each(function(){
                        sectionIDS.push($(this).attr('id'));
                    });
                   $.ajax({
                        type: 'POST',
                        data: {userID: userID, sectionIDS: sectionIDS},
                        url: 'enroll.php',
                        success: function(result) {
                            alert(result);
                        }
                   });
               }
               
            })
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

.btncancel {
  font: 20px Arial;
  text-decoration: none;
  background-color:blue;
  color: white;
  padding: 2px 12px 2px 12px;
  border-top: 1px solid #CCCCCC;
  border-right: 1px solid #333333;
  border-bottom: 1px solid #333333;
  border-left: 1px solid #CCCCCC;
}
.btncancel:hover {
  font: 20px Arial;
  text-decoration: none;
  background-color:#ADD8E6;
  color: white;
  padding: 2px 12px 2px 12px;
  border-top: 1px solid #CCCCCC;
  border-right: 1px solid #333333;
  border-bottom: 1px solid #333333;
  border-left: 1px solid #CCCCCC;
}
    </style>
</head>

<body>

    <table id='results'>
    </table>
    <br/>
    <div>
    <button class="btn btn-primary" id='enroll'>Enroll</button>
    </div>
    <br/>
    <div>
    <a class="btn btn-primary" href='enrollment.php'>Search for Classes</a>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</body>

</html>