<?php
// Load additional functions dynamically from a "functions" folder
$functions = array_diff(scandir(get_template_directory() . '/functions'), [
    '.',
    '..',
    '.DS_Store',
]);
foreach ($functions as $function) {
    if (pathinfo($function, PATHINFO_EXTENSION) === 'php') {
        include get_template_directory() . '/functions/' . $function;
    }
}
// Nothing should be below this line! If you want to add more functions, add them to the "functions" folder.