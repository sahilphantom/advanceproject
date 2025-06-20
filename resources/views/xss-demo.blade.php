<!DOCTYPE html>
<html>
<head>
    <title>XSS Protection Demo</title>
</head>
<body>
    <h1>Laravel XSS Protection Example</h1>

    <h3>Auto-Escaped Output (Safe)</h3>
    <div>
        {{ $data }}  <!-- Output will show script as plain text -->
    </div>

    <h3>Unescaped Output (Unsafe)</h3>
    <div>
        {!! $data !!} <!-- Script will actually run -->
    </div>
</body>
</html>
