<?php
$this->layout('template', ['title' => 'TP TFT - Add Origine']);
?>
<div class="w-full mt-12 flex justify-center">
    <form action="" class="max-w-xl flex-col flex gap-2">
        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name
            <div class="mt-2">
                <input type="text" name="name" id="name" autocomplete="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </label>
        <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Image Url
            <div class="mt-2">
                <input type="text" name="image" id="image" autocomplete="image" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
        </label>
        <div class="w-full flex justify-end">
            <button type="submit" class="bg-purple-600 mt-2 text-white rounded w-fit py-1 px-4 hover:bg-purple-900">
                Save
            </button>
        </div>
    </form>
</div>
