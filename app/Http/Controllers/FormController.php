<?php
namespace App\Http\Controllers;

use App\Models\FormUser;
use Carbon\Carbon;
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

 public function allUsers(Request $request)
{
    $perPage = 10;
    $users = \App\Models\FormUser::orderBy('created_at', 'desc')->paginate($perPage);

    // Append formatted date to each item
    $users->getCollection()->transform(function ($user) {
        $user->created_human = Carbon::parse($user->created_at)->diffForHumans(); // e.g., "2 minutes ago"
        $user->created_formatted = Carbon::parse($user->created_at)->format('d F Y - h:i A'); // e.g., "24 June 2025 - 11:30 AM"
        return $user;
    });

    if ($request->ajax() || $request->wantsJson()) {
        return response()->json($users);
    }

    return view('users');
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
