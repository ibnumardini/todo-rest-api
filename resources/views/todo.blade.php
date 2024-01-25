<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">Todos</h1>
        <ul class="divide-y divide-gray-300" id="todoParent"></ul>
    </div>
    
    @vite('resources/js/app.js')
</body>

</html>
