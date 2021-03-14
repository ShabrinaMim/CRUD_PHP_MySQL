<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Add New Teacher Record</h2>
    <form class="post-form" action="savedata.php" method="post">
        <div class="form-group">
            <label>Teacher Name</label>
            <input type="text" name="sname" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" />
        </div>
        <div class="form-group">
            <label>Department Name</label>
            <select name = "sdeptid">
                <option value = "" selected disabled>Select Class</option>
                <?php
                $connection  = mysqli_connect("localhost", "root", "", "teacherdatabase") or die("Connection Failed");
                $sqlQuery = "SELECT * FROM depatments";
                $result = mysqli_query($connection, $sqlQuery) or die("Query Failed");
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <option value = "<?php echo $row['DeptID']; ?>"><?php echo $row['DeptName']; ?></option>

                <?php }

                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" />
        </div>
        <input class="submit" type="submit" value="Save" />
    </form>
</div>
</div>
</body>

</html>