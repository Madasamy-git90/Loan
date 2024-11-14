<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General Reset */
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f4f6f9;
            color: #333;
        }

        /* Header */
        h1 {
            text-align: center;
            margin-top: 20px;
            color: #444;
        }

        /* Container */
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* User Info */
        .user-info {
            text-align: center;
            margin-bottom: 20px;
            font-size: 18px;
        }

        /* Navigation Menu */
        .menu {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: space-around;
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
            background-color: #f9f9f9;
        }

        .menu li {
            margin: 0 10px;
        }

        .menu a {
            text-decoration: none;
            color: #007bff;
            font-size: 16px;
        }

        .menu a:hover {
            color: #0056b3;
        }

        /* Logout Button */
        .logout {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .logout a {
            text-decoration: none;
            background-color: #dc3545;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
        }

        .logout a:hover {
            background-color: #c82333;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .menu {
                flex-direction: column;
                align-items: center;
            }

            .menu li {
                margin: 5px 0;
            }
        }
    </style>
</head>
<body>
    <h1>Welcome to the Admin Dashboard</h1>
    <p>Hello, {{ Auth::user()->name }}!</p>
    <ul>
        <li><a href="{{ route('loan.details') }}">Loan Details</a></li>
        <li><a href="{{ route('admin.processData') }}">Process Page</a></li>
    </ul>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
</html>
