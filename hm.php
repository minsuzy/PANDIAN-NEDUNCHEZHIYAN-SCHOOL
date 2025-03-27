<?php
include './header.php';
include './bnr.php';
?>
<div id="about" class="about" style="padding-top: 90px;">
    <div class="container"style="padding-top: 90px;">
        <a name="about"></a>
        <div class="row d_flex">
            <div class="col-md-10">
                <div class="titlepage">
                    <h2>Head Master</h2>
                    <span></span>                    
                </div>
            </div>
        </div>
        
        <div class="row d_flex">
                  <div class="col-md-10">
                      <div class="titlepage">
                          <!--h2>Principal Message</h2-->
                          <span></span>
                          <p style="font-size: 15pt;text-align: justify;">
<?php
$result = mysqli_query($link, "select * from principalmsg");
$row = mysqli_fetch_row($result);
echo $row[0];
mysqli_free_result($result);
?>
                          </p>
                      </div>
                  </div>

                  <div class="col-md-2">
                      <div class="about_img">
                          <figure><img src="<?php echo $row[1];?>" alt="#"/></figure>
                      </div>
                  </div>
              </div>
        <hr>
    </div>
</div>
<?php
include './footer.php';
?>