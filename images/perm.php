<?php
echo substr(sprintf('%o', fileperms('perm.php')), -4);
if(!chmod("./img/", 0777)) die("Can't");
?>