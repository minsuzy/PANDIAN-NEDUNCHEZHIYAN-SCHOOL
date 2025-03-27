<?php
include './adminheader.php';
if (isset($_GET['did'])) {
    mysqli_query($link, "delete from marks where id='$_GET[did]'");
}
if(!isset($_POST['sub1'])) {
    //$result = mysqli_query($link, "select distinct classname from regn");
?>
    <form name="f" action="avmarks.php" method="post" style="margin:auto;padding-top: 30px;">
        <table class="center_tab">
            <thead>
                <tr>
                    <th colspan="2" class="center">VIEW MARKS</th>
                </tr>
            </thead>
            <tbody>	    
                <tr>
                    <th>Select Class</th>
                    <td>
                        <select name="tclass">
                        <!-- <option value="I">I</option>
                        <option value="II">II</option>
                        <option value="III">III</option>
                        <option value="IV">IV</option>
                        <option value="V">V</option> -->
                        <option value="VI">VI</option>
                        <option value="VII">VII</option>
                        <option value="VIII">VIII</option>
                        <option value="IX">IX</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
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
                <tr>
                    <th>Select Term</th>
                    <td>
                        <select name="term">
                            <option value="Term1">Term1</option>
                            <option value="Term2">Term2</option>
                            <option value="Term3">Term3</option>
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
} else if(isset($_POST['sub1'])) {
    extract($_POST);
    $result = mysqli_query($link, "select m.id,m.admno,sname,m.term,tam,eng,math,sci,soc,userid from marks m,student s where m.admno=s.emisno and m.term='$term' and m.tclass='$tclass' and m.sec='$sec'");
    echo "<div class='center' style='width:100%;'><a href='avmarks.php'>Back</a></div>";
    echo "<div style='width:95%;overflow:scroll;margin:auto;height:400px;'><table class='report_tab' style='background-color:white;min-width:70%;'><thead><tr><th colspan='11' class='center'>STUDENT MARK LIST<tr><th>AdmNo<th>Name<th>Term<th>Tamil<th>English<th>Math<th>Science<th>Social<th>Total<th>Teacher<th>Task<tbody>";
    while ($row = mysqli_fetch_row($result)) {
        echo "<tr><td>$row[1]<td>$row[2]<td>$row[3]<td>$row[4]<td>$row[5]<td>$row[6]<td>$row[7]<td>$row[8]<td>".($row[4]+$row[5]+$row[6]+$row[7]+$row[8])."<td>$row[9]<td><a href='editmark1.php?mid=$row[0]'>Edit</a> | <a href='avmarks.php?did=$row[0]' >Delete</a>";
    }
    echo "</tbody></table></div>";
    mysqli_free_result($result);
}
include './afooter.php';
?>