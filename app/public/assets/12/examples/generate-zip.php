<?php

$zip = new ZipArchive();
$zipFile = 'demo.zip';
if ($zip->open($zipFile, ZipArchive::CREATE) === true) {
    $iterator = new DirectoryIterator(__DIR__);
    foreach ($iterator as $file) {
        if ((!$file->isDir()) && ($file->getExtension() === 'php')) {
            $zip->addFile($file);
        }
    }
    $zip->close();

    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename=' . $zipFile);
    header('Content-Length: ' . filesize($zipFile));
    readfile($zipFile);
}