@extends('layouts.default')

@section('content')
<div class="grid grid-cols-6 gap-4">
    <div class="col-start-5 mt-2 col-end-7 ...">
        @if (session('success'))
        <div class="bg-green-500  p-3 text-3xl font-bold  text-white shadow-lg rounded-lg w-full" role="alert">
            <h5>{{ session('success') }}</h5>
        </div>
        @endif
        @if (session('error'))
        <div class="bg-red-500 p-3 text-3xl font-bold  text-white shadow-lg rounded-lg w-full" role="alert">
            <h5>{{ session('error') }}</h5>
        </div>
        @endif
    </div>
</div>
<br><br><br>
<div class="grid grid-cols-6 gap-4">
    <div class="col-start-3 col-end-5 ...">
        <div
            class="w-full  p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h5 class="text-3xl font-bold text-gray-900">เจ้าหน้าที่ทำการเข้าสู่ระบบ</h5>
                <div>
                    <label for="email"
                        class="block my-2 text-2xl font-medium text-gray-900 dark:text-white">กรอกอีเมล</label>
                    <input type="email" name="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-2xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="name@company.com">
                </div>
                <div>
                    <label for="password"
                        class="block my-2 text-2xl font-medium text-gray-900 dark:text-white">กรอกรหัสผ่าน</label>
                    <input type="password" name="password" id="password" placeholder="••••••••"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-2xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                </div>
                <br>
                <button type="submit"
                    class="w-full mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-2xl px-5 py-2.5 text-center">เข้าสู่ระบบ</button>
            </form>
        </div>
    </div>
</div>
@endsection