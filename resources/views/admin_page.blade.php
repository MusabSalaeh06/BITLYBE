@extends('layouts.default')

@section('content')

<div class="grid grid-cols-6 gap-4">
    <div class="col-start-5 mt-2 col-end-7 ...">

        @if (session('success'))
        <div class="bg-green-500  p-3 text-3xl font-bold  text-white shadow-lg rounded-lg w-full" role="alert">
            <h5>{{ session('success') }}</h5>
        </div>
        @endif

        @if (session('destroy'))
        <div class="bg-red-500  p-3 text-3xl font-bold  text-white shadow-lg rounded-lg w-full" role="alert">
            <h5>{{ session('destroy') }}</h5>
        </div>
        @endif

    </div>
</div>
<br>

<div class="grid grid-cols-6 gap-4">
    <div class="col-start-2 col-end-6 ...">
        <div class="p-5 text-5xl bg-white text-black font-bold shadow-md rounded-md">แดชบอร์ดสำหรับเจ้าหน้าที่</div>
        <div class="relative overflow-x-auto mt-10 shadow-md sm:rounded-lg">
            <table class="w-full text-2xl text-left text-gray-500 dark:text-gray-400">
                <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ลำดับ.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            วันที่สร้าง
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ลิงค์
                        </th>
                        <th scope="col" class="px-6 py-3">
                            จำนวนการเข้าถึงลิงค์
                        </th>
                        <th scope="col" class="px-6 py-3">

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($url as $i=>$rows)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$i+1}}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($rows->created_at)->format('d/m/')}}
                            {{ (\Carbon\Carbon::parse($rows->created_at)->format('Y'))+543}}
                        </td>
                        <td class="px-6 py-4">
                            {{$rows->shorten_link}}
                        </td>
                        <td class="px-6 py-4">
                            @if ($rows->count == null)
                                0
                            @else
                            {{$rows->count}}
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{route('destroy',$rows->id)}}" class="nav-link dropdown" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                    onclick="return confirm('คุณต้องการลบ [ {{$rows->shorten_link}} ] หรือไม่?')">
                                    Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection