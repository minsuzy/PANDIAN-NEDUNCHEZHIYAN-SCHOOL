<?php
include './adminheader.php';
?>
<!-- <div class="right" style="padding-right: 100px;width:100%;"> -->
    <!-- <a href="avgallery.php">View Gallery</a> -->
<!-- </div> -->
<form name="f" action="agallery.php" method="post" enctype="multipart/form-data" style="margin:auto;padding-top: 30px;">
        <table class="center_tab" style="margin:auto;">
            <thead>
                <tr>
                    <th colspan="2" class="center">NEW GALLERY IMAGE</th>
                </tr>
            </thead>
            <tbody>                
                <tr>
                    <th>Title</th>
                    <td><input type="text" name="gtitle" required autofocus></td>
                </tr>
                <tr>
                    <th>Gallery Image</th>
                    <td><input type="file" name="ff" required accept="image/*"></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" class="center">
                        <input type="submit" name="sub1" value="Store">	
                        <div class="right" style="padding-right: 100px;width:100%;">
    <a href="avgallery.php">View Gallery</a>
</div>	    
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
    <?php
if(isset($_POST['sub1'])) {
    extract($_POST);
    if(is_uploaded_file($_FILES['ff']['tmp_name'])) {
        $fname = "uploads/".time().$_FILES['ff']['name'];
        move_uploaded_file($_FILES['ff']['tmp_name'], $fname) or die("<div class='center'>File Not Uploaded..!<br><a href='agallery.php'>Back</a></div>");
        $gtitle = addslashes($gtitle);
        mysqli_query($link, "insert into gallery(gtitle,fname) values('$gtitle','$fname')");
        echo "<div class='center' style='width:100%;'>Gallery Stored...!<br><a href='agallery.php'>Back</a></div>";
    } else {
        echo "<div class='center'>Image Not Uploaded...!<br><a href='agallery.php'>Back</a></div>";
    }    
}
include './afooter.php';
?>