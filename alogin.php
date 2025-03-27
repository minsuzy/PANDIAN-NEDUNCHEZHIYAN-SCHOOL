<?php
include './header.php';
?>
<div id="about" class="about" style="min-height: 400px;padding-top: 90px;">
 <div class="container" style="padding-top: 90px;">
    <div class="row d_flex">        
<?php
    if(!isset($_POST['submit1'])) {
?>
        <form name="f" action="alogin.php" method="post" style="margin: auto;">
    <table class="center_tab">
	<thead>
	    <tr>
                <th colspan="2" class="center">ADMIN LOGIN</th>
	    </tr>
	</thead>
	<tbody>
	    <tr>
		<th>UserId</th>
		<td><input type="text" name="userid" required autofocus></td>
	    </tr>
	    <tr>
		<th>Password</th>
		<td><input type="password" name="pwd" required></td>
	    </tr>
	</tbody>
	<tfoot>
	    <tr>
		<td colspan="2" class="center">
		    <input type="submit" name="submit1" value="Login">		    
		</td>
	    </tr>
	</tfoot>
    </table>
</form>
<?php
    } else {
    extract($_POST);
    /*if(strcasecmp($utype, "user")==0) {*/
        $result = mysqli_query($link, "select * from admin where userid='$userid' 
and pwd='$pwd'") or die(mysqli_error($link));
        if(mysqli_num_rows($result)>0) {
            $row = mysqli_fetch_row($result);            
            $_SESSION['adminuserid'] = $userid;
            header("Location:adminhome.php");
        } else {
            echo "<div class='center'>Invalid Userid/Password...!<br><a href='alogin.php'>Back</a></div>";
        }
        mysqli_free_result($result);
    /*} else if(strcasecmp($utype, "owner")==0) {
        $result = mysqli_query($link, "select * from newuser where userid='$userid' 
and pwd='$pwd' and utype='$utype'") or die(mysqli_error($link));
        if(mysqli_num_rows($result)>0) {
            $row = mysqli_fetch_row($result);            
            $_SESSION['ownerid'] = $userid;
            header("Location:ownerhome.php");
        } else {
            echo "<div class='center'>Invalid Userid/Password...!<br><a href='index.php'>Back</a></div>";
        }
        mysqli_free_result($result);
    }*/
}
?>
    </div>
</div>
</div>
<?php
include './footer.php';
?>