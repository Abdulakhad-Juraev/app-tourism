<?php

global $uri;
global $lang_count;
global $lang;
global $local_strings;

$district = getOne($uri[4], "blog");
$logo = getAttachmentR($district['photo']);
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
            }else {
                ?>
                <div class="col-4">
                    <span><? echo $local_strings[$lang]['name'];?> Uz</span>
                    <textarea class="form-control" rows="2" disabled> <? echo $district['name_uz']; ?> </textarea>
                </div>
                <div class="col-4">
                    <span><? echo $local_strings[$lang]['name'];?> Ru</span>
                    <textarea class="form-control" rows="2" disabled> <? echo $district['name_ru']; ?> </textarea>
                </div>
                <div class="col-4">
                    <span><? echo $local_strings[$lang]['name'];?> En</span>
                    <textarea class="form-control" rows="2" disabled> <? echo $district['name_en']; ?> </textarea>
                </div>
                <?
            }
            if ($lang_count >= 3){
                echo "<div class='col-4 mt-5'>";
                echo "<span>".$local_strings[$lang]['description']." Uz</span>";
                echo "<textarea class='form-control' rows='3' disabled>".$district['content_uz']."</textarea>";
                echo "</div>";

                echo "<div class='col-4 mt-5'>";
                echo "<span>".$local_strings[$lang]['description']." Ru</span>";
                echo "<textarea class='form-control' rows='3' disabled>".$district['content_ru']."</textarea>";
                echo "</div>";

                echo "<div class='col-4 mt-5'>";
                echo "<span>".$local_strings[$lang]['description']." En</span>";
                echo "<textarea class='form-control' rows='3' disabled>".$district['content_en']."</textarea>";
                echo "</div>";

                echo "<div class='col-6 mx-auto mt-3'>";
                echo "<span>".$local_strings[$lang]['photo']."</span>";
                echo "<img src='/uploads/".$district['photo']."' class='img-thumbnail'>";
                echo "</div>";
            }
            ?>
        </div>
        <?
    } else {
    }
    ?>

</div>
