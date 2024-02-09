#!/usr/bin/env php
<?php

$rootDir = __DIR__ . '/..';
$excludedDirs = ['vendor', '.git', 'node_modules'];
$fileExtensions = ['php', 'html'];

$directoryIterator = new RecursiveDirectoryIterator($rootDir, RecursiveDirectoryIterator::SKIP_DOTS);
$filterIterator = new RecursiveCallbackFilterIterator($directoryIterator, function ($current, $key, $iterator) use ($excludedDirs) {
    if ($iterator->hasChildren() && !in_array($current->getFilename(), $excludedDirs)) {
        return true;
    }
    return $current->isFile();
});

$iterator = new RecursiveIteratorIterator($filterIterator);
$regex = '/getTrad\(\'([^\']+?)\'\)/';

$translations = [];

foreach ($iterator as $file) {
    $filePath = $file->getPathname();
    $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);

    if (!in_array($fileExtension, $fileExtensions)) {
        continue;
    }

    $content = file_get_contents($filePath);
    if ($content === false) {
        echo "Error reading file: $filePath\n";
        continue;
    }

    if (preg_match_all($regex, $content, $matches) && !empty($matches[1])) {
        foreach ($matches[1] as $translationKey) {
            $translations[$translationKey] = true;
        }
    }
}

// foreach (array_keys($translations) as $key) {
//     echo "Found translation key: $key\n";
// }

$jsonOutput = [];
foreach (array_keys($translations) as $key) {
    $jsonOutput[$key] = $key;
}

$jsonContent = json_encode($jsonOutput, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

echo $jsonContent;

file_put_contents('translations/en.json', $jsonContent);

