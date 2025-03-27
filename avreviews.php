<?php
include './adminheader.php';
if(isset($_GET['fid'])) {
    mysqli_query($link, "delete from umsgs where id='$_GET[fid]'");
}
    $result1 = mysqli_query($link, "select * from umsgs");
    echo "<table class='report_tab' style='min-width:70%;'><thead><tr><th colspan='5' class='center'>USER REVIEW MESSAGES<tr>";
    echo "<tr><th>Date<th>Name<th>EMail<th>Message<th>Task<tbody>";
    while($row1 = mysqli_fetch_row($result1)) {
        echo "<tr><td>$row1[1]<td>$row1[2]<td>$row1[3]<td>$row1[4]<td><a href='avreviews.php?fid=$row1[0]' onclick=\"javascript:return confirm('Are You Sure to Delete ?')\">Delete</a>";
    }
    echo "</tbody></table>";
    mysqli_free_result($result1);
include './afooter.php';
?>