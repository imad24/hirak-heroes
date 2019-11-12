<?php
$files = scandir('images/');
foreach($files as $file) {
    if (endsWith($file, ".jpg") || endsWith($file,".jpeg"){
        echo($file);
    }
}
}


function endsWith($haystack, $needle)
{
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }

    return (substr($haystack, -$length) === $needle);
}

?>