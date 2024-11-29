<?php if ($message){ ?>
<div id="notification" class="bg-white fixed bottom-0 right-0 p-4 w-1/5 shadow-2xl border-2 flex justify-between items-center">
    <?= $message ?>
    <a href="javascript:void(0);" class="flex items-center hover:text-red-600" onclick="closeNotification()">
        <span class="material-symbols-outlined">
            close
        </span>
    </a>
</div>
<script>
    function closeNotification() {
        var notification = document.getElementById('notification');
        if (notification) {
            notification.style.display = 'none';
        }
    }
</script>
<?php } ?>