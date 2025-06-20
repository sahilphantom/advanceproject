<?php
namespace App\Http\Controllers;

use App\Models\FormUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    public function usersPage()
    {
        return view('users');
    }

    public function submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:100|regex:/^[A-Z][a-zA-Z\s\-]+$/',
            'email' => 'required|email:rfc,dns|max:100|unique:form_users,email',
            'age' => 'required|integer|between:18,60',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        FormUser::create($request->only('name', 'email', 'age'));

        return response()->json(['message' => 'User created successfully']);
    }

    public function allUsers()
    {
        return response()->json(FormUser::all());
    }

    public function getUser($id)
    {
        return response()->json(FormUser::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $user = FormUser::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:100|regex:/^[A-Z][a-zA-Z\s\-]+$/',
            'email' => 'required|email:rfc,dns|max:100|unique:form_users,email,' . $id,
            'age' => 'required|integer|between:18,60',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user->update($request->only('name', 'email', 'age'));

        return response()->json(['message' => 'User updated successfully']);
    }
}
