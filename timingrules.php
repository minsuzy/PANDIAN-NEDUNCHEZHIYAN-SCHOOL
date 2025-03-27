<?php
include './header.php';
include './bnr.php';
?>
<div id="about" class="about">    
    <div class="container">
        <a name="timing"></a>
        <div class="row d_flex">
            <div class="col-md-10">
                <div class="titlepage">
                    <h2>Timings & Rules</h2>
                    <span></span>                    
                </div>
            </div>
        </div>
        
        <?php
        $result = mysqli_query($link, "select * from timingrules");
        while($row = mysqli_fetch_row($result)) {
        ?>
        <div class="row d_flex">
            <div class="col-md-10">
                <div class="titlepage">                    
                    <p><?php echo nl2br($row[0]);?></p>
                </div>
            </div>
            
        </div>
        <hr>
        <?php
        }
        mysqli_free_result($result);
        ?>
    </div>
</div>
<?php
include './footer.php';
?>