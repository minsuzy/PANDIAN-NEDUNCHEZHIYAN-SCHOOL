<?php
include './adminheader.php';
if(!isset($_POST['sub1']) && !isset($_POST['sub2'])) {
    $result = mysqli_query($link, "select distinct tclass from student");
?>
<div class="right" style="display: block;width:100%;">
    <!--a href="aviewattend1.php">View Attendance</a-->
</div>
<form name="f" action="aattendance.php" method="post" style="margin:auto;padding-top: 30px;">
        <table class="center_tab">
            <thead>
                <tr>
                    <th colspan="2" class="center">ATTENDANCE</th>
                </tr>
            </thead>
            <tbody>	    
                <tr>
                    <th>Date</th>
                    <td><input type="date" name="dt" required></td>
                </tr>
                <tr>
                    <th>Select Standard</th>
                    <td>
                        <select name="classname">
                            <?php
                            while ($row = mysqli_fetch_row($result)) {
                                echo "<option value='$row[0]'>$row[0]</option>";
                            }
                            mysqli_free_result($result);
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Select Section</th>
                    <td>
                        <select name="sec">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" class="center">
                        <input type="submit" name="sub1" value="Submit"><br>
                        <a href="aviewattend1.php">View Attendance</a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
<?php
} else if(isset($_POST['sub1'])) {
    extract($_POST);
    $result = mysqli_query($link, "select emisno,sname from student where tclass='$classname' and sec='$sec'");
    echo "<form name='f' action='aattendance.php' method='post' style='margin:auto;'><table class='center_tab' style='width:400px;'><thead><tr><th class='center'>Name<th class='center'>Attendance<tbody>";
    while($row = mysqli_fetch_row($result)) {
        echo "<tr>";
        echo "<td>$row[1]<td><select name='a[]'><option value='present'>Present</option><option value='absent'>Absent</option><!--option value='half'>Half Day</option--></select>";
    }
    echo "<tr><td colspan='2' class='center'><input type='submit' name='sub2' value='Go'><input type='hidden' name='dt' value='$dt'><input type='hidden' name='classname' value='$classname'><input type='hidden' name='sec' value='$sec'>";
    echo "</tbody></table></form>";
    mysqli_free_result($result);
} else {
    extract($_POST);    
    $result = mysqli_query($link, "select emisno,sname from student where tclass='$classname' and sec='$sec'");
    $regnno = array();
    while($row = mysqli_fetch_row($result)) {
        $regnno[] = $row[0];
    }
    mysqli_free_result($result);
    foreach($regnno as $k=>$s) {
        $b = mysqli_query($link, "insert into attend(dt,classname,admno,att,tuserid,sec) values('$dt','$classname','$s','$a[$k]','$_SESSION[adminuserid]','$sec')");
    }
    if($b)
    echo "<div class='center' style='text-align:center;width:100%;'>Attendance Stored...!<br><a href='aattendance.php'>Back</a></div>";
    else
        echo "<div class='center' style='text-align:center;width:100%;'>Attendance Already Stored...!<br><a href='aattendance.php'>Back</a></div>";
}
include './afooter.php';
?>