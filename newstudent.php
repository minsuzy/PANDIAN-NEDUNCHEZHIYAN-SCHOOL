<?php
include './adminheader.php';
if(!isset($_POST['submit1'])) {
?>
<div class="right" style="padding-right: 100px;width:100%;">
    <!--a href="avstudents.php">View Students</a-->
</div>
    <form name="f" action="newstudent.php" method="post" style="margin:auto;padding-top: 30px;"">
        <table class="center_tab">
            <thead>
                <tr>
                    <th colspan="2" class="center">NEW STUDENT</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>EMIS No</th>
                    <td><input type="text" name="emisno" required></td>
                </tr>
                <tr>
                    <th>Student Name</th>
                    <td><input type="text" name="sname" required autofocus></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><textarea name="addr" rows="3" cols="35" required></textarea></td>
                </tr>
                <tr>
                    <th>Father Name</th>
                    <td><input type="text" name="father" required></td>
                </tr>
                <tr>
                    <th>Mother Name</th>
                    <td><input type="text" name="mother" required></td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td><input type="date" name="dob" required></td>
                </tr>
                <tr>
                    <th>Occupation</th>
                    <td><input type="text" name="occ" required></td>
                </tr>
                <tr>
                    <th>Mobile</th>
                    <td><input type="text" name="mobile" required pattern="[9876]\d{9}" maxlength="10"></td>
                </tr>
                <tr>
                    <th>Emergency No.</th>
                    <td><input type="text" name="emergency" required pattern="[9876]\d{9}" maxlength="10"></td>
                </tr>
                <tr>
                    <th>Community</th>
                    <td><input type="text" name="commu" required></td>
                </tr>
                <tr>
                    <th>Religion</th>
                    <td><input type="text" name="religion" required></td>
                </tr>            
                <tr>
                    <th>Caste</th>
                    <td><input type="text" name="caste" required></td>
                </tr>
                <tr>
                    <th>Blood Group</th>
                    <td><input type="text" name="bg" required></td>
                </tr>
                <tr>
                    <th>Identification Mark</th>
                    <td><input type="text" name="idmark" required></td>
                </tr>
                <tr>
                    <th>Admission Date</th>
                    <td><input type="date" name="adt" required></td>
                </tr>
                <tr>
                    <th>Aadhar No</th>
                    <td><input type="text" name="aadhar" pattern="\d{12}" maxlength="12" required></td>
                </tr>
                <tr>
                    <th>Guradian</th>
                    <td><input type="text" name="guardian" required></td>
                </tr>
                <tr>
                    <th>Siblings</th>
                    <td><input type="text" name="sib" required></td>
                </tr>                    
                <tr>
                    <th>Student Class</th>
                    <td>
                        <select name="tclass">
                            <!--option value="I">I</option>
                            <option value="II">II</option>
                            <option value="III">III</option>
                            <option value="IV">IV</option>
                            <option value="V">V</option-->
                            <option value="VI">VI</option>
                            <option value="VII">VII</option>
                            <option value="VIII">VIII</option>
                            <option value="IX">IX</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Section</th>
                    <td>
                        <select name="sec">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                    </td>
                </tr> 
                <tr>
                    <th>Gender</th>
                    <td>
                        <select name="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" class="center">
                        <input type="submit" name="submit1" value="Create"><br>
                        <a href="avstudents.php">View Students</a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
<?php
} else {
    extract($_POST);
        $b = mysqli_query($link, "insert into student(emisno,sname,addr,father,mother,dob,occ,mobile,emergency,commu,religion,caste,bg,idmark,adt,aadhar,guardian,sib,tclass,sec,gender) values('$emisno','$sname','$addr','$father','$mother','$dob','$occ','$mobile','$emergency','$commu','$religion','$caste','$bg','$idmark','$adt','$aadhar','$guardian','$sib','$tclass','$sec','$gender')");
        if($b) {
            echo "<div class='center'>Student Created Successfully...!<br><a href='newstudent.php'>Back</a></div>";
        } else {
            echo "<div class='center'>".mysqli_error($link)."<br><a href='newstudent.php'>Back</a></div>";
        }    
}    
?>
    </div>
</div>
</section>
<script>
    function check() {
        var m = f.mobile.value
        var e = f.email.value
        var pw = f.pwd.value
        var cp = f.cpwd.value
        
        var mp = /^[987]\d{9}$/
        var ep = /^\w+\.{0,1}\w+\@\w+\.([a-z]{3}|[a-z]{2}\.[a-z]{2}){1}$/
        
        if(!m.match(mp)) {
            alert("Invalid Mobile Number")
            f.mobile.focus()
            return false
        }
        if(!e.match(ep)) {
            alert("Invalid EMail Id")
            f.email.focus()
            return false
        }
        if(pw!=cp) {
            alert("Confirm Password not Match")
            f.cpwd.focus()
            return false
        }
        return true
    }
</script>
<?php
include './footer.php';
?>