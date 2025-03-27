<?php
include './header.php';
include './bnr.php';
?>
<div id="about" class="about">        
    <div class="container">
        <a name="studachieve"></a>
        <div class="row d_flex">
            <div class="col-md-10">
                <div class="titlepage">
                    <h2>Student's Achievements</h2>
                    <span></span>                    
                </div>
            </div>
        </div>
        
        <?php
        $result = mysqli_query($link, "select * from sachievements");
        while($row = mysqli_fetch_row($result)) {
        ?>
        <div class="row d_flex">
            <div class="col-md-10">
                <div class="titlepage">
                    <h3><?php echo $row[1];?> <?php echo "($row[2])";?></h3>
                    <span></span>
                    <p><?php echo $row[3];?></p>
                </div>
            </div>

            <div class="col-md-2">
                <div class="about_img">
                    <figure><img src="<?php echo $row[4];?>" alt="#" style="border-radius: 20px;" width="235" height="290"/></figure>
                </div>
            </div>
        </div>
        <hr>
        <?php
        }
        mysqli_free_result($result);
        ?>
</div>
<?php
include './footer.php';
?>