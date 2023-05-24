<?php
include "../check-if-loggdin.php";
?>

<div class="card-wrapper">
    <h2>Delet user:</h2>
    <form action="user-removed.php" class="remove-form" method="post" enctype="multipart/form-data">
        <select name="id" id="status">
            <?php
            //Ta bort användar
                include "../server-connect.php";
                $admins = "SELECT * from  account WHERE account_activit_status = 'true'";
                $result = $con->query($admins);

                if (mysqli_num_rows($result) > 0) {
                    while ($obj = mysqli_fetch_assoc($result)) {

                        $id = $obj['id'];
                        $username = $obj['username'];
                        $acces_level = $obj['acces_level'];
                
                        $uppload = [$id => [$username, $acces_level]];

                        foreach ($uppload as $id => [$username, $acces_level]) {
                            echo " <option value='$id'>$username</option>";
                        }
                    }
                }
                $con->close();
            ?>
        </select>
        <input name="remove-submit" type="submit" value="Submit">
    </form>
</div>
