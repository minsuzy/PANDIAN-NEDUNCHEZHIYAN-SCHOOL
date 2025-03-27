<?php
include './adminheader.php';
if (isset($_GET['datt'])) {
    mysqli_query($link, "delete from attend where classname='$_GET[datt]'");
}
if (!isset($_POST['sub1'])) {
    $result = mysqli_query($link, "select distinct tclass from student");
?>
    <form name="f" action="aviewattend1.php" method="post" style="margin:auto;padding-top: 30px;">
        <table class="center_tab">
            <thead>
                <tr>
                    <th colspan="2" class="center">VIEW ATTENDANCE</th>
                </tr>
            </thead>
            <tbody>	    
                <tr>
                    <th>Select Month</th>
                    <td><input type="month" name="mth" required></td>
                </tr>
                <tr>
                    <th>Select Standard</th>
                    <td>
                        <select name="classname">
                <?php
                while($row = mysqli_fetch_row($result)) {
                  echo "<option value='$row[0]'>$row[0]</option>";
                  }
                  mysqli_free_result($result);
                ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Section</th>
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
                        <input type="submit" name="sub1" value="Submit">		    
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
    <?php
} else if (isset($_POST['sub1'])) {
    extract($_POST);
    $classname=$_POST['classname'];
    $result = mysqli_query($link, "select distinct a.admno,sname from attend a,student n where n.emisno=a.admno and dt like '$mth%' and a.classname='$classname' and a.sec='$sec'");
    $res1 = mysqli_query($link, "select distinct dt from attend where dt like '$mth%' and classname='$classname' and sec='$sec'");
    $dta = array();
    while ($row1 = mysqli_fetch_row($res1)) {
        $dta[] = $row1[0];
    }
    mysqli_free_result($res1);
    echo "<div class='center' style='width:100%;'><a href='aviewattend1.php?datt=$classname' onclick=\"javascript:return confirm('Are you sure to Clear Attendance ?')\">Reset Attendance</a></div>";
    echo "<div style='width:95%;overflow:scroll;margin:auto;height:400px;'><table class='report_tab' style='background-color:white;min-width:70%;'><thead><tr><th colspan='" . (count($dta) + 1) . "' class='center'>ATTENDANCE REPORT FOR - Class : $classname<tr><th>Name";
    foreach ($dta as $d) {
        echo "<th>$d";
    }
    echo "<tbody>";
    while ($row = mysqli_fetch_row($result)) {
        echo "<tr><td style='border:solid thin;'>$row[1]";
        foreach ($dta as $d) {
            $res1 = mysqli_query($link, "select att,tuserid from attend where dt='$d' and admno='$row[0]'");
            $r1 = mysqli_fetch_row($res1);
            if ($r1[0] == "present")
                //echo "<td style='border:solid thin;'>P<br>[$r1[1]]";
                echo "<td style='border:solid thin;'>P";
            else if ($r1[0] == "absent")
                echo "<td style='background:rgba(200,0,0,0.8);border:solid thin;'>A";
            else
                echo "<td style='background:rgba(255,255,0,1);border:solid thin;'>H";
            mysqli_free_result($res1);
        }
    }
    echo "</tbody></table></div>";
    mysqli_free_result($result);
}
include './afooter.php';
?>