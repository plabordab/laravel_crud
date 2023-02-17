<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(["resources/css/app.css", "resources/js/app.js"])
</head>

<body>
<div id="app">


    <header class="h-15vh bg-emerald-300 border-4 flex flex-row justify-between content-center">
        <img src="{{asset("/images/logo_birrete.png")}}" alt="logo">
        <h1>TIENDA MOLONA</h1>
        <!-- si no estoy autenticado: -->
        @guest
            <div>
                <form action="login" method="post">
                    @method('post')
                    @csrf
                    <input type="text" name="email" placeholder="email" id=""><br/>
                    <input type="password" name="password" placeholder="password" id=""><br/>
                    <input type="submit" value="Login" name="submit">
                </form>
                <a href="register">Register</a>
            </div>
        @endguest
        <!-- si estoy autenticado: -->
        @auth

            <div>
                Conectado como {{auth()->User()->name}}
                <form action="logout" method="post">
                    @csrf
                    <input type="submit" value="Logout">
                </form>
            </div>
        @endauth

    </header>
    <nav class="h-10 bg-emerald-500 flex-row flex justify-start">
        <a href="{{route("alumnos.index")}}">Alumnos</a>
        <a href="{{route("productos.index")}}">Productos</a>
    </nav>
    <main>
        @yield('contenido')
    </main>
    <footer><span style="color: white">Pilar Laborda</span>
        @copyright PLB
    </footer>
</div>
</body>
</html>
