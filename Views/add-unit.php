<?php
$this->layout('template', ['title' => 'TP TFT - Add Title']);
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
        <label for="cost" class="block text-sm font-medium leading-6 text-gray-900">Cost
        <div class="mt-2">
            <input type="number" name="cost" id="cost" autocomplete="cost" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        </label>
        <label for="origin" class="block text-sm font-medium leading-6 text-gray-900">Origin
        <div class="mt-2">
            <select id="origin" name="origin" autocomplete="origin" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                <option>Shurima</option>
                <option>Ionia</option>
                <option>Piltover</option>
            </select>
        </div>
        </label>
        <div class="w-full flex justify-end">
            <button type="submit" class="bg-purple-600 mt-2 text-white rounded w-fit py-1 px-4 hover:bg-purple-900">
                Save
            </button>
        </div>
    </form>
</div>