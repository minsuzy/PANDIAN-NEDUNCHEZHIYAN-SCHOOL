<?php
include './header.php';
include './bnr.php';
?>
<div id="about" class="about">
    <div class="container">
        <a name="about"></a>
        <div class="row d_flex">
            <div class="col-md-10">
                <div class="titlepage">
                    <h2></h2>
                    <span></span>                    
                </div>
            </div>
        </div>
        
        <div class="row d_flex">
            <div class="col-md-10">
                <div class="titlepage">
                    <h2>History</h2>
                    <span></span>
                    <p style="font-size: 15pt;text-align: justify;">
                        PANDIAN NEDUNCHEZHIAN HSS, ARMED RESERVE LINE was established in 1961 and it is managed by the Local body. It is located in Urban area. It is located in MADURAI WEST block of MADURAI district of Tamil Nadu. The school consists of Grades from 6 to 12. The school is Co-educational and it doesn't have an attached pre-primary section. The school is N/A in nature and is not using the school building as a shift-school. Tamil is the medium of instructions in this school. This school is approachable by all weather road. This school academic session starts in June.Pandian Nedunchezhian Corp High School has established a strong reputation for excellence in the field of Schools.With a comprehensive approach to education,Pandian Nedunchezhian Corp High School is committed to providing the best educational experience for every student.
                    </p>
                </div>
            </div>

            <div class="col-md-2">
                <div class="about_img">
                    <figure><!--img src="<?php echo $row[1]; ?>" alt="#"/--></figure>
                </div>
            </div>
        </div>
        <hr>
        <div class="row d_flex">
            <div class="col-md-10">
                <div class="titlepage">
                    <h2>Overview</h2>
                    <span></span>
                    <p style="font-size: 15pt;text-align: justify;">
                        Pandian Nedunchezhian Corp High School in Narimedu, Madurai is a leading name in the education sector,offering a wide range of caters to the diverse needs of the students. The school is dedicated to academic excellence and operates on a schedule that accommodates students' varied commitments.With a team of experienced educators, Pandian Nedunchezhian Corp High School is committed to providing the best educational experience for every student.
                    </p>
                </div>
            </div>

            <div class="col-md-2">
                <div class="about_img">
                    <figure><!--img src="<?php echo $row[1]; ?>" alt="#"/--></figure>
                </div>
            </div>
        </div>
        <hr>
        <div class="row d_flex">
            <div class="col-md-10">
                <div class="titlepage">
                    <h2>CURRICULUM AND MEDIUM OF INSTRUCTION</h2>
                    <span></span>
                    <p style="font-size: 15pt;text-align: justify;">
                        Pandian Nedunchezhian Corp High School in Narimedu, Madurai,We ensure a well-rounded education that includes academic subjects,arts and physical education.
                    </p>
                </div>
            </div>

            <div class="col-md-2">
                <div class="about_img">
                    <figure><!--img src="<?php echo $row[1]; ?>" alt="#"/--></figure>
                </div>
            </div>
        </div>
        <hr>
        
        <div class="row d_flex">
            <div class="col-md-10">
                <div class="titlepage">
                    <h2>LEVEL OF SCHOOLING AT PANDIAN NEDUNCHEZHIAN CORP HIGH SCHOOL</h2>
                    <span></span>
                    <p style="font-size: 15pt;text-align: justify;">
                        Pandian Nedunchezhian Corp High School in Narimedu, Madurai offers education across various levels,catering to students from early childhood through higher education.
                    </p>
                </div>
            </div>

            <div class="col-md-2">
                <div class="about_img">
                    <figure><!--img src="<?php echo $row[1]; ?>" alt="#"/--></figure>
                </div>
            </div>
        </div>
        <hr>
        
        <div class="row d_flex">
            <div class="col-md-10">
                <div class="titlepage">
                    <h2>SCHOOL INFO</h2>
                    <span></span>
                    <p style="font-size: 15pt;text-align: justify;">
                        The school ensures governance and a structured approach to academic and administrative functions.This diversity allows parents and students to choose the type of schooling that best suits their needs and preferences.
                    </p>
                </div>
            </div>

            <div class="col-md-2">
                <div class="about_img">
                    <figure><!--img src="<?php echo $row[1]; ?>" alt="#"/--></figure>
                </div>
            </div>
        </div>
        <hr>
        
        <div class="row d_flex">
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
                  
              </div>
    </div>
</div>
<?php
include './footer.php';
?>