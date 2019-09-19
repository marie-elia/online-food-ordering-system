<!DOCTYPE html>

<html>

<head>


    <title> Delete Admin Record using jquery ajax</title>

    <!-- Latest compiled and minified CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</head>


<body>

<div class="container">

    <h3 class="text-center">PHP mysql confirmation box before delete record using jquery ajax</h3>

    <table class="table table-bordered">

        <tr>

            <th>Name</th>

            <th>Email</th>
            <th>User Type</th>

            <th width="100px">Action</th>

        </tr>


        <?php


        require('config.php');


        $sql = "SELECT * FROM usr where usertype=2";

        $users = $link->query($sql);


        while($user = $users->fetch_assoc()){


        ?>


            <tr id="<?php echo $user['id'] ?>">

                <td><?php echo $user['username'] ?></td>

                <td><?php echo $user['Email'] ?></td>
                <td><?php echo $user['Type'] ?></td>


                <td><button class="btn btn-danger btn-sm remove">Delete</button></td>

            </tr>


        <?php } ?>


    </table>

</div> <!-- container / end -->


</body>


<script type="text/javascript">

    $(".remove").click(function(){

        var id = $(this).parents("tr").attr("id");


        if(confirm('Are you sure to remove this record ?'))

        {

            $.ajax({

               url: 'http://localhost/PhpProject2/delete.php',

               type: 'GET',

               data: {id: id},

               error: function() {

                  alert('Something is wrong');

               },

               success: function(data) {

                    $("#"+id).remove();

                    alert("Record removed successfully");  

               }

            });

        }

    });


</script>

</html>