<?php
global $local_strings;
global $lang;
global $lang_count;
?>
<table class="table table-hover">
    <thead>
    <tr>
        <th>№</th>
        <th><? echo $local_strings[$lang]['name']; ?></th>
        <th><? echo $local_strings[$lang]['phone']; ?></th>
        <th><? echo $local_strings[$lang]['count']; ?></th>
        <th><? echo $local_strings[$lang]['action']; ?></th>

    </tr>
    </thead>
    <tbody>
    <?php
    $orders = getAll("zakaz");

    if ($orders !== null && $orders !== "") {
        $i = 1;
        foreach ($orders as $order) {
            echo "<tr>";
            echo "<th>" . $i++ . "</th>";
            echo "<td>" . $order['name'] . "</td>";
            echo "<td>" . $order['phone'] . "</td>";
            echo "<td>" . $order['soni'] . "</td>";
            echo "<td><a href='/admin/paket/view/" . $order['paket_id'] . "' class='btn btn-primary mr-1'><i class='fa fa-eye'></i></a>";
            echo "</tr>";
        }
    }
    ?>
    </tbody>
</table>