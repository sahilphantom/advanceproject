<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class XSSDemoController extends Controller
{
    public function show()
    {
        $data = "<script>alert('XSS attack here');</script>";
        return view('xss-demo', compact('data'));
    }
}
