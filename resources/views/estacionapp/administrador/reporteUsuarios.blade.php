<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet"> --}}
    <style>
        #tblUsuarios {
            font-family: 'Oswald', sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #tblUsuarios td,
        #tblUsuarios th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #tblUsuarios tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #tblUsuarios th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #ffcc00;
            color: white;
        }
        #tituloUsuarios{
            font-family: 'Oswald', sans-serif;
        }
        .header-repo img{
            width: 200px;
        }
        .header-repo h1{
            text-align: center;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="header-repo">
        <img src="img/icono-512x512-2.png">
        <h1 id="tituloUsuarios">Usuarios Sistema</h1>
    </div>
    <div style="padding-top: 50px;">
        <table id="tblUsuarios">
            <thead>
                <tr>
                    <th>Rut</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>
                        {{$user->rut}}
                    </td>
                    <td>
                        {{$user->name}}
                    </td>
                    <td>
                        {{$user->last_name}}
                    </td>
                    <td>
                        {{$user->email}}
                    </td>
                    <td>
                        {{$user->phone}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</body>

</html>