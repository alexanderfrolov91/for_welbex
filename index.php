<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>title</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        html, body {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        form {
            margin: 10px;
        }
        .row {
            display: none;
        }
        .page_1 {
            display: table-row;
        }
        #left, #page, #right {
            float: left;
            margin: 5px;
        }
        #left, #right {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form method="POST">
        <select id="column_selection" name="column_selection">
            <option value="title">Название</option>
            <option value="quantity">Количество</option>
            <option value="distance">Расстояние</option>
        </select>
        <select id="selecting_condition" name="selecting_condition">
            <option value="equally">равно</option>
            <option value="contains">содержить</option>
            <option value="more">больше</option>
            <option value="less">меньше</option>
        </select>
        <input type="text" id="search_value" name="search_value" value="" />
        <input type="button" id="button" name="button" value="button" />
    </form>
    <?php
        echo '
        <table border="1">
            <thead>
                <tr>
                    <th>Дата</th>
                    <th>Название</th>
                    <th>Количество</th>
                    <th>Расстояние</th>
                </tr>
            </thead>
            <tbody>';
        $mysqli = new mysqli("localhost", "root", "", "z");
        $result = $mysqli->query("SELECT * FROM `test`;");
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
        $result->close();
        $mysqli->close();
        echo '
            </tbody>
        </table>';
    ?>
    <div id="pagination">
        <div id="left"><</div>
        <div id="page">1</div>
        <div id="right">></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script>
        $('#button').click(function() {
        // $(document).ready(function() {
            let column_selection = $('#column_selection').val();
            let selecting_condition = $('#selecting_condition').val();
            let search_value = $('#search_value').val();
            // alert('column_selection = ' + column_selection + '; selecting_condition = ' + selecting_condition + '; search_value = ' + search_value);
            $.ajax({
                type: "POST",
                url: "select.php",
                data: {
                    fcolumn_selection:column_selection,
                    fselecting_condition:selecting_condition,
                    fsearch_value:search_value,
                },
                success: function(result) {
                    $('tbody').html(result);
                    $('#page').html('1');
                }
            });
        });
    </script>
    <script>

        document.getElementById('left').onclick = function(e) {
            document.getElementById('page').innerText--;
            if (document.getElementById('page').innerText != 0) {
                let page = 'page_' + document.getElementById('page').innerText;
                let row_count = document.getElementsByClassName('row').length;
                for (let i = 0; i < row_count; i++) {
                    document.getElementsByClassName('row')[i].style.display = 'none';
                }
                for (let i = 0; i < row_count; i++) {
                    document.getElementsByClassName(page)[i].style.display = 'table-row';
                }
            } else {
                document.getElementById('page').innerText++;                
            }
        }

        document.getElementById('right').onclick = function(e) {
            document.getElementById('page').innerText++;
            if (document.getElementById('page').innerText < document.getElementsByClassName('row').length / 5 + 1) {
                let page = 'page_' + document.getElementById('page').innerText;
                let row_count = document.getElementsByClassName('row').length;
                for (let i = 0; i < row_count; i++) {
                    document.getElementsByClassName('row')[i].style.display = 'none';
                }
                for (let i = 0; i < row_count; i++) {
                    document.getElementsByClassName(page)[i].style.display = 'table-row';
                }
            } else {
                document.getElementById('page').innerText--;                
            }
        }

    </script>
</body>
</html>