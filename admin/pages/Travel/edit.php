<?php

global $local_strings;
global $lang;
global $lang_count;
global $uri;


$travel = getOne($uri[4], "travel");

$districts = getAll("district");
$logo = getAttachmentR($travel['logo']);

?>


<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <?
                            if ($lang_count === 1) {
                                ?><input class="form-control my-2" type="search" name="name_uz"
                                         value="<? echo $travel['name_uz']; ?>"
                                         placeholder="<? echo $local_strings[$lang]['name']; ?>"><?
                            } else {
                                ?><input class="form-control my-2" type="search" name="name_uz"
                                         value="<? echo $travel['name_uz']; ?>"
                                         placeholder="<? echo $local_strings['uz']['name']; ?>"><?
                            }
                            ?>
                            <?
                            if ($lang_count >= 3) {
                                ?>
                                <input class="form-control my-2" type="search" name="name_ru"
                                       value="<? echo $travel['name_ru']; ?>"
                                       placeholder="<? echo $local_strings["ru"]['name']; ?>">

                                <input class="form-control my-2" type="search" name="name_en"
                                       value="<? echo $travel['name_en']; ?>"
                                       placeholder="<? echo $local_strings["en"]['name']; ?>">
                                <?
                            }
                            ?>
                        </div>
                        <div class="col-6">
                            <!--                    Text Start -->
                            <?
                            if ($lang_count === 1) {
                                ?>
                                <textarea class="my-2 form-control" name="description_uz"
                                          placeholder="<? echo $local_strings[$lang]['description']; ?>"><? echo $travel['description_uz']; ?>
                                </textarea> <?
                            } else {
                                ?><textarea class="my-2 form-control" name="description_uz"
                                            placeholder="<? echo $local_strings['uz']['description']; ?>"><? echo $travel['description_uz']; ?></textarea> <?
                            }
                            ?>
                            <?
                            if ($lang_count >= 3) {
                                ?>
                                <textarea class="form-control my-2" name="description_ru"
                                          placeholder="<? echo $local_strings["ru"]['description']; ?>"><? echo $travel['description_ru']; ?>
                                </textarea>

                                <textarea class="form-control my-2" name="description_en"
                                          placeholder="<? echo $local_strings["en"]['description']; ?>"><? echo $travel['description_en']; ?>
                                </textarea>
                                <?
                            }
                            ?>
                            <!--                    Text End -->
                        </div>
                        <div class="col-6">
                            <hr>

                            <div class="row">
                                <div class="col-6">
                                    <?
                                    if ($travel['districts'] !== ""){
                                        foreach (explode(",",$travel['districts']) as $ds){
                                            $district = getOne($ds, "district");
                                            echo $district['name_'.$lang].", ";
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="col-6">
                                    <select class="custom-select" name="districts[]" multiple>
                                        <?
                                        if ($districts !== null && $districts !== "") {
                                            $i = 1;
                                            foreach ($districts as $district) {
                                                echo "<option value=" . $district['id'] . ">" . $district['name_' . "$lang"] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-6">
                                    <img src='/uploads/<? echo $logo['unique_id'].".".$logo['ext']; ?>' class='img-thumbnail'>
                                </div>
                                <div class="col-6">

                                    <input type="file" class="form-control my-2" name="logo" required
                                           placeholder="<? echo $local_strings[$lang]['logo']; ?>">
                                </div>
                            </div>

                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control my-2" name="date"
                                   value="<? echo $travel['date']; ?>"
                                   placeholder="<? echo $local_strings[$lang]['date']; ?>">
                            <input type="text" class="form-control my-2" name="price"
                                   value="<? echo $travel['price']; ?>"
                                   placeholder="<? echo $local_strings[$lang]['price']; ?>">

                            <input type="text" class="form-control my-2" name="count"
                                   value="<? echo $travel['count']; ?>"
                                   placeholder="<? echo $local_strings[$lang]['count']; ?>">
                        </div>
                    </div>

                    <hr >
                    <a href="/admin/<? echo $uri[2]; ?>"
                       class="btn btn-secondary"><? echo $local_strings[$lang]['cancel']; ?></a>
                    <input name="save" type="submit" class="btn btn-success"
                           value="<? echo $local_strings[$lang]['create']; ?>">
                </div>

            </form>
        </div>
    </div>
</div>

<?php

if (isset($_POST['save'])) {
    $check = getimagesize($_FILES["logo"]["tmp_name"]);
    if ($check !== false) {
        $_POST = str_replace("'", "`", $_POST);
        response(editTravel($_POST, $_FILES['logo']), "travel");
    } else {
        ?>
        <script type="application/javascript">alert("Yuklangan ma'lumot rasm formatida emas!")</script>
        <?php
    }
}

?>
