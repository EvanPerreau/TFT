<?php
$this->layout('template', ['title' => 'TP TFT - Home']);
?>
<?php foreach ($listUnits as $unit) {
    $this->insert('Partials/unit-card', [
        'unit' => $unit
    ]);
} ?>
<?= $this->insert('Partials/notification', ['message' => $message]) ?>