<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class HelloController extends Controller
{
    private $fname;

    public function  __construct()
    {
        $this->fname = 'hello.txt';
    }

    public function index(Request $request, Response $response)
    {
        $name = $request->query('name');
        $mail = $request->query('mail');
        $tel = $request->query('tel');
        $msg = $name . ', ' . $mail . ', ' . $tel;
        $keys = ['名前', 'メール', '電話'];
        $values = [$name, $mail, $tel];
        $data = [
            'msg' => $msg,
            'keys' => $keys,
            'values' => $values,
        ];
        $request -> flash();
        return view('hello.index', $data);
    }

    public function other($msg)
    {
        Storage::disk('public')->delete('bk_' . $this->fname);
        Storage::disk('public')->copy($this->fname, 'bk_' . $this->fname);
        Storage::disk('local')->delete('bk_' . $this->fname);
        Storage::disk('local')->move('public/bk_' . $this->fname, 'bk_' . $this->fname);

        return redirect()->route('hello');
    }
}
