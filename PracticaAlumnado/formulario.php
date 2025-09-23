<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Alumnado</title>
  <link rel="stylesheet" href="css/formulario.css">
</head>
  <div class="container">
    <h2>Registro de Alumnado</h2>
    <form action="/php/procesar_formulario.php" method="POST">
      <!-- Nombre -->
      <div>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
      </div>

      <!-- Apellidos -->
      <div>
        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required>
      </div>

      <!-- Fecha de nacimiento -->
      <div>
        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
      </div>

      <!-- Curso -->
      <div>
        <label for="curso">Curso:</label>
        <select id="curso" name="curso" required>
          <option value="" disabled selected>Selecciona un curso</option>
          <option value="1">1º de la ESO</option>
          <option value="2">2º de la ESO</option>
          <option value="3">3º de la ESO</option>
          <option value="4">4º de la ESO</option>
        </select>
      </div>

      <!-- Email -->
      <div>
        <label for="email">Email de Educamos:</label>
        <input type="email" id="email" name="email" placeholder="usuario@educamos.com" required>
      </div>

      <!-- Contraseña -->
      <div>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
      </div>

      <!-- Botón -->
      <button type="submit">Registrar Alumno</button>
    </form>
  </div>
  <div id="cajaTabla">
    <h1>ALUMNOS YA MATRICULADOS</h1>
        <table>
          <thead>
            <t>
              <th>NOMBRE</th>
              <th>APELLIDOS</th>
              <th>CURSO</th>
            </t>
          </thead>
      <?php
      include 'php/conexiones.php';

      if (!$conexion) {
        die("Error al conectar a la base de datos: " . mysqli_connect_error());
      }

      $sql = "SELECT Nombre, Apellidos, Curso FROM alumnos ORDER BY Curso, Apellidos";
      $result = mysqli_query($conexion, $sql);

      if ($result && mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . htmlspecialchars($row['Nombre']) . "</td>";
          echo "<td>" . htmlspecialchars($row['Apellidos']) . "</td>";
          echo "<td>" . htmlspecialchars($row['Curso']) . "</td>";
          echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='4'>No hay préstamos registrados.</td></tr>";
    }

      ?>
    </table>
  </div>
</body>
</html>
