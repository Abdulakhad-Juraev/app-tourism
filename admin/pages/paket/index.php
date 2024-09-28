<?php
global $local_strings;
global $lang;
global $lang_count;
?>

<a href="/admin/paket/create" class="btn btn-success my-3">
    <? echo $local_strings[$lang]['create']; ?>
</a>
<table class="table table-hover">
    <thead>
    <tr>
        <th>№</th>
        <th><?=$local_strings[$lang]['name'];?> <?=$lang;?></th>
        <th><?=$local_strings[$lang]['daycount'];?></th>
        <th><?=$local_strings[$lang]['price'];?></th>
        <th><?=$local_strings[$lang]['discount'];?></th>
        <th><?=$local_strings[$lang]['description'];?> <?=$lang;?></th>
        <th><?=$local_strings[$lang]['photo'];?></th>
        <th><?=$local_strings[$lang]['date'];?></th>
        <th><? echo $local_strings[$lang]['action']; ?></th>

    </tr>
    </thead>
    <tbody>
    <?php
    $pakets = getAll("paket");

    if ($pakets !== null && $pakets !== "") {
        $i = 1;
        foreach ($pakets as $paket) {
            echo "<tr>";
            echo "<th>" . $i++ . "</th>";
            echo "<td>" .substr($paket['name_'.$lang], 0, 25) ."...</td>";
            echo "<td>" . $paket['soni'] . "</td>";
            echo "<td>" . $paket['narx'] . "</td>";
            echo "<td>" . $paket['chegirma'] . "</td>";
            echo "<td>" .substr($paket['content_'.$lang], 0, 25) ."...</td>";
            echo "<td> <img src='/uploads/".$paket['photo']."'class='img-thumbnail' style='height: 50px'> </td>";

            $date = date_create($paket['vaqt']);
            echo "<td>". date_format($date, "d-m-Y")."</td>";
            echo "<td><a href='/admin/paket/view/" . $paket['id'] . "' class='btn btn-primary mr-1'><i class='fa fa-eye'></i></a>";
            echo "<a href='/admin/paket/edit/" . $paket['id'] . "' class='btn btn-warning mr-1'><i class='fa fa-pencil'></i></a>";
            echo "<a href='/admin/paket/delete/" . $paket['id'] . "' class='btn btn-danger'><i class='fa fa-trash'></i></a></td>";
            echo "</tr>";
        }
    }
    ?>
    </tbody>
</table>