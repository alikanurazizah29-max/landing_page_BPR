<?php

$files = glob(__DIR__ . '/app/Http/Controllers/Admin/*.php');
foreach($files as $file) {
    $content = file_get_contents($file);
    // Replace $interest-rates with $interest_rates
    $content = preg_replace('/\$([a-z]+)\-([a-z]+)s/', '\$$1_$2s', $content);
    // Replace compact('interest-rates') with compact('interest_rates')
    $content = preg_replace('/compact\(\'([a-z]+)\-([a-z]+)s\'\)/', 'compact(\'$1_$2s\')', $content);
    file_put_contents($file, $content);
}

$views = glob(__DIR__ . '/resources/views/admin/*/index.blade.php');
foreach($views as $view) {
    $content = file_get_contents($view);
    // Replace foreach($interest-rates as $interestRate) with foreach($interest_rates as $interestRate)
    $content = preg_replace('/\$([a-z]+)\-([a-z]+)s/', '\$$1_$2s', $content);
    file_put_contents($view, $content);
}

echo "Fixed!\n";
