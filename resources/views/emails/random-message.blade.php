<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style="color: blue">Bienvenido {{ $data['user'] }}</div>
                        <div class="card-body">
                            <h3 class="mt-3">Mensaje enviado correctamente</h3>
                            <h4>Datos:</h4>
                            <ul>
                                <li>Nombre: {{ $data['name'] }}</li>
                                <li>Descripción: {{ $data['description'] }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
