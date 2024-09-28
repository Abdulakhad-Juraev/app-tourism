<?php

global $uri;
global $lang_count;
global $lang;
global $local_strings;

$district = getOne($uri[4], "district");

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
                        <h4 class="form-control"> <? echo $district['name_uz']; ?> </h4>
                    </div>
                    <?
                }else {
                    ?>
                    <div class="col-3">
                        <p><? echo $local_strings['uz']['name']; ?></p>
                        <h4 class="form-control"> <? echo $district['name_uz']; ?> </h4>
                    </div>
                    <?
                }
                if ($lang_count >= 3){
                    echo "<div class='col-3'>";
                    echo "<p>".$local_strings['ru']['name']."</p>";
                    echo "<h4 class='form-control'>".$district['name_ru']."</h4>";
                    echo "</div>";

                    echo "<div class='col-3'>";
                    echo "<p>".$local_strings['en']['name']."</p>";
                    echo "<h4 class='form-control'>".$district['name_en']."</h4>";
                    echo "</div>";
                }
                ?>
            <div class="col-3">
                <p><? echo $local_strings[$lang]['type']; ?></p>
                <h4 class="form-control"> <? echo $local_strings[$lang][$district['type']]; ?> </h4>
            </div>
        </div>
        <?
    } else {
        ?>
        <div class="row">
            <div class="col-6 offset-3 text-center">
                <h4>Ma'lumot mavjud emas</h4>
            </div>
        </div>
        <?
    }
    ?>

</div>
