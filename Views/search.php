<?php
$this->layout('template', ['title' => 'TP TFT - Search']);
?>
<div class="w-full mt-12 flex justify-center flex flex-col gap-12">
    <form class="max-w-xl w-full mx-auto flex flex-col" action="index.php?action=search" method="post">
        <div class="flex-row gap-2 w-full flex">
            <label class="w-full">
            <input type="text" name="search" id="search" autocomplete="search" placeholder="Search..." class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </label>
            <select name="property" class="rounded">
                <?php foreach ($properties as $property): ?>
                    <option value="<?= $property->getName() ?>"><?= $property->getName() ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="w-full flex">
            <button type="submit" class="px-4 py-1 bg-amber-500 w-fit rounded mt-2">
                Search
            </button>
        </div>
    </form>
    <div class="flex gap-2 w-full flex-wrap justify-center">
        <?php foreach ($listUnits as $unit) {
            $this->insert('Partials/unit-card', [
                'unit' => $unit
            ]);
        } ?>
    </div>
    <?= $this->insert('Partials/notification', ['message' => $message]) ?>
</div>
