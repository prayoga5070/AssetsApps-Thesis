<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('upload_file')) {
    function upload_file($name, $path, $encryptName = true, $allowed_types = 'gif|jpg|png|jpeg|doc|docx|pdf|xls|xlsx', $maxSize = 5)
    {
        $CI = &get_instance();
        $CI->load->library('upload');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $realName = $_FILES[$name]['name'];
        $_FILES[$name]['name'] = $_FILES[$name]['name'];
        $config = array(
            'upload_path'   => "$path",
            'allowed_types' => $allowed_types,
            'encrypt_name'  => $encryptName,
            'max_size' => $maxSize * 1000
        );
        $CI->upload->initialize($config);
        if ($CI->upload->do_upload($name)) {
            return [
                'path' => $path . '/' . $CI->upload->data("file_name"),
                'path_min' => $path,
                'real_name' => $realName,
                'name' => $CI->upload->data("file_name"),
                'type' => $CI->upload->data("file_type"),
                'size' => $CI->upload->data("file_size"),
                'ext' => $CI->upload->data("file_ext"),
            ];
        } else {
            // return false;
            return $CI->upload->display_errors();
            // exit;
        }
    }
}

if (!function_exists('encode_id')) {

    function encode_id($string)
    {
        $string = $string . ' ' . date('YmdHis') . random_string('alnum', 8);
        $output = false;
        $security       = parse_ini_file("security.ini");
        $secret_key     = $security["encryption_key"];
        $secret_iv      = $security["iv"];
        $encrypt_method = $security["encryption_mechanism"];

        // hash
        $key    = hash("sha256", $secret_key);
        $iv     = substr(hash("sha256", $secret_iv), 0, 16);

        $result = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($result);
        return $output;
    }
}

if (!function_exists('decode_id')) {

    function decode_id($string)
    {

        $output = false;

        $security       = parse_ini_file("security.ini");
        $secret_key     = $security["encryption_key"];
        $secret_iv      = $security["iv"];
        $encrypt_method = $security["encryption_mechanism"];

        // hash
        $key    = hash("sha256", $secret_key);
        $iv = substr(hash("sha256", $secret_iv), 0, 16);

        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        $hasil = explode(" ", $output);
        return $hasil[0];
    }
}

