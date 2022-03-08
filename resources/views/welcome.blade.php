<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets/logo-mini.png') }}" type="image/x-icon">
    <title>Bienvenu sur Carbure +</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .centerise {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .main {
            min-height: 100vh;
            width: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-image: url("{{ asset('assets/bg.jpg') }}")
        }

        a{
            text-decoration: none;
            cursor: pointer;
        }

    </style>
</head>

<body>
    <div class="main centerise">
        <a href="{{ route('compagnie.index') }}">
            <button>
                Compagnie
            </button>
        </a>
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;
        <a href="{{ route("station.index") }}">
            <button>
                Station
            </button>
        </a>
    </div>
</body>

</html>
