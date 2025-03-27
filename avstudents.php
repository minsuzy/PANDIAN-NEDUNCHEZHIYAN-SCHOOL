<?php
include './adminheader.php';
if(isset($_GET['admno'])) {
    mysqli_query($link, "delete from student where emisno='$_GET[admno]'");
}
$result = mysqli_query($link, "select emisno,sname,father,mother,dob,tclass,sec,gender from student") or die(mysqli_error($link));
    echo "<table class='report_tab' style='min-width:60%;'><thead><tr><th colspan='11' class='center'>REGISTERED STUDENTS LIST";
    echo "<tr><th>EMIS No<th>Name<th>Father<th>Mother<th>DOB<th>Class<th>Section<th>Gender<th>Task<tbody>";
        while($row = mysqli_fetch_row($result)) {
            echo "<tr>";
            echo "<td>$row[0]<td>$row[1]<td>$row[2]<td>$row[3]<td>$row[4]<td>$row[5]<td>$row[6]<td>$row[7]";
            echo "<td><a href='avstudents.php?admno=$row[0]' onclick=\"javascript:return confirm('Are You Sure to Delete ?')\">Delete</a>";
        }
    echo "</table>";
mysqli_free_result($result);
include './afooter.php';
?>