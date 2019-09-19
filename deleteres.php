<!DOCTYPE html>

<html>

<head>


    <title>Delete staff record using jquery ajax</title>

    <!-- Latest compiled and minified CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</head>


<body>

<div class="container">

    <h3 class="text-center">PHP mysql confirmation box before delete record using jquery ajax</h3>

    <table class="table table-bordered">

        <tr>
  <th>Restaurant ID</th>
   <th>Restaurant Name</th>
 <th width="100px">Action</th>

        </tr>


        <?php


        require('config.php');


        $sql = "SELECT * FROM restaurant";

        $restaurants = $link->query($sql);


        while($restaurant = $restaurants->fetch_assoc()){


        ?>


            <tr id="<?php echo $restaurant['rId'] ?>">

                <td><?php echo $restaurant['rname'] ?></td>
                <td><button class="btn btn-danger btn-sm remove">Delete</button></td>

            </tr>


        <?php
 } ?>


    </table>

</div> <!-- container / end -->


</body>


<script type="text/javascript">

    $(".remove").click(function(){
        var rId = $(this).parents("tr").attr("id");
        console.log(rId);

        if(confirm('Are you sure to remove this record ?'))

        {

            $.ajax({

               url: '../PhpProject2/deleter.php',

               type: 'POST',

               data: {id: rId},

               error: function() {

                  alert('Something is wrong');

               },

               success: function(data) {

                    $("#"+rId).remove();

                    alert("Record removed successfully");  

               }

            });

        }

    });


</script>

</html>