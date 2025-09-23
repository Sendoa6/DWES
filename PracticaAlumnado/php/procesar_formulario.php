   <?php

    include 'conexiones.php';

    //Recogida de información del formulario 
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $curso = $_POST["curso"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password = hash('sha512', $password);

    //Comprobación del email
    if (strpos($email, '@') == false && strpos($email, '.') == false) {
        echo "<script type='text/javascript'>alert('Error. Correo electrónico inválido.');</script>";
        header("Refresh: 0.1; url=../formulario.php");
        exit;
    }
 
    //Verificar si el correo ya existe en la base de datos
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM alumnos WHERE Email='$email' ");
    if (mysqli_num_rows($verificar_correo) > 0){
        echo "<script type='text/javascript'>alert('Este correo ya está en uso, intenta con uno diferente');</script>";
        header("Refresh: 0.1; url=../formulario.php");
        exit();
    }   

    //comprobar que no haya 25
    $max_25 = mysqli_query($conexion, "SELECT * FROM alumnos WHERE Curso='$curso'");
    if (mysqli_num_rows($max_25) >= 25){
        echo "<script type='text/javascript'>alert('En este modulo ya existen mas de 25 alumnos matriculados, por favor habla con secretaria para buscar una alternativa.');</script>";
        header("Refresh: 0.1; url=../formulario.php");
        exit();
    }   

    
    $query = "INSERT INTO alumnos (Nombre,Apellidos,Fecha_Nacimiento,Curso,Email,contrasena) VALUES ('$nombre','$apellidos','$fecha_nacimiento','$curso','$email','$password')";
    $ejecutar = mysqli_query($conexion, $query);

    
    if ($ejecutar){
        echo "<script type='text/javascript'>alert('Usuario creado correctamente');</script>";
        header("Refresh: 0.1; url=../formulario.php");
    }

    mysqli_close($conexion);

?>