<?php
include 'header.php';
?>
<div id = "main-content">
    <h2>All Teachers Records</h2>
    <?php
    $connection = mysqli_connect("localhost", "root", "", "teacherdatabase") or die("Connection Failed");
    $sqlQuery = "SELECT * FROM teachers JOIN depatments WHERE teachers.DepartmentID = depatments.DeptID";
    $result = mysqli_query($connection, $sqlQuery) or die("Query Failed");
    if (mysqli_num_rows($result) > 0) {
    ?>

        <table cellpadding = "7px">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Department Name</th>
                <th>Phone</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['ID']; ?></td>
                        <td><?php echo $row['Name']; ?></td>
                        <td><?php echo $row['Address']; ?></td>
                        <td><?php echo $row['DeptName']; ?></td>
                        <td><?php echo $row['Phone']; ?></td>
                        <td>
                            <a href = "edit.php?IDNo=<?php echo $row['ID']; ?>">Edit</a>
                            <a href = 'delete-inline.php'>Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else {
        echo "<h1>No Record Found</h1>";
    }
    mysqli_close($connection);
    ?>
</div>
</div>
</body>
</html>