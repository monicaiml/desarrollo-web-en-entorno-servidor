<?php

for ($i = 1; $i <= 100; $i++) {
    echo $i;

    if ($i < 100) {
        echo ",";
    }
}

echo " <br> <br>";

$i = 10;
while ($i >= 0) {
    echo $i;

    if ($i > 0) {
        echo "-";
    }

    $i--;
}
