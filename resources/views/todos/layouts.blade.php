<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @livewireStyles

    <title>ToDo</title>
    {{-- Tailwind-css-cdn  --}}
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    {{-- font-awesome-cdn  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
    <div class="text-center pt-10 flex justify-center">
        <div class="w-1/3 border rounded py-4 border-gray-500">
            @yield('content')
        </div>
    </div>
    @livewireScripts
</body>
</html>

