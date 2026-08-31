<?php

$errores = [];

// Verificar que el formulario fue enviado mediante POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Acceso no permitido.");
}

// RECIBIR LOS DATOS

$nombre = trim($_POST["nombre_usuario"] ?? "");
$apellido = trim($_POST["apellido_usuario"] ?? "");
$correo = trim($_POST["correo_usuario"] ?? "");
$edad = trim($_POST["edad_usuario"] ?? "");
$documento = trim($_POST["documento_usuario"] ?? "");
$contrasena = $_POST["contrasena_usuario"] ?? "";

// VALIDAR NOMBRE

if ($nombre === "") {

    $errores[] = "El nombre es obligatorio.";

} elseif (!preg_match("/^[A-Za-zÁÉÍÓÚáéíóúÑñÜü ]{2,50}$/u", $nombre)) {

    $errores[] = "El nombre solo debe contener letras y espacios.";
}

// VALIDAR APELLIDO

if ($apellido === "") {

    $errores[] = "El apellido es obligatorio.";

} elseif (!preg_match("/^[A-Za-zÁÉÍÓÚáéíóúÑñÜü ]{2,50}$/u", $apellido)) {

    $errores[] = "El apellido solo debe contener letras y espacios.";
}

// VALIDAR CORREO

if ($correo === "") {

    $errores[] = "El correo es obligatorio.";

} elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {

    $errores[] = "El correo electrónico no es válido.";
}

// VALIDAR EDAD

if ($edad === "") {

    $errores[] = "La edad es obligatoria.";

} elseif (!filter_var($edad, FILTER_VALIDATE_INT)) {

    $errores[] = "La edad debe ser un número entero.";

} elseif ($edad < 1 || $edad > 120) {

    $errores[] = "La edad debe estar entre 1 y 120 años.";
}

// VALIDAR DOCUMENTO

if ($documento === "") {

    $errores[] = "El documento es obligatorio.";

} elseif (!preg_match("/^[0-9]{6,15}$/", $documento)) {

    $errores[] = "El documento debe contener entre 6 y 15 números.";
}



// VALIDAR CONTRASEÑA

if ($contrasena === "") {

    $errores[] = "La contraseña es obligatoria.";

} elseif (strlen($contrasena) < 8) {

    $errores[] = "La contraseña debe tener mínimo 8 caracteres.";

} elseif (!preg_match("/[A-Z]/", $contrasena)) {

    $errores[] = "La contraseña debe tener al menos una letra mayúscula.";

} elseif (!preg_match("/[a-z]/", $contrasena)) {

    $errores[] = "La contraseña debe tener al menos una letra minúscula.";

} elseif (!preg_match("/[0-9]/", $contrasena)) {

    $errores[] = "La contraseña debe tener al menos un número.";

} elseif (!preg_match("/[^A-Za-z0-9]/", $contrasena)) {

    $errores[] = "La contraseña debe tener al menos un carácter especial.";
}

// MOSTRAR RESULTADO

if (!empty($errores)) {

    echo "<h2>Se encontraron los siguientes errores:</h2>";

    echo "<ul>";

    foreach ($errores as $error) {
        echo "<li>" . htmlspecialchars($error) . "</li>";
    }

    echo "</ul>";

    echo '<br><a href="Index.html">Volver al formulario</a>';

    exit;
}

// SI TODO ESTÁ CORRECTO

echo "<h1>Formulario enviado correctamente</h1>";

echo "<p><strong>Nombre:</strong> " . htmlspecialchars($nombre) . "</p>";

echo "<p><strong>Apellido:</strong> " . htmlspecialchars($apellido) . "</p>";

echo "<p><strong>Correo:</strong> " . htmlspecialchars($correo) . "</p>";

echo "<p><strong>Edad:</strong> " . htmlspecialchars($edad) . "</p>";

echo "<p><strong>Documento:</strong> " . htmlspecialchars($documento) . "</p>";

echo "<p><strong>Contraseña:</strong> ********</p>";

?>
