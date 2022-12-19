<?php
include 'header.php';
?>
<div id="main-content">
    <h2>All Records</h2>
    <?php
    //Connection eshtablised with database
    $conn = mysqli_connect("localhost","root","","crud") or die("Connection Failed");
    //Run SQl Query
    $sql = "SELECT * FROM student JOIN studentclass WHERE student.sclass=studentclass.cid";
    $result=mysqli_query($conn,$sql) or die("Query Unsuccessful");
    if(mysqli_num_rows($result)>0){
    ?>
    <table cellpadding="7px">
        <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Class</th>
        <th>Phone</th>
        <th>Action</th>
        </thead>
        <tbody>
            <?php $i=1; while($row=mysqli_fetch_assoc($result)){
                 ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row['sname']; ?></td>
                <td><?php echo $row['saddress']; ?></td>
                <td><?php echo $row['cname']; ?></td>
                <td><?php echo $row['sphone']; ?></td>
                <td>
                    <a href='edit.php?id=<?php echo $row['sid']; ?>'>Edit</a>
                    <a href='delete-inline.php'>Delete</a>
                </td>
            </tr>
            <?php } ?>
            
        </tbody>
    </table>
    <?php }else{
        echo "<h2>No records found.</h2>";
        mysqli_close($conn);
    } ?>
</div>
</div>
</body>
</html>

