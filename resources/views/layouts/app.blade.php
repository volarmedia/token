<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Token Booking</title>
    <style>
        :root {
            color-scheme: light;
            font-family: "Inter", system-ui, -apple-system, sans-serif;
        }
        body {
            margin: 0;
            background: #f7f8fa;
            color: #1d1f25;
        }
        header {
            background: #ffffff;
            border-bottom: 1px solid #e6e9ef;
            padding: 20px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        header nav a {
            margin-right: 16px;
            text-decoration: none;
            color: #2c3e50;
            font-weight: 600;
        }
        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 32px;
        }
        .grid {
            display: grid;
            gap: 24px;
        }
        .grid-3 {
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        }
        .card {
            background: #fff;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.08);
        }
        .badge {
            padding: 4px 12px;
            border-radius: 999px;
            font-size: 12px;
            background: #eef2ff;
            color: #3730a3;
        }
        .button {
            display: inline-block;
            padding: 10px 18px;
            border-radius: 12px;
            background: #4338ca;
            color: #fff;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-weight: 600;
        }
        .button.secondary {
            background: #e2e8f0;
            color: #1e293b;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th,
        table td {
            text-align: left;
            padding: 12px 10px;
            border-bottom: 1px solid #e2e8f0;
        }
        form .field {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-bottom: 16px;
        }
        input, textarea, select {
            padding: 10px 12px;
            border: 1px solid #cbd5f5;
            border-radius: 10px;
            font-size: 14px;
        }
        .status {
            font-weight: 600;
        }
        .status.pending {
            color: #f97316;
        }
        .status.confirmed {
            color: #16a34a;
        }
        .status.cancelled {
            color: #dc2626;
        }
        .notice {
            padding: 12px 16px;
            background: #ecfeff;
            border: 1px solid #a5f3fc;
            border-radius: 12px;
            margin-bottom: 16px;
        }
    </style>
</head>
<body>
    <header>
        <div>
            <strong>Real Estate Token Booking</strong>
        </div>
        <nav>
            <a href="{{ route('welcome') }}">Home</a>
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('token-options.index') }}">Token Options</a>
            <a href="{{ route('bookings.index') }}">Bookings</a>
        </nav>
    </header>
    <main class="container">
        @if(session('status'))
            <div class="notice">{{ session('status') }}</div>
        @endif
        @yield('content')
    </main>
</body>
</html>
