<?php

global $local_strings;
global $lang;
global $lang_count;
global $uri;

global $con;

$district = getOne($uri[4], "paket");

?>

<script src="/admin/editor/ckeditor.js"></script>
<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <?
                        if ($lang_count === 1) {
                        } else {
                            ?>
                            <div class="col-12">
                                <span><?= $local_strings[$lang]['name']; ?> Uz</span>
                                <input class="form-control my-2" type="text" name="name_uz"
                                       placeholder="<? echo $local_strings['uz']['name']; ?>"
                                       value="<? echo $district['name_uz']; ?>">
                            </div>
                            <?
                        }
                        ?>
                        <?
                        if ($lang_count >= 3) {
                            ?>
                            <div class="col-12"><span><?= $local_strings[$lang]['name']; ?> Ru</span><input
                                        class="form-control my-2" type="text" name="name_ru"
                                        placeholder="<? echo $local_strings['uz']['name']; ?>"
                                        value="<? echo $district['name_ru']; ?>">
                            </div>
                            <div class="col-12"><span><?= $local_strings[$lang]['name']; ?> En</span><input
                                        class="form-control my-2"
                                        type="text" name="name_en" value="<? echo $district['name_en']; ?>"
                                        placeholder="<? echo $local_strings['uz']['name']; ?>">
                            </div>
                            <div class="col-12"><span><?= $local_strings[$lang]['daycount']; ?></span><input
                                        type="number" min="0" value="<?= $district['soni']; ?>"
                                        class="form-control" name="soni"></div>
                            <div class="col-12"><span><?= $local_strings[$lang]['date']; ?></span><input type="number"
                                                                                                         min="0"
                                                                                                         value="<?= $district['kun']; ?>"
                                                                                                         class="form-control"
                                                                                                         name="kun">
                            </div>
                            <div class="col-12"><span><?= $local_strings[$lang]['price']; ?></span><input type="number"
                                                                                                          min="0"
                                                                                                          value="<?= $district['narx']; ?>"
                                                                                                          class="form-control"
                                                                                                          name="narx">
                            </div>
                            <div class="col-12 mb-5"><span><?= $local_strings[$lang]['discount']; ?></span><input
                                        type="number" min="0"
                                        value="<?= $district['chegirma']; ?>"
                                        class="form-control" name="chegirma">
                            </div>
                            <div class="col-12"><span><?= $local_strings[$lang]['description']; ?> Uz</span><textarea
                                        rows="5" class="form-control my-2"
                                        type="search" name="content_uz" id="paketEditContentUz"
                                        placeholder="<? echo $local_strings['uz']['name']; ?>"><? echo $district['content_uz']; ?></textarea>
                            </div>
                            <div class="col-12"><span><?= $local_strings[$lang]['description']; ?> Ru</span><textarea
                                        rows="5" class="form-control my-2"
                                        type="search" name="content_ru" id="paketEditContentRu"
                                        placeholder="<? echo $local_strings['uz']['name']; ?>"><? echo $district['content_ru']; ?></textarea>
                            </div>
                            <div class="col-12"><span><?= $local_strings[$lang]['description']; ?> En</span><textarea
                                        rows="5" class="form-control my-2"
                                        type="search" name="content_en" id="paketEditContentEn"
                                        placeholder="<? echo $local_strings['uz']['name']; ?>"><? echo $district['content_en']; ?></textarea>
                            </div>
                            <div class="col-12"><span><?= $local_strings[$lang]['district']; ?></span><input
                                        class="form-control my-2"
                                        type="text" name="region" value="<? echo $district['content_en']; ?>"
                                        placeholder="<? echo $local_strings['uz']['district']; ?>">
                            </div>
                            <div class="col-12"><span><?= $local_strings[$lang]['link']; ?></span><input
                                        class="form-control my-2"
                                        type="text" name="link" placeholder="<? echo $local_strings['uz']['name']; ?>"
                                        value="<? echo $district['link']; ?>">
                            </div>

                            <div class="col-2 mt-2">
                                <img src='/uploads/<?= $district['photo']; ?>' class='img-thumbnail'>
                            </div>
                            <div class="col-2 mt-2">
                                <img src='/uploads/<?= $district['photo2']; ?>' class='img-thumbnail'>
                            </div>
                            <div class="col-2 mt-2">
                                <img src='/uploads/<?= $district['photo3']; ?>' class='img-thumbnail'>
                            </div>
                            <div class="col-2 mt-2">
                                <img src='/uploads/<?= $district['photo4']; ?>' class='img-thumbnail'>
                            </div>
                            <div class="col-2 mt-2">
                                <img src='/uploads/<?= $district['photo5']; ?>' class='img-thumbnail'>
                            </div>


                            <?
                        }
                        ?>

                    </div>
                    <div class="row">
                        <div class="col">
                            <p>
                                <a class="btn btn-danger mt-4" data-toggle="collapse" href="#collapseExample"
                                   role="button"
                                   aria-expanded="false" aria-controls="collapseExample">
                                    <?= $local_strings[$lang]['addphoto']; ?>
                                </a>

                            </p>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body" style="height: 200px;">
                                    <div class="row mt-4">
                                        <div class="col-2">
                                            <style>
                                                .inputFile {
                                                    position: relative;
                                                    display: inline-block;
                                                    cursor: pointer;
                                                }

                                                .inputFile input {
                                                    display: none;
                                                }

                                                .inputFile-custom {

                                                    text-align: left;
                                                    position: absolute;
                                                    top: 0;
                                                    right: 0;
                                                    left: 0;
                                                    z-index: 5;
                                                    height: 0rem;
                                                    line-height: 1.5;
                                                    color: #444;
                                                    background-color: #f1f1f1;
                                                    border: 0px solid #ddd;
                                                    border-radius: 3px;
                                                    box-shadow: inset 0 .5px .5px rgba(0, 0, 0, .05);
                                                    user-select: none;

                                                }

                                                .inputFile-custom:before {
                                                    position: absolute;
                                                    top: -5px;
                                                    left: 100px;
                                                    bottom: -1px;
                                                    z-index: 6;
                                                    display: block;
                                                    content: "";
                                                    text-align: center;
                                                    background: url("../../../img/iconImport.svg") #d3394c;
                                                    background-size: 50% 50%;
                                                    background-position: center center;
                                                    background-repeat: no-repeat;
                                                    height: 100px;
                                                    width: 100px;
                                                    padding: .5rem 1rem;
                                                    line-height: 1.5;
                                                    color: #f1f1f1;
                                                    border: 1px solid #d3394c;
                                                    border-radius: 50%;
                                                }
                                            </style>
                                            <label class="inputFile">
                                                <span class="inputFile-custom></span>
                                                <input type=" file" id="file" name="file1">
                                            </label>

                                        </div>
                                        <div class="col-2">
                                            <label class="inputFile">
                                                <span class="inputFile-custom"></span>
                                                <input type="file" id="file" name="file2">
                                            </label>

                                        </div>
                                        <div class="col-2">
                                            <label class="inputFile">
                                                <span class="inputFile-custom"></span>
                                                <input type="file" id="file" name="file3">
                                            </label>
                                        </div>
                                        <div class="col-2">
                                            <label class="inputFile">
                                                <span class="inputFile-custom"></span>
                                                <input type="file" id="file" name="file4">
                                            </label>

                                        </div>
                                        <div class="col-2">
                                            <label class="inputFile ">
                                                <span class="inputFile-custom "></span>
                                                <input type="file" id="file" name="file5">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="/admin/<? echo $uri[2]; ?>"
                       class="btn btn-secondary mt-3"><? echo $local_strings[$lang]['cancel']; ?></a>
                    <input name="submit" type="submit" class="btn btn-success mt-3"
                           value="<? echo $local_strings[$lang]['update']; ?>">
                </div>

            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $nameuz = $_POST['name_uz'];
    $nameru = $_POST['name_ru'];
    $nameen = $_POST['name_en'];

    $soni = $_POST['soni'];
    $kun = $_POST['kun'];
    $narx = $_POST['narx'];
    $chegirma = $_POST['chegirma'];

    $contentuz = $_POST['content_uz'];
    $contentru = $_POST['content_ru'];
    $contenten = $_POST['content_en'];
    $link = $_POST['link'];

    $file1 = $_FILES['file1'];
    $file2 = $_FILES['file2'];
    $file3 = $_FILES['file3'];
    $file4 = $_FILES['file4'];
    $file5 = $_FILES['file5'];
    $typeFile1 = $_FILES['file1']['type'];
    $sizeFile1 = $_FILES['file1']['size'] / 1024;
    $stringEquals1 = substr($typeFile1, 0, 5);
    $data1 = $_FILES['file1']['name'];

    $typeFile2 = $_FILES['file2']['type'];
    $sizeFile2 = $_FILES['file2']['size'] / 1024;
    $stringEquals2 = substr($typeFile2, 0, 5);
    $data2 = $_FILES['file2']['name'];

    $typeFile3 = $_FILES['file3']['type'];
    $sizeFile3 = $_FILES['file3']['size'] / 1024;
    $stringEquals3 = substr($typeFile3, 0, 5);
    $data3 = $_FILES['file3']['name'];

    $typeFile4 = $_FILES['file4']['type'];
    $sizeFile4 = $_FILES['file4']['size'] / 1024;
    $stringEquals4 = substr($typeFile4, 0, 5);
    $data4 = $_FILES['file4']['name'];

    $typeFile5 = $_FILES['file5']['type'];
    $sizeFile5 = $_FILES['file5']['size'] / 1024;
    $stringEquals5 = substr($typeFile3, 0, 5);
    $data5 = $_FILES['file5']['name'];

    if ($sizeFile1 >= 10240) {
        ?>
        <script>alert('<?=$local_strings[$lang]['photosize'];?>');</script><?
    } else if ($sizeFile2 >= 10240) {
        ?>
        <script>alert('<?=$local_strings[$lang]['photosize'];?>');</script><?
    } else if ($sizeFile3 >= 10240) {
        ?>
        <script>alert('<?=$local_strings[$lang]['photosize'];?>');</script><?
    } else if ($sizeFile4 >= 10240) {
        ?>
        <script>alert('<?=$local_strings[$lang]['photosize'];?>');</script><?
    } else if ($sizeFile5 >= 10240) {
        ?>
        <script>alert('<?=$local_strings[$lang]['photosize'];?>');</script><?
    } else if ($sizeFile1 != 0 && strcmp($stringEquals1, "image") !== 0) {
        ?>
        <script>alert('<?=$local_strings[$lang]['uploadphoto'];?>');</script><?
    } else if ($sizeFile2 != 0 && strcmp($stringEquals2, "image") !== 0) {
        ?>
        <script>alert('<?=$local_strings[$lang]['uploadphoto'];?>');</script><?
    } else if ($sizeFile3 != 0 && strcmp($stringEquals3, "image") !== 0) {
        ?>
        <script>alert('<?=$local_strings[$lang]['uploadphoto'];?>');</script><?
    } else if ($sizeFile2 != 0 && strcmp($stringEquals4, "image") !== 0) {
        ?>
        <script>alert('<?=$local_strings[$lang]['uploadphoto'];?>');</script><?
    } else if ($sizeFile2 != 0 && strcmp($stringEquals5, "image") !== 0) {
        ?>
        <script>alert('<?=$local_strings[$lang]['uploadphoto'];?>');</script><?
    } else {
        if ($sizeFile1 > 0) {
            $sqlpaket = "update paket set name_uz = '{$nameuz}', 
                                        name_ru='{$nameru}',
                                        name_en='{$nameen}',
                                        soni='{$soni}',
                                        kun='{$kun}',
                                        narx='{$narx}',
                                        chegirma='{$chegirma}',
                                        content_uz='{$contentuz}',
                                        content_ru='{$contentru}',
                                        content_en='{$contenten}',
                 link='{$link}',                       
                 photo='{$data1}',
                                        photo2='{$data2}',
                                        photo3='{$data3}',
                                        photo4='{$data4}',
                                        photo5='{$data5}',
                                        vaqt=NOW() where id ={$district['id']} ";
            $rpaket = mysqli_query($con, $sqlpaket) or die(mysqli_error($con));
            move_uploaded_file($_FILES['file1']['tmp_name'], "./../uploads/" . $data1);
            move_uploaded_file($_FILES['file2']['tmp_name'], "./../uploads/" . $data2);
            move_uploaded_file($_FILES['file3']['tmp_name'], "./../uploads/" . $data3);
            move_uploaded_file($_FILES['file4']['tmp_name'], "./../uploads/" . $data4);
            move_uploaded_file($_FILES['file5']['tmp_name'], "./../uploads/" . $data5);
            if ($rpaket) {
                ?>
                <script>alert('<?=$local_strings[$lang]['updatedData'];?>');
                    window.location.href = "/admin/paket";
                </script><?
            } else {
                ?>
                <script>alert('<?=$local_strings[$lang]['updatedDataError'];?>');</script><?
            }
        } else {
            $sqlpaket = "update paket set name_uz = '{$nameuz}', 
                                        name_ru='{$nameru}',
                                        name_en='{$nameen}',
                                        soni='{$soni}',
                                        kun='{$kun}',
                                        narx='{$narx}',
                                        chegirma='{$chegirma}',
                                        content_uz='{$contentuz}',
                                        content_ru='{$contentru}',
                                        content_en='{$contenten}',
                                        link='{$link}',
                                        vaqt=NOW() where id ={$district['id']} ";
            $rpaket = mysqli_query($con, $sqlpaket) or die(mysqli_error($con));
            if ($rpaket) {
                ?>
                <script>alert('<?=$local_strings[$lang]['updatedData'];?>');
                    window.location.href = "/admin/paket";
                </script><?
            } else {
                ?>
                <script>alert('<?=$local_strings[$lang]['updatedData'];?>');</script><?
            }
        }
    }
}

?>


<script>
    CKEDITOR.replace('paketEditContentUz');
    CKEDITOR.replace('paketEditContentRu');
    CKEDITOR.replace('paketEditContentEn');
</script>
