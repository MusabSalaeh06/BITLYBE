<?php

namespace App\Http\Controllers;

use App\Models\ShortenUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ShortenUrlController extends Controller
{
    public function shorten_url(Request $request)
    {

        $customMessage = [
            "url.required" => "กรุณาระบุลิงค์มาด้วยน่ะครับ",
        ];

        $validator = Validator::make($request->all(), [
            'url' => ['required'],
        ], $customMessage);

        if ($validator->fails()) {
            $errors = $validator->errors();

            return redirect()->back()->with(
                [
                    'status' => false,
                    'data' => [],
                    'error' => $errors->first(),
                ], 400
            );
        }
        if ($request->name == null) {
            $name = Str::random(10);
            $result = asset('/msu/' . Str::random(10));
        } else {
            $name = $request->name;
            $result = asset('/msu/' . $request->name);
        }
        $ShortenUrl = ShortenUrl::where('shorten_link', $result)->get()->count();
        if ($ShortenUrl > 0) {
            return redirect()->route('index')->with('error', 'ชื่อนี้มีคนอื่นใช้เเล้ว กรุณาใช้ชื่ออื่น');
        }
        $post = new ShortenUrl;
        $post->url = $request->url;
        $post->shorten_link = $result;
        $post->save();
        $url = $post->url;
        $shorten_link = $post->shorten_link;
        return view('show_url', compact('url', 'name', 'shorten_link'));
    }

    public function search_url($id)
    {
        $result = asset('/msu/' . $id);
        $ShortenUrl = ShortenUrl::where('shorten_link', $result)->get()->count();
        if ($ShortenUrl == 0) {
            return redirect()->route('index')->with('error', 'ไม่พบลิงค์ที่ท่านทำการค้นหา');
        }
        $url = ShortenUrl::where('shorten_link', $result)->first();
        $post = ShortenUrl::find($url->id);
        $post->count = $url->count + 1;
        $post->save();

        return Redirect::to($url->url);
    }

    public function admin_page()
    {
        $url = ShortenUrl::get();
        return view('admin_page', compact('url'));
    }
    public function delete_short_link($id)
    {
        ShortenUrl::find($id)->delete();
        return redirect()->back()->with('destroy', 'ลบข้อมูลเรียบร้อย');
    }
}
