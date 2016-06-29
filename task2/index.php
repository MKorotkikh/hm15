<?php

if (isset($_POST["needRed"]) && $_POST['needRed'] == "needRed"){
    $files = glob ("css/*.css");        //массив с именами всех css файлов на сайте
    $expr = "/#([0-9a-f]{6}|[0-9a-f]{3})/i";
    var_dump($files);
    foreach ($files as $value) {        //поочерёдное изменение каждого файла
        $file = fopen($value, "r");
        $file_tmp = tmpfile();          //используем временный файл

        while (!feof($file)) {          // построчно переписуем содержимое файла в временный
            $line = fgets($file);
            $line = preg_replace($expr, "red", $line);
            fwrite($file_tmp, $line);
        }

        fclose($file);                  //закрываем файл и сново его открываем с обрезанием до нулевой длины

        $file = fopen($value, "w+");

        fseek($file_tmp, 0);

        while (!feof($file_tmp)) {      //построчно переписуем содержимое временного файла
            $line = fgets($file_tmp);
            fwrite($file, $line);
        }

        fclose($file);
        fclose($file_tmp);
    }
}



?>
Если вы нажмёте на эту кнопку в css файлах станет больше красного!
<form method="post">
    <input type="submit" name="needRed" value="needRed">
</form>