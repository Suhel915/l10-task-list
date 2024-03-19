<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 10 Task List App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
  
    <!-- blade-formatter-disable -->
   <style type="text/tailwindcss">
        .btn{
                @apply rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50
            }
        .link{
            @apply font-medium text-gray-700 underline decoration-pink-500
        }

        label{
            @apply block uppercase text-slate-700 mb-2

        }
        input,textarea{
            @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
        }
        .error{
            @apply text-red-500 text-sm
        }
    </style>
    {{-- blade-formatter-enable --}}

    @yield('styles')
</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg"> 
    <h1 class="mb-4 text-2xl" >@yield('title')</h1>
    <div x-data="{ flash: true }">
    @if(session()->has('success'))
    
    
    <div x-show="flash"
    class="relative mb-10 rounded border border-green-400 bg-green-100 px-4 py-3 text-green-700" role="alert">
        <strong class="font-bold"> Success! </strong>
        <div> {{ session('success') }}</div>   
        <span class="absolute top-0 bottom-0 px-4 py-3 text-right">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" @click="flash = false" viewBox="0 0 16 16">
                <path d="M.646 1.646a.5.5 0 0 1 .708 0L8 7.293 15.646.646a.5.5 0 0 1 .708.708L8.707 8l7.647 7.646a.5.5 0 0 1-.708.708L8 8.707l-7.646 7.647a.5.5 0 0 1-.708-.708L7.293 8 .646 1.646z"/>
              </svg>              

</svg>
        </span>
    </div>
   
    @endif
    @yield('content')
    </div>
</body>
</html>