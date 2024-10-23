<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="public/css/output.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:FILL@1" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->e($title) ?></title>
</head>

<body>
<header class="w-full flex flex-row justify-between p-4 shadow-lg bg-purple-600 bg-opacity-75 backdrop-blur sticky top-0 z-50 items-center">
    <!-- Menu -->
    <a href="/" class="w-16 h-16">
        <img src="public/img/logo.png" alt="Logo" class="w-full h-full object-cover">
    </a>
    <nav class="flex gap-12">
        <a href="?action=add-unit"
        class="text-white font-bold text-2xl hover:text-amber-400"
        >Add Unit
        </a>
        <a href="?action=add-unit-origin"
           class="text-white font-bold text-2xl hover:text-amber-400">Add unit origin</a>
        <a href="?action=search"
           class="text-white font-bold text-2xl hover:text-amber-400">Search unit</a>
        <a href="/"
           class="text-white font-bold text-2xl hover:text-amber-400">Home</a>
    </nav>
</header>
<!-- #contenu -->
<main id="contenu">
    <?=$this->section('content')?>
</main>
<footer>

</footer>
</body>

</html>