<?php
include './header.php';
include './bnr.php';
?>
<div id="about" class="about">
    <div class="container">
        <a name="gallery"></a>
        <div class="row d_flex">
            <div class="col-md-10">
                <div class="titlepage">
                    <h2>Gallery</h2>
                    <span></span>                    
                </div>
            </div>
        </div>
        <div class="row d_flex">
            <div class="col-md-12">
<?php
        $result = mysqli_query($link, "select * from gallery") or die(mysqli_error($link));
        echo "<table border='0' style='border-spacing:10px;margin:20px auto;'>";
        $i=0;
        while($row = mysqli_fetch_row($result)) {            
            if($i==0 || $i%3==0)
            echo "<tr>";
            echo "<td style='text-align:center;padding:10px 30px;'><img src='$row[2]' style='width:300px;height:230px;border-radius:20px;' onclick=\"call('$row[2]')\"><br>";
            echo "<b>$row[1]</b><br>";
            $i++;
        }
        echo "</table>";
        mysqli_free_result($result);
?>
            </div>
        </div>
    </div>
</div>
<?php
include './footer.php';
?>
<script>
    function call(p) {
        window.open(p)
    }
</script>