<?php
set_time_limit(0); 
$file = file_get_contents('path of your file');
file_put_contents('file.ext', $file);
?>