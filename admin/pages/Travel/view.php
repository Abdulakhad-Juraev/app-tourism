<?php

global $uri;
global $lang_count;
global $lang;
global $local_strings;

$travel = getOne($uri[4], "travel");
$logo = getAttachmentR($travel['logo']);

?>


<div class="container">
    <div class="row">
        <div class="col">
            <a href="/admin/<? echo $uri[2]; ?>"
               class="btn btn-secondary"> <? echo $local_strings[$lang]['cancel']; ?> </a>
        </div>
    </div>
    <?
    if ($travel !== null) {
        ?>
        <div class="row mt-5">
            <div class="col-4 offset-2">
                <img src="/uploads/<? echo '' . $logo['unique_id'] . '.' . $logo['ext']; ?>" class="img-thumbnail">
            </div>
            <div class="col-4">
                <h4>
                    <?
                    if ($travel['districts'] !== "") {
                        foreach (explode(",", $travel['districts']) as $ds) {
                            $district = getOne($ds, "district");
                            echo $district['name_' . $lang] . ", ";
                        }
                    }
                    ?>
                </h4>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-6">
                <?
                if ($lang_count === 1) {
                    ?>
                    <div class="col-12">
                        <p><? echo $local_strings[$lang]['name']; ?></p>
                        <h4 class="form-control"> <? echo $travel['name_uz']; ?> </h4>
                    </div>
                    <?
                } else {
                    ?>
                    <div class="col-12">
                        <p><? echo $local_strings['uz']['name']; ?></p>
                        <h4 class="form-control"> <? echo $travel['name_uz']; ?> </h4>
                    </div>
                    <?
                }
                if ($lang_count >= 3) {
                    echo "<div class='col-12'>";
                    echo "<p>" . $local_strings['ru']['name'] . "</p>";
                    echo "<h4 class='form-control'>" . $travel['name_ru'] . "</h4>";
                    echo "</div>";

                    echo "<div class='col-12'>";
                    echo "<p>" . $local_strings['en']['name'] . "</p>";
                    echo "<h4 class='form-control'>" . $travel['name_en'] . "</h4>";
                    echo "</div>";
                }
                ?>
            </div>
            <div class="col-6">
                <?
                if ($lang_count === 1) {
                    ?>
                    <div class="col-12">
                        <p><? echo $local_strings[$lang]['description']; ?></p>
                        <p class="form-control"> <? echo $travel['description_uz']; ?> </p>
                    </div>
                    <?
                } else {
                    ?>
                    <div class="col-12">
                        <p><? echo $local_strings['uz']['description']; ?></p>
                        <h4 class="form-control"> <? echo $travel['description_uz']; ?> </h4>
                    </div>
                    <?
                }
                if ($lang_count >= 3) {
                    echo "<div class='col-12'>";
                    echo "<p>" . $local_strings['ru']['description'] . "</p>";
                    echo "<h4 class='form-control'>" . $travel['description_ru'] . "</h4>";
                    echo "</div>";

                    echo "<div class='col-12'>";
                    echo "<p>" . $local_strings['en']['description'] . "</p>";
                    echo "<h4 class='form-control'>" . $travel['description_en'] . "</h4>";
                    echo "</div>";
                }
                ?>
            </div>
            <div class="col-4">
                <p><? echo $local_strings[$lang]['date']; ?></p>
                <p class="form-control"> <? echo $travel['date']; ?> </p>
            </div>
            <div class="col-4">
                <p><? echo $local_strings[$lang]['count']; ?></p>
                <p class="form-control"> <? echo $travel['count']; ?> </p>
            </div>
            <div class="col-4">
                <p><? echo $local_strings[$lang]['price']; ?></p>
                <p class="form-control"> <? echo $travel['price']; ?> </p>
            </div>
        </div>
        <hr>
        <a href="/admin/travel/add/<?echo $uri[4]; ?>" class="btn btn-primary">
            <? echo $local_strings[$lang]['add_image']; ?>
        </a>
        <div class="row mt-3">
            <form method="post">
            <?
            if ($travel['gallery'] !== "" && $travel['gallery'] !== "") {
                foreach (explode(",", $travel['gallery']) as $ds) {
                    if ($ds !== "" && $ds !== null){
                        $d = getAttachmentR($ds);
                        ?>
                        <div class="col-3">
                            <input type="hidden" name="unique" value="<? echo $d['unique_id']; ?>">
                            <img src="/uploads/<? echo '' . $d['unique_id'] . '.' . $d['ext']; ?>" class="img-thumbnail">
                            <input type="submit" name="remove" value="x" class="btn btn-danger w-100">
                        </div>
                        <?
                    }
                }
            }
            ?>
            </form>
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



<?php
if (isset($_POST['remove'])){
    response(removeFromGallery($uri[4],$_POST['unique']),"travel/view/".$uri[4]);
}

?>

