<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=lp_stikes2', 'root', '');
$tables = ['abouts', 'unggulans', 'prestasis', 'facilities', 'posts', 'categories', 'faculties', 'departments'];
foreach ($tables as $table) {
    try {
        $cols = $pdo->query("DESCRIBE $table")->fetchAll(PDO::FETCH_COLUMN);
        $enCols = array_filter($cols, fn($c) => str_ends_with($c, '_en'));
        echo "$table: " . (empty($enCols) ? 'NO _EN COLS' : implode(', ', $enCols)) . "\n";
    } catch (Exception $e) {
        echo "$table error: " . $e->getMessage() . "\n";
    }
}
