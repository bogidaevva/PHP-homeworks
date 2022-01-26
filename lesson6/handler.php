<?php

// $_FILES ['имя инпута']:  {
//     'name' => ['имя первого файла', 'имя второго файла'],
//     'type' => ['тип первого файла', 'тип второго файла'],
//     'size' => [...],
//     'tmp_name' => [...],
//     'error' => [...]
// }

// $files['pictures']['name'][0];
// $files['pictures']['name'][1];

function find_load_error($file) {
    if ($file['error'] == 0) {
        return true;
    } else {
        return false;
    }   
};

function find_type_error($file) {
    $valid_formats = ['image/jpeg', 'image/png', 'image/gif'];
    if (in_array($file['type'], $valid_formats)) {
        return true;
    } else {
        return false;
    }    
};

function find_size_error($file) {
    if ($file['size'] <= 500000) {
        return true;
    } else {
        return false;
    }
}; 

function show_error_message($file) {
    $error_code = $file['error'];
    $file_name = $file['name'];
    if ($error_code > 0 && $error_code < 3) {
        echo "Размер файла $file_name превышает максимально допустимый.";
    } elseif ($error_code > 2) {
        echo "Во время загрузки файла $file_name произошла ошибка, повторите попытку позже.";
    }
};

$move_permanent_dir = function($file_array) {
    foreach ($file_array as $file) {
        $file_name = $file['name'];
        $new_file_name = microtime() . $file_name;

        if (find_load_error($file)) {
            if (find_type_error($file) && find_size_error($file)) {
                if (move_uploaded_file($file['tmp_name'], "pictures/$new_file_name")) {
                    echo "Файл $file_name успешно загружен!";
                } else {
                    show_error_message($file);
                }
            } else {
                if (!find_type_error($file)) {
                    echo "Тип загружаемого файла $file_name не соответсвует условию.";
                } elseif (!find_size_error($file)) {
                    echo "Размер загружаемого файла $file_name не соответсвует условию.";
                }
            }
        } else {
            show_error_message($file);
        }
    }
};

function reArrayFiles(&$file_post)
{
    $file_array = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i = 0; $i < $file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_array[$i][$key] = $file_post[$key][$i];
        }
    }
    return $file_array;
}

if (isset($_FILES['pictures'])) {
    $file_array = reArrayFiles($_FILES['pictures']);
}

$move_permanent_dir($file_array);