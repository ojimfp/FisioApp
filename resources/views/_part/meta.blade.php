<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">
<title>{{ $meta['title'] ?? config('app.name') }}</title>