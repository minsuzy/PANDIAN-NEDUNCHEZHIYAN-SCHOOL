<?php
include './adminheader.php';
if(isset($_GET['fid'])) {
    mysqli_query($link, "delete from smsg where id='$_GET[fid]'");
}
    $result1 = mysqli_query($link, "select * from smsg");
    echo "<table class='report_tab' style='min-width:70%;'><thead><tr><th colspan='2' class='center'>SCROLLING MESSAGES<tr>";
    echo "<tr><th>Message<th>Task<tbody>";
    while($row1 = mysqli_fetch_row($result1)) {
        echo "<tr><td>$row1[1]<td><a href='avmsg.php?fid=$row1[0]' onclick=\"javascript:return confirm('Are You Sure to Delete ?')\">Delete</a>";
    }
    echo "</tbody></table>";
    mysqli_free_result($result1);
include './afooter.php';
?>