
<html>
<head>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<table>
    <tr>
        <td>Выходные данные</td>
        <td>Ответ программы</td>
        <td>Ответ из файла</td>
        <td>Совпадает?</td>
    </tr>
    <?php
    include 'Banner.php';
    // для каждого файла
    for ($k = 1; $k < 12; $k++):
        $fileNumber = $k;
        if ($k <= 9) {
            $fileNumber = '0' . $k;
        }
        $ansName = "0" . $fileNumber . ".ans";
        $datName = "0" . $fileNumber . ".dat";
        $ans =  htmlentities(file_get_contents("D\\" . $ansName));
        $dat =  htmlentities(file_get_contents("D\\" . $datName));

        $ans = str_replace("\n", "<br>", $ans); // данные из файла ответов
        $dat = str_replace("\n", "<br>", $dat); // данные из файла тестов

        $content = file_get_contents("D\\" . $datName, FILE_IGNORE_NEW_LINES);

        $banners = array();

        $fileResult = "";

        $content = str_replace("\n", "", $content);
        $content = str_replace(" ", "", $content);
        $content = str_replace(";", "", $content);
        $content = str_replace(":0px", ":0", $content);

        $content = preg_replace("/\/\*.*\*\//", "", $content);


        if (preg_replace('/#(.)\1\1\1(.)\3/', '#\\1\\1\\3', $content) != null) {
            $content = preg_replace('/#(.)\1\1\1(.)\3/', '#\\1\\1\\3', $content);
        }
        if (preg_replace('/#(.)\1(.)\2\2\2/', '#\\1\\2\\2', $content) != null) {
            $content = preg_replace('/#(.)\1(.)\2\2\2/', '#\\1\\2\\2', $content);
        }
        if ( preg_replace('/#(.)\1(.)\2\1\1/', '#\\1\\2\\1', $content) != null) {
            $content = preg_replace('/#(.)\1(.)\2\1\1/', '#\\1\\2\\1', $content);
        }
        if (preg_replace('/#(.)\1(.)\2(.)\3/', '#\\1\\2\\3', $content) != null) {
            $content = preg_replace('/#(.)\1(.)\2(.)\3/', '#\\1\\2\\3', $content);
        }

        $content = str_replace("#CD853F", "peru", $content);
        $content = str_replace("#FFC0CB", "pink", $content);
        $content = str_replace("#DDA0DD", "plum", $content);
        $content = str_replace("#F00", "red", $content);
        $content = str_replace("#FFFAFA", "snow", $content);
        $content = str_replace("#D2B48C", "tan", $content);




        if ($content == $ans) {
            $check = "Да";
        }
        else {
            $check = "Нет";
        }
        ?>
        <tr>
            <td><?=$dat?></td>
            <td><?=$content?></td>
            <td><?=$ans?></td>
            <td><?=$check?></td>
        </tr>
    <?php endfor;
    ?>
</table>
</body>
</html>
