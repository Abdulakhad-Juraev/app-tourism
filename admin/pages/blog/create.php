<?php
global $local_strings;
global $lang;
global $con;
?>
<script src="/admin/editor/ckeditor.js"></script>

<div class="container">
    <form method="post" enctype="multipart/form-data">
        <div class="row mt-4">
            <div class="col-12"><span><? echo $local_strings[$lang]['name']; ?> Uz</span>
                <textarea name="nameUz" class="form-control" id="" rows="1"></textarea>
            </div>
            <div class="col-12"><span><? echo $local_strings[$lang]['name']; ?> Ru</span><textarea name="nameRu" class="form-control" id="" rows="1"></textarea>
            </div>
            <div class="col-12"><span><? echo $local_strings[$lang]['name']; ?> En</span><textarea name="nameEn" class="form-control" id="" rows="1"></textarea>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12"><span><? echo $local_strings[$lang]['description']; ?> Uz</span><textarea name="contentUz" id="blogContentUz" class="form-control"  ></textarea>
            </div>
            <div class="col-12"><span><? echo $local_strings[$lang]['description']; ?> Ru</span><textarea name="contentRu" class="form-control" id="blogContentRu" ></textarea>
            </div>
            <div class="col-12"><span><? echo $local_strings[$lang]['description']; ?> En</span><textarea name="contentEn" class="form-control" id="blogContentEn"></textarea>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-4"><input type="file" class="form-control" name="file"></div>
        </div>

        <div class="col-4 mt-4">
            <a href="/admin/blog" class="btn btn-secondary"><? echo $local_strings[$lang]['cancel'];?></a>
            <button class="btn btn-success" type="submit" name="submit"><? echo $local_strings[$lang]['create'];?></button>
        </div>

        <?php
        if (isset($_POST['submit'])) {
            $nameuz = $_POST['nameUz'];
            $nameru = $_POST['nameRu'];
            $nameen = $_POST['nameEn'];
            $contentuz = $_POST['contentUz'];
            $contentru = $_POST['contentRu'];
            $contenten = $_POST['contentEn'];
            $saveDateTime = date('mdYHis');
            $typeFile = $_FILES['file']['type'];
            $sizeFile = $_FILES['file']['size']/1024;
            $stringEquals = substr($typeFile,0,5);
            $data = $saveDateTime."".$_FILES['file']['name'];

            if ($sizeFile >=10240){
                ?><script>alert('<?=$local_strings[$lang]['photosize'];?>');</script><?
            }
            else if (strcmp($stringEquals,"image")!==0){
                ?><script>alert('<?=$local_strings[$lang]['addphoto'];?>');</script><?
            }
            else{
                $sqlblog = "insert into blog(name_uz,name_ru,name_en,content_uz,content_ru,content_en,photo,vaqt) values ('{$nameuz}','{$nameru}','{$nameen}','{$contentuz}','{$contentru}','{$contenten}','{$data}',NOW())";
                $rblog = mysqli_query($con,$sqlblog);
                move_uploaded_file($_FILES['file']['tmp_name'],"./../uploads/".$data);
                if ($rblog){
                    ?><script>
                        alert('<?=$local_strings[$lang]['saveData'];?>');
                        window.location.href='/admin/blog';
                    </script><?
                }
                else{
                    ?><script>alert('<?=$local_strings[$lang]['saveDataError'];?>');</script><?
                }
            }
        }
        ?>
    </form>
</div>
<script>
    CKEDITOR.replace('blogContentUz');
    CKEDITOR.replace('blogContentRu');
    CKEDITOR.replace('blogContentEn');
</script>