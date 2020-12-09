<?php

//cuando se crean archivo en este nivel de la aplicacion, es necesario decirle a composer que identifique este archivo y lo cargue para ello se dirige al archivo composer.json, en la seccion autoload agregar un objeto "files": ["app/helpers.php"] siguiente a esto se debe decirle a composer que hay uncambio y que compile de nuevo para ello se digita #composer dumpautoload

// Otra forma de crear un helper e incluirlo en el framework es registrarlo en el archivo Providers/AppServiceProvider.php en el metodo register() para ello en este metodo se incluye la ruta del archivo helper de esta manera require_once __DIR__ . '/../Helpers/Helpers.php';

function getNameHelper(){
	return 'Ejercicio de aprendizaje';
}