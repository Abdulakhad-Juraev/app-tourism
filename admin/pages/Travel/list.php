<?php
global $local_strings;
global $lang;
global $lang_count;
?>

<a href="/admin/travel/create" class="btn btn-success my-3">
    <? echo $local_strings[$lang]['create']; ?>
</a>
<table class="table table-hover">
    <thead>
    <tr>
        <th>№</th>
        <?
        if ($lang_count === 1){
            ?><th><? echo $local_strings[$lang]['name']; ?></th><?
        }else {
            ?><th><? echo $local_strings['uz']['name']; ?></th><?
        }
        ?>
        <?
        if ($lang_count >= 3){
            echo "<th>".$local_strings["ru"]['name']."</th>";
            echo "<th>".$local_strings["en"]['name']."</th>";
        }
        ?>
        <th><? echo $local_strings[$lang]['date']; ?></th>
        <th><? echo $local_strings[$lang]['price']; ?></th>
        <th><? echo $local_strings[$lang]['count']; ?></th>
        <th><? echo $local_strings[$lang]['logo']; ?></th>
        <th><? echo $local_strings[$lang]['district']; ?></th>
        <th><? echo $local_strings[$lang]['action']; ?></th>

    </tr>
    </thead>
    <tbody>
    <?php
    $travels = getAll("travel");

    if ($travels !== null && $travels !== "") {
        $i = 1;
        foreach ($travels as $travel) {

            $logo = getAttachmentR($travel['logo']);

            echo "<tr>";
            echo "<th>".$i++."</th>";
            echo "<td>".$travel['name_uz']."</td>";

            if ($lang_count >= 3){
                echo "<td>".$travel['name_ru']."</td>";
                echo "<td>".$travel['name_en']."</td>";
            }

            echo "<td>".$travel['date']."</td>";
            echo "<td>".$travel['price']."</td>";
            echo "<td>".$travel['count']."</td>";
            echo "<td> <img src='/uploads/".$logo['unique_id'].".".$logo['ext']."' class='img-thumbnail' style='height: 50px'> </td>";

            echo "<td>";
            if ($travel['districts'] !== ""){
                foreach (explode(",",$travel['districts']) as $ds){
                    $district = getOne($ds, "district");
                    echo $district['name_'.$lang].", ";
                }
            }
            echo"</td>";

            echo "<td><a href='/admin/travel/view/".$travel['id']."' class='btn btn-primary mr-1'><i class='fa fa-eye'></i></a>";
            echo "<a href='/admin/travel/edit/".$travel['id']."' class='btn btn-warning mr-1'><i class='fa fa-pencil'></i></a>";
            echo "<a href='/admin/travel/delete/".$travel['id']."' class='btn btn-danger'><i class='fa fa-trash'></i></a></td>";
            echo "</tr>";
        }
    }
    ?>
    </tbody>
</table>