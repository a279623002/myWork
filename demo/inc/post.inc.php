<?php
echo 'curl yes';
if (empty($_FILES)) {
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
} else {
    echo '<pre>';
    print_r($_FILES);
    echo '</pre>';
}