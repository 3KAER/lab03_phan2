<?php

echo "Các số lẻ trong khoảng từ 0 đến 100 (sử dụng vòng lặp for):\n";
for ($i = 1; $i <= 100; $i += 2) {
    echo $i . " ";
}

echo "\n\n";
echo "<br>";

echo "Các số lẻ trong khoảng từ 0 đến 100 (sử dụng vòng lặp while):\n";
$i = 1;
while ($i <= 100) {
    echo $i . " ";
    $i += 2;
}

?>
