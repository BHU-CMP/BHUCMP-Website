<body style="background-size: contain; background-color: #37474f;">
<?php include "header.php"; ?>


<div class="clearfix"></div>

<div class="active">
    <div class="container-fluid glyphicon-align-center" style="margin-top:80px;">
        <?php
        $query = "SELECT * FROM login WHERE matno='{$_SESSION['user']}'";
        $result_array = mysqli_fetch_assoc(mysqli_query($conn, $query));
        $actual_image_name = $result_array['image'];
        $actual_first_name = $result_array['fname'];
        $actual_last_name = $result_array['lname'];
        $actual_user_matno = $result_array['matno'];
        $actual_user_mail = $result_array['email'];
        $actual_user_status = $result_array['status'];
        $actual_user_gender = $result_array['gender'];
        ?>

        <div class=" img-responsive ">
                <img class="img-rounded" width="200" height="200" src="../image/<?php echo $actual_image_name; ?>">
                <p><?php echo $actual_first_name; ?> <span><?php echo $actual_last_name; ?></span></p>
                <p></p>

        </div>
        <table class="table table-bordered table-responsive">

            <tr>
                <td><label class="control-label">Matric Number</label></td>
                <td class="size"><?php echo $actual_user_matno ?></td>
            </tr>

            <tr>
                <td><label class="control-label">Email.</label></td>
                <td class="size"><?php echo $actual_user_mail ?></td>
            </tr>

            <tr>
                <td><label class="control-label">Status</label></td>
                <td class="size"><?php echo $actual_user_status ?></td>
            </tr>

            <tr>
                <td><label class="control-label">First Name.</label></td>
                <td class="size"><?php echo $actual_first_name ?></td>
            </tr>

            <tr>
                <td><label class="control-label">Last Name.</label></td>
                <td class="size"><?php echo $actual_last_name ?></td>
            </tr>

            <tr>
                <td><label class="control-label">Gender.</label></td>
                <td class="size"><?php echo $actual_user_gender ?></td>
            </tr>
        </table>
    </div>
</div>


<script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
?>