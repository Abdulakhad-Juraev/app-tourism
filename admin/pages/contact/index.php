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
        <th><? echo $local_strings[$lang]['description']; ?></th>
        <th><? echo $local_strings[$lang]['action']; ?></th>

    </tr>
    </thead>
    <tbody>
    <?php
    $contacts = getAll("contact");

    if ($contacts !== null && $contacts !== "") {
        $i = 1;
        foreach ($contacts as $contact) {
            echo "<tr>";
            echo "<th>" . $i++ . "</th>";
            echo "<td>" . $contact['name'] . "</td>";
            echo "<td>" . $contact['tel'] . "</td>";
            echo "<td>" . $contact['content'] . "</td>";
            echo "<td><a href='/admin/contact/view/" . $contact['id'] . "' class='btn btn-primary mr-1'><i class='fa fa-eye'></i></a>";
            echo "<a href='/admin/contact/delete/" . $contact['id'] . "' class='btn btn-danger'><i class='fa fa-trash'></i></a></td>";
            echo "</tr>";
        }
    }
    ?>
    </tbody>
</table>