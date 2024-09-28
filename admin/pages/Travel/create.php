<?php

global $local_strings;
global $lang;
global $lang_count;
global $uri;

$districts = getAll("district");

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
                                         placeholder="<? echo $local_strings[$lang]['name']; ?>"><?
                            } else {
                                ?><input class="form-control my-2" type="search" name="name_uz"
                                         placeholder="<? echo $local_strings['uz']['name']; ?>"><?
                            }
                            ?>
                            <?
                            if ($lang_count >= 3) {
                                ?>
                                <input class="form-control my-2" type="search" name="name_ru"
                                       placeholder="<? echo $local_strings["ru"]['name']; ?>">

                                <input class="form-control my-2" type="search" name="name_en"
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
                                          placeholder="<? echo $local_strings[$lang]['description']; ?>"></textarea> <?
                            } else {
                                ?><textarea class="my-2 form-control" name="description_uz"
                                            placeholder="<? echo $local_strings['uz']['description']; ?>"></textarea> <?
                            }
                            ?>
                            <?
                            if ($lang_count >= 3) {
                                ?>
                                <textarea class="form-control my-2" name="description_ru"
                                          placeholder="<? echo $local_strings["ru"]['description']; ?>"></textarea>

                                <textarea class="form-control my-2" name="description_en"
                                          placeholder="<? echo $local_strings["en"]['description']; ?>"></textarea>
                                <?
                            }
                            ?>
                            <!--                    Text End -->
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

                            <input type="file" class="form-control my-2" name="logo" required
                                   placeholder="<? echo $local_strings[$lang]['logo']; ?>">

                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control my-2" name="date"
                                   placeholder="<? echo $local_strings[$lang]['date']; ?>">
                            <input type="text" class="form-control my-2" name="price"
                                   placeholder="<? echo $local_strings[$lang]['price']; ?>">

                            <input type="text" class="form-control my-2" name="count"
                                   placeholder="<? echo $local_strings[$lang]['count']; ?>">
                        </div>
                    </div>

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
            response(saveTravel($_POST, $_FILES['logo']), "travel");
    } else {
        ?>
        <script type="application/javascript">alert("Yuklangan ma'lumot rasm formatida emas!")</script>
        <?php
    }


}

?>
