<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=pmb_stikes2', 'root', '');
echo "--- UNGGULANS ---\n";
foreach ($pdo->query("SELECT id, title, description FROM unggulans")->fetchAll(PDO::FETCH_ASSOC) as $r) {
    echo "ID " . $r['id'] . ": " . $r['title'] . " | " . substr($r['description'], 0, 50) . "\n";
}

echo "--- PRESTASIS ---\n";
foreach ($pdo->query("SELECT id, title, name FROM prestasis LIMIT 5")->fetchAll(PDO::FETCH_ASSOC) as $r) {
    echo "ID " . $r['id'] . ": " . $r['title'] . " | " . $r['name'] . "\n";
}

echo "--- ORGANISATIONS ---\n";
foreach ($pdo->query("SELECT id, title FROM organisasis LIMIT 5")->fetchAll(PDO::FETCH_ASSOC) as $r) {
    echo "ID " . $r['id'] . ": " . $r['title'] . "\n";
}
