<?php

$files = glob(__DIR__ . '/app/Http/Controllers/Admin/*.php');
foreach($files as $file) {
    $content = file_get_contents($file);
    $content = preg_replace('/catch \(\\\\Exception \$e\) \{\s*return response\(\)\->json\(\[\'error\' => \'Gagal memuat data ([^\']+)\', \'message\' => \$e\->getMessage\(\)\], 500\);\s*\}/', 'catch (\Exception $e) { abort(500, "Gagal memuat data $1: " . $e->getMessage()); }', $content);
    file_put_contents($file, $content);
}
echo "Updated index error handling!\n";
