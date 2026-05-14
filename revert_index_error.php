<?php

$files = glob(__DIR__ . '/app/Http/Controllers/Admin/*.php');
foreach($files as $file) {
    $content = file_get_contents($file);
    // Revert abort(500) back to json response
    $content = preg_replace('/catch \(\\\\Exception \$e\) \{\s*abort\(500, "Gagal memuat data ([^"]+)?: " \. \$e->getMessage\(\)\);\s*\}/', "catch (\Exception \$e) { return response()->json(['error' => 'Gagal memuat data $1', 'message' => \$e->getMessage()], 500); }", $content);
    file_put_contents($file, $content);
}
echo "Reverted index to JSON!\n";
