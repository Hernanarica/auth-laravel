<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
@auth
  {{ auth()->user() }}
@endauth

@guest
  <form action="{{ route('auth.redirect') }}">
    <button>Google SigIn</button>
  </form>
@endguest

@auth
  <form action="{{ route('auth.logout') }}" method="post">
    @csrf
    <button>Logout</button>
  </form>
@endauth
</body>
</html>