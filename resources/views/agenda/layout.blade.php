<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>@yield('titulo')</title>
</head>
<body>

@component('agenda.nav')@endcomponent

@yield('conteudo')

</body>
</html>