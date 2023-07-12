<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @section('title')
            Webflix
        @show
    </title>
</head>

<body>
    <nav>
        <a style="text-decoration: none; color: blue;" href="/">Accueil</a>
        <a style="text-decoration: none; color: blue;" href="/julien">Julien</a>
        <a style="text-decoration: none; color: blue;" href="/julien?color=orange">Orange</a>
        <a style="text-decoration: none; color: blue;" href="/julien/guuts">Yan & Guuts</a>
        <a style="text-decoration: none; color: blue;" href="/julien/ares">Yan & Ares</a>
        <a style="text-decoration: none; color: blue;" href="/a-propos">A propos</a>

    </nav>

    @yield('content')

    <footer>
        {{ date('Y') }}
    </footer>
</body>

</html>
