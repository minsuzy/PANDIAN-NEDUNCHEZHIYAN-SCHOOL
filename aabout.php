<?php
include './adminheader.php';
$result = mysqli_query($link, "select * from timingrules");
$row = mysqli_fetch_row($result);
$timingrule = $row[0];
mysqli_free_result($result);
?>
<form name="f1" action="aabout.php" method="post" enctype="multipart/form-data" style="margin:auto;padding-top: 30px;"">
    <table class="center_tab">
        <thead>
            <tr>
                <th colspan="2" class="center">TEACHER INFO</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Teacher Name</th>
                <td><input type="text" name="tname" required size="50" autofocus pattern="[a-zA-Z .]+"></td>
            </tr>
            <tr>
                <th>Photo</th>            
                <td><input type="file" name="ff1" accept="image/*" required></td>
            </tr>
            <tr>
                <th colspan="2" style="text-align:left;">Teacher Info</th>
            </tr>
            <tr>
                <td colspan="2"><textarea name="tinfo" required cols="100" rows="4"></textarea></td>
            </tr>	    
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" class="center">
                    <input type="submit" name="sub1" value="Submit"><br>
                    <a href="avteachers.php">View Teachers</a>
                </td>
            </tr>
        </tfoot>
    </table>
</form>
<hr style="display:block;width:100%;">

<form name="f2" action="aabout.php" method="post" enctype="multipart/form-data" style="margin:auto;">
    <table class="center_tab">
        <thead>
            <tr>
                <th colspan="2" class="center">STUDENTS ACHIEVEMENTS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Title</th>
                <td><input type="text" name="sname" required size="50" pattern="[a-zA-Z .]+"></td>
            </tr>
            <tr>
                <th>Sub Title</th>
                <td><input type="text" name="std" required></td>
            </tr>
            <tr>
                <th>Photo</th>            
                <td><input type="file" name="ff2" accept="image/*" required></td>
            </tr>
            <tr>
                <th colspan="2" style="text-align:left;">Achievement Info</th>
            </tr>
            <tr>
                <td colspan="2"><textarea name="ainfo" required cols="100" rows="4"></textarea></td>
            </tr>	    
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" class="center">
                    <input type="submit" name="sub2" value="Submit"><br>
                    <a href="avachieve.php">View Achievements</a>
                </td>
            </tr>
        </tfoot>
    </table>
</form>
<hr style="display:block;width:100%;">

<form name="f3" action="aabout.php" method="post" style="margin:auto;">
    <table class="center_tab">
        <thead>
            <tr>
                <th colspan="2" class="center">TIMINGS & RULES</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th colspan="2" style="text-align:left;">Content</th>
            </tr>
            <tr>
                <td colspan="2"><textarea name="timingrule" required cols="150" rows="10"><?php echo $timingrule;?></textarea></td>
            </tr>	    
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" class="center">
                    <input type="submit" name="sub3" value="Submit">		    
                </td>
            </tr>
        </tfoot>
    </table>
</form>
<?php
if(isset($_POST['sub1'])) {
    extract($_POST);
    $tinfo = addslashes($tinfo);
    $tname = addslashes($tname);
    if(is_uploaded_file($_FILES['ff1']['tmp_name'])) {
        $fname = "uploads/".time().$_FILES['ff1']['name'];
        move_uploaded_file($_FILES['ff1']['tmp_name'], $fname) or die("<div class='center'>File Not Uploaded..!<br><a href='aabout.php'>Back</a></div>");        
    mysqli_query($link, "insert into teachers(tname,tinfo,fname) values('$tname','$tinfo','$fname')") or die(mysqli_error($link));
    echo "<div class='center' style='text-align:center;width:100%;'>Teacher Info Stored...!<br><a href='aabout.php'>Back</a></div>";
    } else {
        echo "<div class='center'>Image Not Uploaded...!<br><a href='aabout.php'>Back</a></div>";
    }
}

if(isset($_POST['sub2'])) {
    extract($_POST);
    $ainfo = addslashes($ainfo);
    $sname = addslashes($sname);
    if(is_uploaded_file($_FILES['ff2']['tmp_name'])) {
        $fname = "uploads/".time().$_FILES['ff2']['name'];
        move_uploaded_file($_FILES['ff2']['tmp_name'], $fname) or die("<div class='center'>File Not Uploaded..!<br><a href='aabout.php'>Back</a></div>");        
    mysqli_query($link, "insert into sachievements(sname,std,ainfo,fname) values('$sname','$std','$ainfo','$fname')") or die(mysqli_error($link));
    echo "<div class='center' style='text-align:center;width:100%;'>Student Achievement Info Stored...!<br><a href='aabout.php'>Back</a></div>";
    } else {
        echo "<div class='center'>Image Not Uploaded...!<br><a href='aabout.php'>Back</a></div>";
    }
}

if(isset($_POST['sub3'])) {
    extract($_POST);
    $timingrule = addslashes($timingrule);
    $result = mysqli_query($link, "select * from timingrules");
    if(mysqli_num_rows($result)>0)
        mysqli_query($link, "update timingrules set timingrule='$timingrule'") or die(mysqli_error($link));
    else
        mysqli_query($link, "insert into timingrules(timingrule) values('$timingrule')") or die(mysqli_error($link));
    mysqli_free_result($result);
    echo "<div class='center' style='text-align:center;width:100%;'>Timing & Rules Updated...!<br><a href='aabout.php'>Back</a></div>";
}
include './afooter.php';
?>