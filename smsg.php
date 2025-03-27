<?php
include './adminheader.php';
?>
<!-- <div class="right" style="padding-right: 100px;width:100%;">
    <a href="avmsg.php">View Message</a>
</div> -->
<form name="f" action="smsg.php" method="post" style="margin:auto;padding-top: 30px;">
        <table class="center_tab" style="margin:auto;">
            <thead>
                <tr>
                    <th colspan="2" class="center" >SCROLLING MESSAGE</th>
                </tr>
            </thead>
            <tbody>                
                <tr>
                    <th>Message</th>
                    <td><textarea name="msg" required autofocus cols="80" rows="3"></textarea></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" class="center">
                        <input type="submit" name="sub1" value="Store">
                        <div class="right" style="padding-right: 100px;width:100%;">
    <a href="avmsg.php">View Message</a>
</div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
<?php
if(isset($_POST['sub1'])) {
    extract($_POST);    
        $msg = addslashes($msg);
        mysqli_query($link, "insert into smsg(msg) values('$msg')");
        echo "<div class='center' style='width:100%;'>Message Stored...!<br><a href='smsg.php'>Back</a></div>";
}
include './afooter.php';
?>