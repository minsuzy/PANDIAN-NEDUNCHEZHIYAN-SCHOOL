<?php
include './adminheader.php';
if(isset($_GET['fid'])) {
    mysqli_query($link, "delete from sachievements where id='$_GET[fid]'");
}
    $result1 = mysqli_query($link, "select * from sachievements");
    echo "<table class='report_tab' style='min-width:70%;'><thead><tr><th colspan='4' class='center'>ACHIEVEMENTS<tr>";
    echo "<tr><th>Title<th>Sub Title<th>Image<th>Task<tbody>";
    while($row1 = mysqli_fetch_row($result1)) {
        echo "<tr><td>$row1[1]<td>$row1[2]<td><img src='$row1[4]' width='50px'><td><a href='avachieve.php?fid=$row1[0]' onclick=\"javascript:return confirm('Are You Sure to Delete ?')\">Delete</a>";
    }
    echo "</tbody></table>";
    mysqli_free_result($result1);
include './afooter.php';
?>