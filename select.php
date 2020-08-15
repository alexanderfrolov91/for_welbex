<?php
    $column_selection = $_POST['fcolumn_selection'];
    $selecting_condition = $_POST['fselecting_condition'];
    $search_value = $_POST['fsearch_value'];
    $link = mysqli_connect("localhost", "root", "", "z");
    switch ($selecting_condition) {
        case 'equally':
            $query = "SELECT * FROM `test` WHERE `" . $column_selection . "` LIKE '" . $search_value . "';";
            break;
        case 'contains':
            $query = "SELECT * FROM `test` WHERE `" . $column_selection . "` LIKE '%" . $search_value . "%';";
            break;
        case 'more':
            $query = "SELECT * FROM `test` WHERE `" . $column_selection . "` > " . $search_value . ";";
            break;
        case 'less':
            $query = "SELECT * FROM `test` WHERE `" . $column_selection . "` < " . $search_value . ";";
            break;
    }
    $result = mysqli_query($link, "$query;");
    $i = 1;
    $n = 1;
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        echo '<tr class="row page_' . $n . '"><td>' . $row['date'] . '</td>' . '<td>' . $row['title'] . '</td>' . '<td>' . $row['quantity'] . '</td>' . '<td>' . $row['distance'] . '</td></tr>';
        $i++;
        if ($i > 5) {
            $i = 1;
            $n++;
        }
    }
    mysqli_free_result($result);
    mysqli_close($link);
?>