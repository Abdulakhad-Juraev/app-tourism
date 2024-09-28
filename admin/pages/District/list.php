<?php
global $local_strings;
global $lang;
global $lang_count;
?>

<a href="/admin/district/create" class="btn btn-success my-3">
    <? echo $local_strings[$lang]['create']; ?>
</a>
<table class="table table-hover">
    <thead>
    <tr>
        <th>№</th>
        <th>Nomi</th>
        <th>Telefon raqam</th>
        <th>Matn</th>
        <th><? echo $local_strings[$lang]['action']; ?></th>

    </tr>
    </thead>
    <tbody>
    <?php
    $contacts = getAll("district");

    if ($contacts !== null && $contacts !== "") {
        $i = 1;
        foreach ($contacts as $district) {
            echo "<tr>";
            echo "<th>" . $i++ . "</th>";
            echo "<td>" . $district['name_uz'] . "</td>";
            echo "<td>" . $district['name_ru'] . "</td>";
            echo "<td>" . $district['name_en'] . "</td>";
            echo "<td>" . $district['type'] . "</td>";
            echo "<td><a href='/admin/district/view/' class='btn btn-primary mr-1'><i class='fa fa-eye'></i></a>";
            echo "<a href='/admin/district/edit/' class='btn btn-warning mr-1'><i class='fa fa-pencil'></i></a>";
            echo "<a href='/admin/district/delete/" . $district['id'] . "' class='btn btn-danger'><i class='fa fa-trash'></i></a></td>";
            echo "</tr>";
        }
    }
    ?>
    </tbody>
</table>