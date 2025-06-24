<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Users - Edit Form</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/js/app.js'])

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            padding: 40px;
            background-color: #f0f6ff;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #1e3a8a;
        }

        form {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0 8px 24px rgba(30, 58, 138, 0.1);
            border: 1px solid #dbeafe;
        }

        label {
            display: block;
            font-weight: 600;
            margin-top: 15px;
            color: #1e40af;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #93c5fd;
            background-color: #f0f9ff;
            transition: 0.2s ease;
        }

        input:focus {
            border-color: #3b82f6;
            outline: none;
            background-color: #eff6ff;
        }

        .error {
            color: #dc2626;
            font-size: 0.85rem;
        }

        .success {
            color: #10b981;
            text-align: center;
            font-weight: bold;
            margin-top: 10px;
        }

        table {
            width: 100%;
            background: #ffffff;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(30, 58, 138, 0.05);
        }

        th, td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #e0e7ff;
        }

        th {
            background-color: #eff6ff;
            color: #1e3a8a;
        }

        .edit-btn {
            padding: 6px 12px;
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: background-color 0.2s;
        }

        .edit-btn:hover {
            background-color: #1d4ed8;
        }
    </style>
</head>
<body>

    <h2>Create or Edit User</h2>

    <form id="myForm">
        <label>Name:</label>
        <input type="text" name="name" id="name">
        <span class="error" id="nameError"></span>

        <label>Email:</label>
        <input type="email" name="email" id="email">
        <span class="error" id="emailError"></span>

        <label>Age:</label>
        <input type="number" name="age" id="age">
        <span class="error" id="ageError"></span>

        <button type="submit" style="margin-top: 20px; background-color: #3b82f6; padding: 10px 16px; border: none; border-radius: 6px; color: white; font-weight: 600; cursor: pointer;">Submit</button>

        <p class="success" id="responseMessage"></p>
    </form>
    <div id="loader" style="display: none; text-align: center; margin-top: 10px;">
    <strong style="color: #2563eb;">Processing...</strong>
</div>

<div id="alertBox" style="display: none; text-align: center; margin-top: 20px;">
    <p id="alertMessage" style="padding: 10px; border-radius: 6px;"></p>
</div>


    <h2 style="margin-top: 50px;">All Users</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th><th>Email</th><th>Age</th><th>Created At</th><th>Action</th>
            </tr>
        </thead>
        <tbody id="userTable">
            {{-- Populated by app.js --}}
        </tbody>
    </table>
    <div id="pagination" style="margin-top: 20px; text-align: center;"></div>


</body>
</html>
