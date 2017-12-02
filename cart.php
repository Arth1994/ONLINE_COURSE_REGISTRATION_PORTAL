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
                // var trelement = document.getElementbyId(primarykeyValue1);
                $.ajax({
                    async: false,
                    url: 'deleteEntry.php',
                    type: 'GET',
                    data: {primarykeyValue1: primarykeyValue1, primekey1:primekey1, primarykeyValue2:primarykeyValue2, primekey2:primekey2, tablechoice:tablechoice},
                    dataType: 'text',
                    success: function(result) {
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
</head>

<body>

    <table id='results'>
    </table>
    <br>
    <button id='enroll'>Enroll</button>
    <a href='cart.php'>Cart</a>
</body>

</html>