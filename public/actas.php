<?php
include('/src/conexion.php');
session_start();
error_reporting(0);

if(isset($_POST['submit']))
{
    $RUT = $_POST['RUT'];
    $Nombres = $_POST['Nombres'];
    $Apellidos = $_POST['Apellidos'];
    $Direccion = $_POST['Direccion'];
    $Ciudad = $_POST['Ciudad'];
    $Telefono = $_POST['Telefono'];
    $Email = $_POST['Email'];
    $F_Nacimiento = $_POST['F_Nacimiento'];
    $Est_Civil = $_POST['Est_Civil'];
    $Comentarios = $_POST['Comentarios'];

    // Verificar si ya existe un registro con el mismo Rut
    $existingQuery = mysqli_query($con, "SELECT * FROM Cliente WHERE RUT='$RUT'");
    if (mysqli_num_rows($existingQuery) > 0) {
        // Actualizar los datos existentes
        
        $updateQuery = mysqli_query($con, "UPDATE Cliente SET 
            Nombres='$Nombres', Apellidos='$Apellidos', Direccion='$Direccion',
            Ciudad='$Ciudad', Telefono='$Telefono', Email='$Email', 
            F_Nacimiento='$F_Nacimiento', Est_Civil='$Est_Civil', Comentarios='$Comentarios' 
            WHERE RUT='$RUT'");

        if ($updateQuery) {
            echo "Datos actualizados correctamente.";
            echo "<script>window.location.href='index.php'</script>";
        } else {
            echo "Algo salió mal al actualizar los datos. Inténtalo de nuevo.";
        }
    } else {
        // Insertar nuevo registro
        $query = mysqli_query($con, "INSERT INTO Cliente(RUT, Nombres, Apellidos, Direccion, Ciudad, Telefono,
         Email, F_Nacimiento, Est_Civil, Comentarios) 
         VALUE('$RUT', '$Nombres','$Apellidos','$Direccion','$Ciudad','$Telefono',
         '$Email','$F_Nacimiento', '$Est_Civil', '$Comentarios')");
         
        if ($query) {
            echo "Datos ingresados correctamente.";            
            echo "<script>window.location.href='index.php'</script>";
        } else {
            echo "Algo salió mal al insertar los datos. Inténtalo de nuevo.";
        }
    }
}
?>