<?php

use app\helpers\TemplateHelper;

function formatDate($date, $format = 'Y-m-d') {
    return TemplateHelper::formatDate($date, $format);
}

function formatLabel($label) {
    return TemplateHelper::formatLabel($label);
}

function escapeHtml($string) {
    return TemplateHelper::escapeHtml($string);
}

function getLink($link, $type = '') {
    return TemplateHelper::getLink($link, $type);
}

function getAppName() {
    return TemplateHelper::getAppName();
}

function getTrad($key) {
    return TemplateHelper::getTrad($key);
}

function getCleanFileName($filename) {
    return TemplateHelper::getCleanFileName($filename);
}