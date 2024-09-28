<?php

global $uri;
global $lang_count;
global $lang;
global $local_strings;

$travel = getOne($uri[4], "travel");
$logo = getAttachmentR($travel['logo']);

?>

    <div class="container mt-5">
    <div class="row">
        <div class="col text-center align-items-center">
            <h4><? echo $local_strings[$lang]['add_image']; ?></h4>
            <form method="post" class="pt-3" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="file" class="form-control my-2" name="logo" required
                           placeholder="<? echo $local_strings[$lang]['logo']; ?>">
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary"
                       href="/admin/<? echo $uri[2]; ?>/view/<? echo $uri[4]; ?>"><? echo $local_strings[$lang]['cancel']; ?></a>
                    <input name="save" type="submit" class="btn btn-success"
                           value="<? echo $local_strings[$lang]['create']; ?>">
                </div>
            </form>
        </div>
    </div>


<?php
if (isset($_POST['save'])) {
    $check = getimagesize($_FILES["logo"]["tmp_name"]);
    if ($check !== false) {
        response(addToGallery($uri[3], $_FILES['logo']), "travel/view/".$uri[4]);
    } else {
        ?>
        <script type="application/javascript">alert("Yuklangan ma'lumot rasm formatida emas!")</script>
        <?php
    }
}
?>