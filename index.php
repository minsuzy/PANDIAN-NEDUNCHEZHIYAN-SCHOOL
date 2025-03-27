<?php
include './header.php';
?>
  <!-- banner -->
  <div id="myCarousel" class="carousel slide banner_main" style="padding-top: 90px;" data-ride="carousel">
     <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
     </ol>
     <div class="carousel-inner">
        <div class="carousel-item active">
           <img class="first-slide" src="images/i1.jpg" alt="First slide">
           <div class="container">
              <div class="carousel-caption relative">
                 <h1>PANDIAN NEDUNCHEZHIYAN CORP. Hr. Sec. SCHOOL<span></span></h1>
                 <!--a href="#contact">Contact Us</a-->
              </div>
           </div>
        </div>
        <div class="carousel-item">
           <img class="second-slide" src="images/i2.jpg" alt="Second slide">
           <div class="container">
              <div class="carousel-caption relative">
                 <h1>PANDIAN NEDUNCHEZHIYAN CORP. Hr. Sec. SCHOOL<span></span></h1>
              </div>
           </div>
        </div>
        <div class="carousel-item">
           <img class="third-slide" src="images/i3.jpg" alt="Third slide">
           <div class="container">
              <div class="carousel-caption relative">
                 <h1>PANDIAN NEDUNCHEZHIYAN CORP. Hr. Sec. SCHOOL<span></span></h1>
              </div>
           </div>
        </div>
        <div class="carousel-item">
           <img class="third-slide" src="images/i4.jpg" alt="four slide">
           <div class="container">
              <div class="carousel-caption relative">
                 <h1>PANDIAN NEDUNCHEZHIYAN CORP. Hr. Sec. SCHOOL<span></span></h1>
              </div>
           </div>
        </div>
        <div class="carousel-item">
           <img class="third-slide" src="images/i5.jpg" alt="five slide">
           <div class="container">
              <div class="carousel-caption relative">
                 <h1>PANDIAN NEDUNCHEZHIYAN CORP. Hr. Sec. SCHOOL<span></span></h1>
              </div>
           </div>
        </div>
     </div>
     <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
     <span class="sr-only">Previous</span>
     </a>
     <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
     <span class="carousel-control-next-icon" aria-hidden="true"></span>
     <span class="sr-only">Next</span>
     </a>
  </div>
  <!-- end banner -->
      <!-- about -->
      <div id="about"  class="about">
          <div class="container">
              <marquee style="color:red;font-size: 15pt;">
                  <?php
                  $result = mysqli_query($link, "select msg from smsg");
                  echo "| ";
                  while($row = mysqli_fetch_row($result)) {
                      echo "* $row[0] &nbsp; | &nbsp;";
                  }
                  mysqli_free_result($result);
                  ?>
              </marquee>
              <!--div class="row d_flex">
                  <div class="col-md-10">
                      <div class="titlepage">
                          <h2>Principal Message</h2>
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
              </div-->
              
              <!--div class="row d_flex">
                  <div class="col-md-12">
                      <div class="titlepage">
                          <h2>Our Mission</h2>
                          <span></span>
                          <div class="col-md-12">
                              <div class="about_img center">
                                  <figure><img src="images/mission.jpg" alt="#" style="width:200px;"/></figure>
                              </div>
                          </div>
                          <p style="font-size: 15pt;text-align: justify;">
<?php
$result = mysqli_query($link, "select * from mission");
$row = mysqli_fetch_row($result);
echo nl2br($row[0]);
mysqli_free_result($result);
?>
                          </p>
                      </div>
                  </div>                  
              </div>
              
              <div class="row d_flex">                  
                  <div class="col-md-12">
                      <div class="titlepage">
                          <h2>Our Vision</h2>
                          <span></span>
                          <div class="col-md-12">
                              <div class="about_img center">
                                  <figure><img src="images/vision.jpg" alt="#" style="width:200px;"/></figure>
                              </div>
                          </div>
                          <p style="font-size: 15pt;text-align: justify;">
<?php
$result = mysqli_query($link, "select * from vision");
$row = mysqli_fetch_row($result);
echo nl2br($row[0]);
mysqli_free_result($result);
?>
                          </p>
                      </div>
                  </div>               
                  
              </div-->
              
              <div class="row d_flex">                  
                  <div class="col-md-12">
                      <div class="titlepage">
                          <h2>Our Facilities</h2>
                          <span></span>
                          <div class="row d_flex">
                          <div class="col-md-4">
                              <img src="images/library.jpg" alt="#"/>
                              <p class="center">LIBRARY</p>
                          </div>                          
                          <div class="col-md-4">
                              <img src="images/science.jpg" alt="#"/>
                              <p class="center">SCIENCE LAB</p>
                          </div>
                          <div class="col-md-4">
                              <img src="images/computer.jpg" alt="#"/>
                              <p class="center">COMPUTER LAB</p>
                          </div>
                          </div>
                          <p></p>
                          <div class="row d_flex">
                          <div class="col-md-6" style="text-align:center;">
                              <img src="images/smart.jpg" alt="#"/>
                              <p class="center">SMART CLASS ROOM</p>
                          </div>                          
                          <div class="col-md-6" style="text-align:center;">
                              <img src="images/waterpurifier.jpg" alt="#"/>
                              <p class="center">WATER PURIFIER FOR DRINKING</p>
                          </div>                          
                          </div>
                      </div>
                  </div>                  
              </div>
              
          </div>
      </div>
      <!-- end about -->
      <!-- mobile>
      <div id="mobile"  class="mobile">
         <div class="container">
            <div class="row d_flex">
               
               
            </div>
         </div>
      </div-->
      <!-- end mobile -->
<?php
include './footer.php';
?>