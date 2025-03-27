<?php
include './adminheader.php';
if(!isset($_POST['sub1'])) {
    $result = mysqli_query($link, "select * from marks where id='$_GET[mid]'");
    $row = mysqli_fetch_row($result);
    mysqli_free_result($result);
    $ta = array("Term1","Term2","Term3");
?>
<div class="right" style="display: block;width:100%;">
    <a href="avmarks.php">View Marks</a>
</div>
<form name="f" action="editmark1.php" method="post" style="margin:auto;" onsubmit="return check()">
        <table class="center_tab">
            <thead>
                <tr>
                    <th colspan="2" class="center">EDIT MARK ENTRY</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Admission No</th>
                    <td><input type="text" name="admno" value="<?php echo $row[2];?>" readonly required><input type="hidden" name="mid" value="<?php echo $_GET['mid'];?>"></td>
                </tr>
                <tr>
                    <th>Select Term</th>
                    <td>
                        <select name="term">
                            <?php
                            foreach($ta as $taa) {
                                if(strcasecmp($taa, $row[3])==0)
                                    echo "<option value='$taa' selected>$taa</option>";
                                else
                                    echo "<option value='$taa'>$taa</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Tamil</th>
                    <td><input type="text" name="tam" required pattern="\d+" autofocus value="<?php echo $row[4];?>"></td>
                </tr>
                <tr>
                    <th>English</th>
                    <td><input type="text" name="eng" required pattern="\d+" value="<?php echo $row[5];?>"></td>
                </tr>
                <tr>
                    <th>Maths</th>
                    <td><input type="text" name="math" required pattern="\d+" value="<?php echo $row[6];?>"></td>
                </tr>
                <tr>
                    <th>Science</th>
                    <td><input type="text" name="sci" required pattern="\d+" value="<?php echo $row[7];?>"></td>
                </tr>
                <tr>
                    <th>Social</th>
                    <td><input type="text" name="soc" required pattern="\d+" value="<?php echo $row[8];?>"></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" class="center">
                        <input type="submit" name="sub1" value="Update">		    
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
<?php
} else if(isset($_POST['sub1'])) {
    extract($_POST);
    $b = mysqli_query($link, "update marks set term='$term',tam='$tam',eng='$eng',math='$math',sci='$sci',soc='$soc' where id='$mid'");
    if($b)
    echo "<div class='center' style='width:100%;text-align:center;'>Mark Updated...!<br><a href='avmarks.php'>Back</a></div>";
    else
        echo "<div class='center' style='text-align:center;'>Mark Already Stored for this Term...!<br><a href='avmarks.php'>Back</a></div>";
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