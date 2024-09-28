<?php

global $local_strings;
global $lang;
global $lang_count;
global $uri;

$district = getOne($uri[4], "blog");
$logo = getAttachmentR($district['photo']);
global $con;

?>

<script src="/admin/editor/ckeditor.js"></script>
<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <?
                    if ($lang_count === 1) {
                    } else {
                        ?><input class="form-control my-2" type="search" name="name_uz"
                                 value="<? echo $district['name_uz']; ?>"
                                 placeholder="<? echo $local_strings[$lang]['name']; ?> Uz"><?
                    }
                    ?>
                    <?
                    if ($lang_count >= 3) {
                        ?>
                        <input class="form-control my-2" type="search" name="name_ru"
                               value="<? echo $district['name_ru']; ?>"
                               placeholder="<? echo $local_strings[$lang]['name']; ?> Ru">

                        <input class="form-control my-2" type="search" name="name_en"
                               value="<? echo $district['name_en']; ?>"
                               placeholder="<? echo $local_strings[$lang]['name']; ?> En">
                        <textarea class="form-control my-2" name="content_uz"
                                  placeholder="<? echo $local_strings[$lang]['description']; ?> Uz" id="blogEditContentUz"><? echo $district['content_uz']; ?></textarea>
                        <textarea class="form-control my-2" name="content_ru"
                                  placeholder="<? echo $local_strings["ru"]['description']; ?> Ru" id="blogEditContentRu"><? echo $district['content_ru']; ?></textarea>
                        <textarea class="form-control my-2" name="content_en"
                                  placeholder="<? echo $local_strings["en"]['description']; ?> En" id="blogEditContentEn"><? echo $district['content_en']; ?></textarea>

                        <div class="row mb-3">
                            <div class="col-6 d-flex align-items-center">
                                <input type="file" class="form-control my-2" name="photo"
                                       placeholder="<? echo $local_strings[$lang]['logo']; ?>">
                            </div>
                            <div class="col-6">
                                <span><? echo $local_strings[$lang]['photo'];?></span>
                                <img src='/uploads/<?= $district['photo'];?>'class='img-thumbnail'>
                            </div>

                        </div>
                        <?
                    }
                    ?>

                    <a href="/admin/<? echo $uri[2]; ?>"
                       class="btn btn-secondary"><? echo $local_strings[$lang]['cancel']; ?></a>
                    <input name="save" type="submit" class="btn btn-success"
                           value="<? echo $local_strings[$lang]['update']; ?>">
                </div>

            </form>
        </div>
    </div>
</div>

<?php
//if (isset($_POST['save'])){
//    $_POST = str_replace("'","`",$_POST);
//    if ($_FILES!=null){
//        response(editBlog($_POST,$_FILES['photo']),"blog");
//    }
//    else{
//        response(editBlog2($_POST),"blog");
//    }
//}


if (isset($_POST['save'])) {
    $nameuz = $_POST['name_uz'];
    $nameru = $_POST['name_ru'];
    $nameen = $_POST['name_en'];
    $contentuz = $_POST['content_uz'];
    $contentru = $_POST['content_ru'];
    $contenten = $_POST['content_en'];
    $photo = $_FILES['photo'];
    $saveDateTime = date('mdYHis');
    $typeFile = $_FILES['photo']['type'];
    $sizeFile = $_FILES['photo']['size'] / 1024;
    $stringEquals = substr($typeFile, 0, 5);
    $data = $saveDateTime . "" . $_FILES['photo']['name'];

    if ($sizeFile >= 10240) {
        ?>
        <script>alert('<?=$local_strings[$lang]['photosize'];?>');</script><?
    } else {
       if ($_FILES['photo']['size'] == 0) {
            $sqlblog = "update blog set name_uz = '{$nameuz}',name_ru = '{$nameru}',name_en = '{$nameen}',content_uz= '{$contentuz}',content_ru = '{$contentru}',content_en = '{$contenten}' where id = {$district['id']}";
            $rblog = mysqli_query($con, $sqlblog);
            if ($rblog) {
                ?>
                <script>
                    alert('<?=$local_strings[$lang]['updatedData'];?>');
                    window.location.href="/admin/blog";
                </script><?
            } else {
                ?>
                <script>alert('<?=$local_strings[$lang]['updatedDataError'];?>');</script><? //
            }
        } else {

            if (strcmp($stringEquals, "image") !== 0) {
                ?>
                <script>alert('<?=$local_strings[$lang]['photoFormatError'];?>');</script><?
            } else {

                $sqlblog = "update blog set name_uz = '{$nameuz}',name_ru = '{$nameru}',name_en = '{$nameen}',content_uz= '{$contentuz}',content_ru = '{$contentru}',content_en = '{$contenten}',photo = '{$data}' where id = {$district['id']}";
                $rblog = mysqli_query($con, $sqlblog);
                move_uploaded_file($_FILES['photo']['tmp_name'], "./../uploads/" . $data);
                if ($rblog) {
                    ?>
                    <script>alert('<?=$local_strings[$lang]['updatedData'];?>');
                        window.location.href="/admin/blog";
                    </script><?
                } else {
                    ?>
                    <script>alert('<?=$local_strings[$lang]['updatedDataError'];?>');</script><?
                }
            }
        }

    }
}
?>

<script>
    CKEDITOR.replace('blogEditContentUz');
    CKEDITOR.replace('blogEditContentRu');
    CKEDITOR.replace('blogEditContentEn');
</script>