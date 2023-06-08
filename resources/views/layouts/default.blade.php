<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</head>

<style>
    @font-face {
        font-family: THSarabun;
        src: url(/font/THSarabun.ttf);
    }

    body {
        font-family: "THSarabun";
    }

    input::placeholder {
        font-size: 22px;
    }
</style>

<body class="bg-gray-200">
    @guest
    <nav class="bg-white border-gray-700 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{route('index')}}" class="flex items-center">
                <span class="self-center text-4xl font-semibold whitespace-nowrap dark:text-white hover:text-blue-700 ">MShort-URL</span>
            </a>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="{{route('login')}}"
                            class="text-2xl block font-semibold py-2  pl-3 pr-4 text-gray-900 hover:text-blue-700 ">เข้าสู่ระบบสำหรับเจ้าหน้าที่.</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @else
    <nav class="bg-white border-gray-700 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{route('index')}}" class="flex items-center">
                <span class="self-center text-4xl font-semibold whitespace-nowrap dark:text-white hover:text-blue-700 ">MShort-URL</span>
            </a>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="{{route('admin_page')}}"
                            class="text-2xl block font-semibold py-2 pl-3 pr-4 text-gray-900 hover:text-blue-700 ">แดชบอร์ด</a>
                    </li>
                    <li>
                        <div class="inline-block text-2xl font-semibold block py-2 pl-3  text-gray-900">[
                            {{Auth::user()->name}} ] </div>
                        <a href="{{route('logout')}}"
                            class="inline-block text-2xl font-semibold block py-2 pr-4 text-gray-900 hover:text-blue-700 ">ออกจากระบบ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @endguest
    @yield('content')
    </div>
</body>

</html>