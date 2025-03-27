<?php
include './adminheader.php';
$result = mysqli_query($link, "select * from principalmsg");
$row = mysqli_fetch_row($result);
$msg = $row[0];
mysqli_free_result($result);

$result = mysqli_query($link, "select * from mission");
$row = mysqli_fetch_row($result);
$mission = $row[0];
mysqli_free_result($result);

$result = mysqli_query($link, "select * from vision");
$row = mysqli_fetch_row($result);
$vision = $row[0];
mysqli_free_result($result);
?>
<div class="right" style="display: block;width:100%;">
</div>
<form name="f1" action="adminhome.php" method="post" style="margin:auto;padding-top: 30px;" enctype="multipart/form-data">
    <table class="center_tab">
        <thead>
            <tr>
                <th colspan="2" class="center">HEAD MASTER MESSAGE</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th colspan="2" style="text-align:left;">Message Content</th>
            </tr>
            <tr>
                <td colspan="2"><textarea name="msg" required autofocus cols="150" rows="8"><?php echo $msg;?></textarea></td>
            </tr>
            <tr>
                <th>Principal Image</th>
                <td><input type="file" name="ff" required accept="image/*"></td>
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
<hr style="display:block;width:100%;">
<form name="f2" action="adminhome.php" method="post" style="margin:auto;">
    <table class="center_tab">
        <thead>
            <tr>
                <th colspan="2" class="center">MISSION</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th colspan="2" style="text-align:left;">Mission Content</th>
            </tr>
            <tr>
                <td colspan="2"><textarea name="mission" required cols="150" rows="4"><?php echo $mission;?></textarea></td>
            </tr>	    
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" class="center">
                    <input type="submit" name="sub2" value="Submit">		    
                </td>
            </tr>
        </tfoot>
    </table>
</form>
<hr style="display:block;width:100%;">
<form name="f3" action="adminhome.php" method="post" style="margin:auto;">
    <table class="center_tab">
        <thead>
            <tr>
                <th colspan="2" class="center">VISION</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th colspan="2" style="text-align:left;">Vision Content</th>
            </tr>
            <tr>
                <td colspan="2"><textarea name="vision" required cols="150" rows="4"><?php echo $vision;?></textarea></td>
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
    $msg = addslashes($msg);
    $result = mysqli_query($link, "select * from principalmsg");
    if(is_uploaded_file($_FILES['ff']['tmp_name'])) {
        $fname = "uploads/".time().$_FILES['ff']['name'];
        move_uploaded_file($_FILES['ff']['tmp_name'], $fname) or die("<div class='center'>File Not Uploaded..!<br><a href='adminhome.php'>Back</a></div>");
        
        if(mysqli_num_rows($result)>0)
        mysqli_query($link, "update principalmsg set msg='$msg',fname='$fname'") or die(mysqli_error($link));
    else
        mysqli_query($link, "insert into principalmsg(msg,fname) values('$msg','$fname')") or die(mysqli_error($link));
    } else {
        echo "<div class='center'>Image Not Uploaded...!<br><a href='adminhome.php'>Back</a></div>";
    }    
    mysqli_free_result($result);
    echo "<div class='center' style='text-align:center;width:100%;'>Message Updated...!<br><a href='adminhome.php'>Back</a></div>";
}

if(isset($_POST['sub2'])) {
    extract($_POST);
    $mission = addslashes($mission);
    $result = mysqli_query($link, "select * from mission");
    if(mysqli_num_rows($result)>0)
        mysqli_query($link, "update mission set mission='$mission'") or die(mysqli_error($link));
    else
        mysqli_query($link, "insert into mission(mission) values('$mission')") or die(mysqli_error($link));
    mysqli_free_result($result);
    echo "<div class='center' style='text-align:center;width:100%;'>Mission Content Updated...!<br><a href='adminhome.php'>Back</a></div>";
}

if(isset($_POST['sub3'])) {
    extract($_POST);
    $vision = addslashes($vision);
    $result = mysqli_query($link, "select * from vision");
    if(mysqli_num_rows($result)>0)
        mysqli_query($link, "update vision set vision='$vision'") or die(mysqli_error($link));
    else
        mysqli_query($link, "insert into vision(vision) values('$vision')") or die(mysqli_error($link));
    mysqli_free_result($result);
    echo "<div class='center' style='text-align:center;width:100%;'>Vision Content Updated...!<br><a href='adminhome.php'>Back</a></div>";
}
include './afooter.php';
?>