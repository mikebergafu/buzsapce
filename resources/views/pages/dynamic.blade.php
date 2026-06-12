<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page->title }} - BuzSpace</title>
    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <style>body{font-family:system-ui,sans-serif;max-width:800px;margin:0 auto;padding:20px;line-height:1.6;color:#333}h1{color:#059669}h2{color:#18181B;margin-top:24px}a{color:#059669}</style>
</head>
<body>
    <a href="/" style="text-decoration:none;font-weight:bold;color:#059669">← BuzSpace</a>
    <h1>{{ $page->title }}</h1>
    <p><small>Last updated: {{ $page->updated_at->format('F Y') }}</small></p>
    {!! $page->content !!}
</body>
</html>
