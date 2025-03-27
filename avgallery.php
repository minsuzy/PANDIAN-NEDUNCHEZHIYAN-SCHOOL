<?php
include './adminheader.php';
if(isset($_GET['fid'])) {
    mysqli_query($link, "delete from gallery where id='$_GET[fid]'");
}
    $result1 = mysqli_query($link, "select * from gallery");
    echo "<table class='report_tab' style='min-width:60%;'><thead><tr><th colspan='3' class='center'>GALLERY<tr>";
    echo "<tr><th>Title<th>Image<th>Task<tbody>";
    while($row1 = mysqli_fetch_row($result1)) {
        echo "<tr><td>$row1[1]<td><img src='$row1[2]' width='50px' height='50px'><td><a href='avgallery.php?fid=$row1[0]' onclick=\"javascript:return confirm('Are You Sure to Delete ?')\">Delete</a>";
    }
    echo "</tbody></table>";
    mysqli_free_result($result1);
include './afooter.php';
?>