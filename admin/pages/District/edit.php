<?php

global $local_strings;
global $lang;
global $lang_count;
global $uri;


$district = getOne($uri[4], "district");

?>


<div class="container">
    <div class="row">
        <div class="col-6">
            <form method="post">
                <div class="modal-body">
                    <?
                    if ($lang_count === 1) {
                        ?><input class="form-control my-2" type="search" name="name_uz"
                                value="<? echo $district['name_uz']; ?>"
                                 placeholder="<? echo $local_strings[$lang]['name']; ?>"><?
                    } else {
                        ?><input class="form-control my-2" type="search" name="name_uz"
                                 value="<? echo $district['name_uz']; ?>"
                                 placeholder="<? echo $local_strings['uz']['name']; ?>"><?
                    }
                    ?>
                    <?
                    if ($lang_count >= 3) {
                        ?>
                        <input class="form-control my-2" type="search" name="name_ru"
                               value="<? echo $district['name_ru']; ?>"
                               placeholder="<? echo $local_strings["ru"]['name']; ?>">

                        <input class="form-control my-2" type="search" name="name_en"
                               value="<? echo $district['name_en']; ?>"
                               placeholder="<? echo $local_strings["en"]['name']; ?>">
                        <?
                    }
                    ?>

                    <div class="row my-2">
                        <legend class="col-form-label col-sm-2 pt-0"><? echo $local_strings[$lang]['type']; ?></legend>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <?
                                    if ($district['type'] === "in") {
                                        ?>
                                        <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="in" checked>
                                        <?
                                    }else {
                                        ?>
                                        <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="in">
                                        <?
                                    }
                                ?>
                                <label class="form-check-label" for="inlineRadio1"><? echo $local_strings[$lang]['in']; ?></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <?
                                if ($district['type'] === "out") {
                                    ?>
                                    <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="out" checked>
                                    <?
                                }else {
                                    ?>
                                    <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="out">
                                    <?
                                }
                                ?>

                                <label class="form-check-label" for="inlineRadio2"><? echo $local_strings[$lang]['out']; ?>    </label>
                            </div>
                        </div>
                    </div>

                    <a href="/admin/<? echo $uri[2]; ?>" class="btn btn-secondary"><? echo $local_strings[$lang]['cancel']; ?></a>
                    <input name="save" type="submit" class="btn btn-success" value="<? echo $local_strings[$lang]['create']; ?>">
                </div>

            </form>
        </div>
    </div>
</div>

<?php

if (isset($_POST['save'])) {
    $_POST = str_replace("'","`",$_POST);
    response(editDistrict($_POST), "district");
}

?>
