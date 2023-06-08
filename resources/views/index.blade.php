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
    <div class="col-start-2 col-span-4 ...">
        <div class="bg-white m-10 p-5 shadow-xl rounded-xl">
            <div class="text-4xl font-bold">Shorten a long link</div>
            <br>
            <form action="{{ route('shorten_url') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="realative">
                    <div class="w-full">
                        <input type="text" name="url"
                            class="w-full  bg-gray-50 border border-gray-300 text-gray-900 text-2xl rounded-lg"
                            placeholder="วางลิงค์ที่ต้องการย่อให้สั้น">
                    </div>
                    <div class="w-full">
                        <input type="text" name="name"
                            class="w-full  mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-2xl rounded-lg"
                            placeholder="ระบุชื่อสำหรับลิงค์ หรือกรณีที่ไม่ระบุชื่อ ระบบจะระบุชื่อให้โดยการสุ่มตัวอักษร 10 ตัว">
                    </div>
                    <button type="submit"
                        class="my-3 p-2.5 text-2xl font-medium text-white bg-blue-700 rounded-lg border border-blue-700">
                        Shorten
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection