<?php

global $uri;
global $local_strings;
global $lang;
?>

<div class="container mt-5">
    <div class="row">
        <div class="col text-center align-items-center">
            <h4><? echo $local_strings[$lang]['delete_phrase']; ?></h4>
            <form method="post" class="pt-3">
                <a class="btn btn-secondary" href="/admin/<? echo $uri[2];?>"><? echo $local_strings[$lang]['cancel']; ?></a>
                <input class="btn btn-danger mx-1" type="submit" name="delete" value="<? echo $local_strings[$lang]['delete']; ?>">
            </form>
        </div>
    </div>
</div>

<?php

if (isset($_POST['delete'])){
    response(delete($uri[4],$uri[2]),$uri[2]);
}

?>