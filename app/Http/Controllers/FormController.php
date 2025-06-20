<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|string|min:3|max:100|regex:/^[A-Z][a-zA-Z\s\-]+$/',
            'email' => 'required|string|email:rfc,dns|max:100|ends_with:@gmail.com,@yahoo.com,@outlook.com',
            'age'   => 'required|integer|between:18,60',
        ], [
            'name.regex' => 'Name must start with a capital letter and contain only letters, spaces, or hyphens.',
            'email.ends_with' => 'Email must be gmail.com, yahoo.com, or outlook.com.',
            'age.between' => 'Age must be between 18 and 60.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        return response()->json([
            'success' => true,
            'message' => 'Form submitted successfully!',
        ]);
    }
}
