<?php

define('SITEURL', "http://localhost:8080/clinic-management/");

function currency_format($number, $subfixx) {
    if (!empty($number)) {
        return number_format($number, 0 , ',','.'). " {$subfixx}";
    }
}