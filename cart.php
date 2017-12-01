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