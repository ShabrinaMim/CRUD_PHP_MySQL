<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Update Teachers Record</h2>
    <form class="post-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="showbtn" value="Show" />
    </form>
    <?php
    if (isset($_POST['showbtn'])) {
        $connection  = mysqli_connect("localhost", "root", "", "teacherdatabase") or die("Connection Failed");
        $deptId = $_POST['sid'];
        $sqlQuery = "SELECT * FROM teachers WHERE ID = {$deptId}";
        $result = mysqli_query($connection, $sqlQuery) or die("Query Failed");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
    ?>
                <form class = "post-form" action = "updatedata.php" method = "post">
                    <div class = "form-group">
                        <label for = "">Teacher Name</label>
                        <input type = "hidden" name = "tid" value ="<?php echo $row['ID']; ?>" />
                        <input type = "text" name = "tname" value ="<?php echo $row['Name']; ?>" />
                    </div>
                    <div class = "form-group">
                        <label>Address</label>
                        <input type="text" name="taddress" value="<?php echo $row['Address']; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Department Name</label>
                        <?php
                        $sqlQuery1 = "SELECT * FROM depatments";
                        $result1 = mysqli_query($connection, $sqlQuery1) or die("Query Failed");
                        if (mysqli_num_rows($result1) > 0) {
                            echo '<select name = "tdeptid">';
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                if ($row['DepartmentID'] == $row1['DeptID']) {
                                    $select = "selected";
                                } else {
                                    $select = "";
                                }
                                echo "<option {$select} value = '{$row['DepartmentID']}'>{$row1['DeptName']}</option>";
                            }
                            echo  '</select>';
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type = "text" name = "tphone" value = "<?php echo $row['Phone']; ?>" />
                    </div>
                    <input class = "submit" type = "submit" value = "Update" />
                </form>
    <?php
            }
        }
    }
    ?>
</div>
</div>
</body>

</html>