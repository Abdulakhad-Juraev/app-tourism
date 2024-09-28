<?php

global $uri;
global $lang_count;
global $lang;
global $local_strings;

$district = getOne($uri[4], "paket");

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
                <div class="col-12">
                    <span><?=$local_strings[$lang]['name'];?> Uz</span>
                    <input class="form-control" rows="2" disabled value="<? echo $district['name_uz']; ?>">
                </div>
                <div class="col-12 mt-2">
                    <span><?=$local_strings[$lang]['name'];?> Ru</span>
                    <input class="form-control" rows="2" disabled value="<? echo $district['name_ru']; ?>">
                </div>
                <div class="col-12 mt-2">
                    <span><?=$local_strings[$lang]['name'];?> En</span>
                    <input class="form-control" rows="2" disabled value="<? echo $district['name_en']; ?>">
                </div>
                <?
            }
            if ($lang_count >= 3){
                echo "<div class='col-12 mt-2'>";
                echo "<span>".$local_strings[$lang]['name']." Uz</span>";
                echo "<textarea class='form-control' rows='3' disabled>".$district['content_'. $lang]."</textarea>";
                echo "</div>";
                echo "<div class='col-12 mt-2'>";
                echo "<span>".$local_strings[$lang]['name']." Ru</span>";
                echo "<textarea class='form-control' rows='3' disabled>".$district['content_'. $lang]."</textarea>";
                echo "</div>";
                echo "<div class='col-12 mt-2'>";
                echo "<span>".$local_strings[$lang]['name']." En</span>";
                echo "<textarea class='form-control' rows='3' disabled>".$district['content_'. $lang]."</textarea>";
                echo "</div>";
                echo "<div class='col-12 mt-2'>";
                echo "<span>".$local_strings[$lang]['count']."</span>";
                echo "<input class='form-control' disabled value=".$district['soni'].">";
                echo "</div>";
                echo "<div class='col-12 mt-2'>";
                echo "<span>".$local_strings[$lang]['date']."</span>";
                echo "<input class='form-control' disabled value='".$district['kun']."'>";
                echo "</div>";
                echo "<div class='col-12 mt-2'>";
                echo "<span>".$local_strings[$lang]['price']."</span>";
                echo "<input class='form-control' disabled value='".$district['narx']."'>";
                echo "</div>";
                echo "<div class='col-12 mt-2'>";
                echo "<span>".$local_strings[$lang]['discount']."</span>";
                echo "<input class='form-control' disabled value='".$district['chegirma']."'>";
                echo "</div>";
                echo "<div class='col-12 mt-2'>";
                echo "<span>".$local_strings[$lang]['district']."</span>";
                echo "<input class='form-control' disabled value='".$district['region']."'>";
                echo "</div>";
                echo "<div class='col-12 mt-2 mb-4'>";
                echo "<span>".$local_strings[$lang]['link']."</span>";
                echo "<input class='form-control' disabled value='".$district['link']."'>";
                echo "</div>";
                echo "<div class='col-2 mx-auto'>";
                echo "<img src='/uploads/".$district['photo']."' class='img-thumbnail' style='height:100px;' >";
                echo "</div>";
                echo "<div class='col-2 mx-auto'>";
                echo "<img src='/uploads/".$district['photo2']."' class='img-thumbnail' style='height:100px;' >";
                echo "</div>";
                echo "<div class='col-2 mx-auto'>";
                echo "<img src='/uploads/".$district['photo3']."' class='img-thumbnail' style='height:100px;' >";
                echo "</div>";
                echo "<div class='col-2 mx-auto'>";
                echo "<img src='/uploads/".$district['photo4']."' class='img-thumbnail' style='height:100px;' >";
                echo "</div>";
                echo "<div class='col-2 mx-auto'>";
                echo "<img src='/uploads/".$district['photo5']."' class='img-thumbnail' style='height:100px;' >";
                echo "</div>";

            }
            ?>
        </div>
        <?
    } else {

    }
    ?>

</div>
