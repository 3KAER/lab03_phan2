<?php

$rows = 7;
$cols = 7;

echo "<style>
    table {
        border-collapse: collapse;
        width: 20%; /* Đặt chiều rộng của bảng */
        background-color: yellow;
        margin: 0 auto; /* Căn giữa bảng */
    }
    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }
</style>";

echo "<table>";

for ($i = 1; $i <= $rows; $i++) {
    echo "<tr>";
    for ($j = 1; $j <= $cols; $j++) {
        $value = $i * $j;
        echo "<td>$value</td>";
    }
    echo "</tr>";
}

echo "</table>";

?>
