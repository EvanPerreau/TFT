<?php
$this->layout('template', ['title' => 'TP TFT - Home']);
?>
<div class="flex gap-2 w-full flex-wrap justify-center">
    <?php foreach ($listUnits as $unit) {
        $this->insert('Partials/unit-card', [
            'unit' => $unit
        ]);
    } ?>
</div>

<?= $this->insert('Partials/notification', ['message' => $message]) ?>