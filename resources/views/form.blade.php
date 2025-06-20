<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Axios Form - Laravel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/js/app.js']) 
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f9;
            padding: 40px;
            display: flex;
            justify-content: center;
        }

        form {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 500px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
            color: #34495e;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"] {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 12px;
            border: 1px solid #dcdfe6;
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.2s;
        }

        input:focus {
            outline: none;
            border-color: #3498db;
        }

        .error {
            color: #e74c3c;
            font-size: 0.85em;
            margin-top: -8px;
            margin-bottom: 12px;
            display: block;
        }

        .success {
            text-align: center;
            color: #27ae60;
            margin-top: 20px;
            font-weight: bold;
        }

        button {
            display: block;
            width: 100%;
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

    <form id="myForm">
        <h2>Laravel Axios Form (No Page Reload)</h2>

        <label>Name:</label>
        <input type="text" name="name" id="name">
        <span class="error" id="nameError"></span>

        <label>Email:</label>
        <input type="email" name="email" id="email">
        <span class="error" id="emailError"></span>

        <label>Age:</label>
        <input type="number" name="age" id="age">
        <span class="error" id="ageError"></span>

        <button type="submit">Submit</button>

        <p class="success" id="responseMessage"></p>
    </form>

</body>
</html>
