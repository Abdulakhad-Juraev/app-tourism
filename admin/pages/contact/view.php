<?php

global $uri;
global $lang_count;
global $lang;
global $local_strings;

$district = getOne($uri[4], "contact");

?>


<div class="container">
    <div class="row">
        <div class="col">
            <a href="/admin/<? echo $uri[2];?>" class="btn btn-secondary"> <? echo $local_strings[$lang]['cancel']; ?> </a>
        </div>
    </div>
    <?
    if ($district !== null) {
        ?>
        <div class="row mt-5">
            <?
            if ($lang_count === 1) {
                ?>
                <div class="col-3">
                    <p><? echo $local_strings[$lang]['name']; ?></p>
<!--                    <h4 class="form-control"> --><?// echo $district['name']; ?><!-- </h4>-->
                </div>
                <?
            }else {
                ?>
                <div class="col-3">
                    <p><? echo $local_strings[$lang]['name']; ?></p>
                    <h4 class="form-control"> <? echo $district['name']; ?> </h4>
                </div>
                <?
            }
            if ($lang_count >= 3){
                echo "<div class='col-3'>";
                echo "<p>".$local_strings[$lang]['phone']."</p>";
                echo "<h4 class='form-control'>".$district['tel']."</h4>";
                echo "</div>";

                echo "<div class='col-3'>";
                echo "<p>".$local_strings[$lang]['description']."</p>";
                echo "<textarea class='form-control' disabled>".$district['content']."</textarea>";
                echo "</div>";
            }
            ?>
        </div>
        <?
    } else {

    }
    ?>

</div>
