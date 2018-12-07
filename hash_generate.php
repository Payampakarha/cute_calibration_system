<?php

$word = 'shifter';

$hashed    = password_hash($word, PASSWORD_DEFAULT);

echo $hashed;

?>
