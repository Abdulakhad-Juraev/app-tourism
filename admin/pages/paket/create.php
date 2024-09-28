<?php
global $local_strings;
global $lang;
global $con;
//global $uri;
?>
<script src="/admin/editor/ckeditor.js"></script>
<div class="container">
    <form method="post" enctype="multipart/form-data">
        <div class="row mt-4">
            <div class="col-12"><span><? echo $local_strings[$lang]['name']; ?> Uz</span>
                <input type="text" name="nameUz" class="form-control">
            </div>
            <div class="col-12"><span><? echo $local_strings[$lang]['name']; ?> Ru</span><input type="text" name="nameRu" class="form-control">
            </div>
            <div class="col-12"><span><? echo $local_strings[$lang]['name']; ?> En</span><input type="text" name="nameEn" class="form-control" >
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12"><span><? echo $local_strings[$lang]['count']; ?></span><input type="number" min="0" name="soni" class="form-control" placeholder="0">
            </div>
            <div class="col-12"><span><? echo $local_strings[$lang]['date']; ?></span><input type="number" min="0" name="kun" class="form-control" placeholder="0"></div>
            <div class="col-12"><span><? echo $local_strings[$lang]['price']; ?></span><input type="number" min="0" name="narx" class="form-control" placeholder="0">
            </div>
            <div class="col-12"><span><? echo $local_strings[$lang]['discount']; ?></span><input type="number" min="0" name="chegirma" class="form-control"
                                                           placeholder="0">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12"><span><? echo $local_strings[$lang]['description']; ?> Uz</span><textarea name="contentUz" class="form-control" id="paketContentUz"
                                                                rows="5"></textarea>
            </div>
            <div class="col-12"><span><? echo $local_strings[$lang]['description']; ?> Ru</span><textarea name="contentRu" class="form-control" id="paketContentRu"
                                                                rows="5"></textarea>
            </div>
            <div class="col-12"><span><? echo $local_strings[$lang]['description']; ?> En</span><textarea name="contentEn" class="form-control" id="paketContentEn"
                                                                rows="5"></textarea>
            </div>
            <div class="col-12 mt-4"><span><? echo $local_strings[$lang]['district']; ?></span>
                <input type="text" name="region" class="form-control">
            </div>
            <div class="col-12 mt-4"><span><? echo $local_strings[$lang]['link']; ?></span>
                <input type="text" name="link" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>
                    <a class="btn btn-danger mt-4" data-toggle="collapse" href="#collapseExample" role="button"
                       aria-expanded="false" aria-controls="collapseExample">
                        <? echo $local_strings[$lang]['addphoto']; ?>
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
                                    <span class="inputFile-custom" style=""></span>
                                    <input type="file" id="file" name="file1" required>
                                </label>

                            </div>
                            <div class="col-2">
                                <label class="inputFile">
                                    <span class="inputFile-custom"></span>
                                    <input type="file" id="file" name="file2" required>
                                </label>

                            </div>
                            <div class="col-2">
                                <label class="inputFile">
                                    <span class="inputFile-custom"></span>
                                    <input type="file" id="file" name="file3" required>
                                </label>
                            </div>
                            <div class="col-2">
                                <label class="inputFile">
                                    <span class="inputFile-custom"></span>
                                    <input type="file" id="file" name="file4" required>
                                </label>

                            </div>
                            <div class="col-2">
                                <label class="inputFile ">
                                    <span class="inputFile-custom "></span>
                                    <input type="file" id="file" name="file5" required>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 mt-2" style="margin-left: -15px;">
            <a href="/admin/paket" class="btn btn-secondary"><? echo $local_strings[$lang]['cancel']; ?></a>
            <button class="btn btn-success" type="submit" name="submit"><? echo $local_strings[$lang]['create']; ?></button>
        </div>

        <?
        if (isset($_POST['submit'])) {
            $nameuz = $_POST['nameUz'];
            $nameru = $_POST['nameRu'];
            $nameen = $_POST['nameEn'];

            $soni = $_POST['soni'];
            $kun = $_POST['kun'];
            $narx = $_POST['narx'];
            $chegirma = $_POST['chegirma'];

            $contentuz = $_POST['contentUz'];
            $contentru = $_POST['contentRu'];
            $contenten = $_POST['contentEn'];

            $link = $_POST['link'];

            $file1 = $_FILES['file1'];
            $file2 = $_FILES['file2'];
            $file3 = $_FILES['file3'];
            $file4 = $_FILES['file4'];
            $file5 = $_FILES['file5'];

            $region = $_POST['region'];

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
                <script>('<?=$local_strings[$lang]['photosize'];?>');</script><?
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
            } else if (strcmp($stringEquals1, "image") !== 0) {
                ?>
                <script>alert('<?=$local_strings[$lang]['photosize'];?>');</script><?
            } else if (strcmp($stringEquals2, "image") !== 0) {
                ?>
                <script>alert('<?=$local_strings[$lang]['photosize'];?>');</script><?
            } else if (strcmp($stringEquals3, "image") !== 0) {
                ?>
                <script>alert('<?=$local_strings[$lang]['photosize'];?>');</script><?
            } else if (strcmp($stringEquals4, "image") !== 0) {
                ?>
                <script>alert('<?=$local_strings[$lang]['photosize'];?>');</script><?
            } else if (strcmp($stringEquals5, "image") !== 0) {
                ?>
                <script>alert('<?=$local_strings[$lang]['photosize'];?>');</script><?
            } else {
               $sqlpaket = "insert into paket(name_uz,name_ru,name_en,soni,kun,narx,chegirma,content_uz,content_ru,content_en,link,photo,photo2,photo3,photo4,photo5,region,vaqt) 
                                          values ('{$nameuz}','{$nameru}','{$nameen}','{$soni}','{$kun}','{$narx}','{$chegirma}','{$contentuz}','{$contentru}','{$contenten}',{$link},'{$data1}','{$data2}','{$data3}','{$data4}','{$data5}','{$region}',NOW())";
                $rpaket = mysqli_query($con, $sqlpaket) or die(mysqli_error($con));
                move_uploaded_file($_FILES['file1']['tmp_name'], "./../uploads/" . $data1);
                move_uploaded_file($_FILES['file2']['tmp_name'], "./../uploads/" . $data2);
                move_uploaded_file($_FILES['file3']['tmp_name'], "./../uploads/" . $data3);
                move_uploaded_file($_FILES['file4']['tmp_name'], "./../uploads/" . $data4);
                move_uploaded_file($_FILES['file5']['tmp_name'], "./../uploads/" . $data5);
                if ($rpaket) {
                    ?>
                    <script>alert('<?=$local_strings[$lang]['saveData'];?>');
                    window.location.href='/admin/paket'</script><?
                } else {
                    ?>
                    <script>alert('<?=$local_strings[$lang]['saveDataError'];?>');</script><?
                }
            }
        }
        ?>

    </form>
</div>
<script>
    CKEDITOR.replace('paketContentUz');
    CKEDITOR.replace('paketContentRu');
    CKEDITOR.replace('paketContentEn');
</script>
