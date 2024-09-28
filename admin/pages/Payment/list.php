<?php
global $local_strings;
global $lang;
global $lang_count;
?>
<table class="table table-hover">
    <thead>
    <tr>
        <th>№</th>
        <th><? echo $local_strings[$lang]['phone']; ?></th>
        <th><? echo $local_strings[$lang]['full_name']; ?></th>
        <th><? echo $local_strings[$lang]['card_number']; ?></th>
        <th><? echo $local_strings[$lang]['count']; ?></th>
        <th><? echo $local_strings[$lang]['action']; ?></th>

    </tr>
    </thead>
    <tbody>
    <?php
    $payments = getAll("payment");

    if ($payments !== null && $payments !== "") {
        $i = 1;
        foreach ($payments as $payment) {
            echo "<tr>";
            echo "<th>".$i++."</th>";
            echo "<td>".$payment['phone']."</td>";
            echo "<td>".$payment['full_name']."</td>";
            echo "<td>".$payment['card_number']."</td>";
            echo "<td>".$payment['count']."</td>";
            echo "<td><a href='/admin/travel/view/".$payment['travel_id']."' class='btn btn-primary mr-1'><i class='fa fa-eye'></i></a>";
            echo "</tr>";
        }
    }
    ?>
    </tbody>
</table>
