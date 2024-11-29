<?php
?>
<div class="m-6">
    <div class="bg-purple-700 w-64 h-52 relative rounded">
        <div class="relative z-0">
            <img src="<?= $unit->getUrlImg() ?>" class="absolute top-0 left-0 h-52 object-cover object-center rounded-t" alt=""/>
            <div class="absolute top-0 left-0 h-52 w-full bg-gradient-to-r from-purple-900 to-transparent"></div>
        </div>
        <div class="w-full h-full flex justify-between relative z-10 flex-col">
            <div class="space-x-1 m-2">
                <a href="?action=edit-unit&id=<?= $unit->getId() ?>" class="material-symbols-outlined z-10 text-amber-400 relative !text-2xl">
                    edit
                </a>
                <a href="?action=del-unit&id=<?= $unit->getId() ?>" class="material-symbols-outlined z-10 text-amber-400 relative !text-2xl">
                    delete
                </a>
            </div>
            <div class="flex flex-col m-2">
                <?php foreach ($unit->getOrigin() as $origin) : ?>
                    <div class="flex justify-start z-10 relative gap-1">
                        <img src="<?= $origin->getImage() ?>" class="w-6 h-6 rounded-full" alt=""/>
                        <p class="text-amber-400 text-xl font-bold">
                            <?= $origin->getName() ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="bg-purple-900 w-64 h-16 rounded-b flex justify-between items-center">
        <p class="text-white text-2xl ml-2">
            <?= $unit->getName() ?>
        </p>
        <div class="flex items-center mr-2">
            <p class="text-white text-2xl">
                <?= $unit->getCost() ?>
            </p>
            <span class="material-symbols-outlined text-amber-400">
                money_bag
            </span>
        </div>
    </div>
</div>
