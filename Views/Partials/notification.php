<?php if ($message){ ?>
<div class="bg-white fixed bottom-0 right-0 p-4 w-1/5 shadow-2xl border-2 flex justify-between items-center">
    <?= $message ?>
    <a href="/" class="flex items-center hover:text-red-600">
        <span class="material-symbols-outlined">
            close
        </span>
    </a>
</div>
<?php } ?>