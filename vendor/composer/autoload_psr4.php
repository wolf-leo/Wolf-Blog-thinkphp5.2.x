<?php

// autoload_psr4.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'think\\' => array($vendorDir . '/topthink/framework/src/think', $vendorDir . '/topthink/think-template/src', $vendorDir . '/topthink/think-view/src'),
    'app\\' => array($baseDir . '/app'),
    'Psr\\SimpleCache\\' => array($vendorDir . '/psr/simple-cache/src'),
    'Psr\\Log\\' => array($vendorDir . '/psr/log/Psr/Log'),
    'Psr\\Container\\' => array($vendorDir . '/psr/container/src'),
    'Psr\\Cache\\' => array($vendorDir . '/psr/cache/src'),
    'Opis\\Closure\\' => array($vendorDir . '/opis/closure/src'),
);
