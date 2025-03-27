<?php
include './adminheader.php';
if(!isset($_POST['sub']) && !isset($_POST['sub1'])) {
    $result = mysqli_query($link, "select distinct tclass from student");
?>
<div class="right" style="display: block;width:100%;">
    <!--a href="avmarks.php">View Marks</a-->&nbsp;
</div>
<form name="f" action="amark.php" method="post" style="margin:auto;">
        <table class="center_tab">
            <thead>
                <tr>
                    <th colspan="2" class="center">MARK ENTRY</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Select Class</th>
                    <td>
                        <select name="tclass">
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
                        <input type="submit" name="sub" value="Submit"><br>
                        <a href="avmarks.php">View Marks</a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
<?php
} else if(isset($_POST['sub'])) {
    extract($_POST);
    $result = mysqli_query($link, "select emisno,sname from student where tclass='$tclass' and sec='$sec'");
?>
<form name="f" action="amark.php" method="post" style="margin:auto;" onsubmit="return check()">
        <table class="center_tab">
            <thead>
                <tr>
                    <th colspan="2" class="center">MARK ENTRY</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Select Admission No</th>
                    <td>
                        <select name="admno">
                            <?php
                            while ($row = mysqli_fetch_row($result)) {
                                echo "<option value='$row[0]'>$row[0] - $row[1]</option>";
                            }
                            mysqli_free_result($result);
                            ?>
                        </select><input type="hidden" name="tclass" value="<?php echo $tclass;?>">
                        <input type="hidden" name="sec" value="<?php echo $sec;?>">
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
                <tr>
                    <th>Tamil</th>
                    <td><input type="text" name="tam" required pattern="\d+" autofocus></td>
                </tr>
                <tr>
                    <th>English</th>
                    <td><input type="text" name="eng" required pattern="\d+"></td>
                </tr>
                <tr>
                    <th>Maths/Accounts</th>
                    <td><input type="text" name="math" required pattern="\d+"></td>
                </tr>
                <tr>
                    <th>Science/Commerce</th>
                    <td><input type="text" name="sci" required pattern="\d+"></td>
                </tr>
                <tr>
                    <th>Social/Vocational</th>
                    <td><input type="text" name="soc" required pattern="\d+"></td>
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
    $b = mysqli_query($link, "insert into marks(tclass,admno,term,tam,eng,math,sci,soc,userid,sec) values('$tclass','$admno','$term','$tam','$eng','$math','$sci','$soc','$_SESSION[adminuserid]','$sec')");
    if($b)
    echo "<div class='center' style='text-align:center;'>Mark Stored...!<br><a href='amark.php'>Back</a></div>";
    else
        echo "<div class='center' style='text-align:center;'>Mark Already Stored for this Term...!<br><a href='amark.php'>Back</a></div>";
}
include './afooter.php';
?>
<script>
    function check() {
        m1 = parseInt(f.tam.value)
        m2 = parseInt(f.eng.value)
        m3 = parseInt(f.math.value)
        m4 = parseInt(f.sci.value)
        m5 = parseInt(f.soc.value)
        
        if(m1>100 || m2>100 || m3>100 || m4>100 || m5>100) {
            alert("Invalid Subject Mark")
            return false
        }
        return true
    }
</script>