<?php
//#1 Проверить введеный мак адресс на верность. Пример: 02:42:d3:48:08:83

$mac = "02:42:D3:48:08:83";

$expr = "/^([0-9a-fA-f]{2}(:|-)){5}[0-9a-fA-f]{2}$/";

if (preg_match($expr, $mac)){
    echo "Верно";
}else{
    echo "Не верно";
}

//#3Выполнить задачу по проверке сложности пароля с использованием регулярных выражений.
//Пароль считатется сложным если в нем есть символы нижнего, верхнего регистра, числа, спец символы.
echo "<br><hr>\n";

$pass = "I_don't_know_password!1";

$exprArr = ["/[a-z]/",
    "/[A-Z]/",
    "/\d/",
    "/\W/"
];

$i=0;

foreach($exprArr as  $value) {
    if (preg_match($value, $pass)){
        $i++;
    }
}

if ($i ==4){
    echo "Пароль очень хороший";
} else {
    echo "Слабый пароль";
}

//#4 Выполнить поиск IP адресов (например 192.168.0.1) в строке, вернуть массив, оформит как функцию
echo "<br><hr>\n";

function findMeIP ($str) {
    $expr = "/(\d{1,3}.){3}(\d{1,3}.)/";

    $pocket = [];

    preg_match_all($expr, $str, $pocket);

    return $pocket[0];
}


$str = "192.168.0.1 ksghjdksikdjvb  192.42.116.16 smhgfvjsgh 79.128.150.246";

$result = findMeIp($str);

echo $str."<br>\n";
var_dump($result);
?>