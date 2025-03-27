<?php
include './header.php';
include './bnr.php';
?>
<div id="about" class="about">
    <div class="container">
        <a name="rev"></a>
        <div class="row d_flex">
            <div class="col-md-10">
                <div class="titlepage">
                    <h2>Reviews</h2>
                    <span></span>                    
                </div>
            </div>
        </div>
        
        <div class="row d_flex">
            <div class="col-md-12">
                <?php
                $result = mysqli_query($link, "select * from umsgs order by id desc");
                while($row = mysqli_fetch_row($result)) {
                echo "<div style='background:rgba(200,200,200,0.5);margin:20px;padding:20px;line-height:2;'>";
                echo $row[4];
                echo "<p style='text-align:right;background:rgba(200,200,200,0.3);font-style:italic;border-radius:10px;padding:2px 10px;'>$row[2] | $row[3] | [$row[1]]</p>";
                echo "</div>";
                }
                mysqli_free_result($result);
                ?>
            </div>
        </div>

        <div class="row d_flex">
            <div class="col-md-12">
                <div class="titlepage">                    
                    <p>Give your review here...!</p>
                </div>
            </div>
            <div class="col-md-12">
                <?php
                if (!isset($_POST['b1'])) {
                    ?>
                    <form name="f" action="reviews.php" method="post">
                        <table class="center_tab" style="min-width: 40%;">
                            <thead>
                                <tr><th colspan="2" class="center">YOUR MESSAGE</th></tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Your Name</th>
                                    <td><input type="text" name="uname" required autofocus style="color:black;" size="50"></td>
                                </tr>
                                <tr>
                                    <th>EMail</th>
                                    <td><input type="text" name="email" required style="color:black;" size="50"></td>
                                </tr>
                                <tr>
                                    <th>Enter Message</th>
                                    <td><textarea name="msg" required style="color:black;" cols="80" rows="5"></textarea></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr><td colspan="2" class="center">
                                        <input type="submit" name="b1" value="Submit">
                                    </td></tr>
                            </tfoot>
                        </table>
                    </form>
                    <?php
                } else {
                    extract($_POST);
                    $dt = date('Y-m-d', time());
                    mysqli_query($link, "insert into umsgs(dt,uname,email,msg) values('$dt','$uname','$email','$msg')");
                    echo "<div class='center'>Message Send Successfully...!<br><a href='reviews.php'>Back</a></div>";
                }
                ?>
            </div>            
        </div>
        <hr>

    </div>
</div>
<?php
include './footer.php';
?>