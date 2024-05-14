<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Registro de horarios</title>
</head>
<body> 

    <script src = "../js/obtener_param_nombre_nocontrol.js"></script>

    <section>
    <h1>Registrar horarios</h1>

    <form action="../forms/iniciosesion.php" method="post">
<br>
<br>
<input type="hidden" id="nocontrol" name="nocontrol" value='<?= $_GET['nocontrol']?>'>
<input type="hidden" id="nombre" name="nombre" value='<?= $_GET['nombre']?>'>
<br>
<br>
<section>
    <h4>Dia</h4>
        <br>
            <label for="dia[]">Lunes</label>
            <input id= "dia[]" name="dia[]" value="Lunes" type="checkbox">
        <br>
            <label for="dia[]">Martes</label>
            <input id= "dia[]" name="dia[]" value="Martes" type="checkbox">
        <br>
            <label for="dia[]">Miercoles</label>
            <input id= "dia[]" name="dia[]" value="Miercoles" type="checkbox">
        <br>
            <label for="dia[]">Jueves</label>
            <input id= "dia[]" name="dia[]" value="Jueves" type="checkbox">
        <br>
            <label for="dia[]">Viernes</label>
            <input id= "dia[]" name="dia[]" value="Viernes" type="checkbox">
    </section>
<br>
<br>
<section> --hora
    <h4>Hora</h4>

            <label for="78">7-8</label>
            <input id="78" name="hora[]" value="7-8" type="checkbox">
        <br>
            <label for="89">8-9</label>
            <input id="89" name="hora[]" value="8-9" type="checkbox">
        <br>
            <label for="910">9-10</label>
            <input id="910" name="hora[]" value="9-10" type="checkbox">
        <br>
            <label for="1011">10-11</label>
            <input id="1011" name="hora[]" value="10-11" type="checkbox">
        <br>
            <label for="1112">11-12</label>
            <input id="1112" name="hora[]" value="11-12" type="checkbox">
        <br>   
            <label for="1213">12-13</label>
            <input id="1213" name="hora[]" value="12-13" type="checkbox">
        <br>
            <label for="1314">13-14</label>
            <input id="1314" name="hora[]" value="13-14" type="checkbox">
        <br>
            <label for="1415">14-15</label>
            <input id="1415" name="hora[]" value="14-15" type="checkbox">
        <br>
            <label for="1516">15-16</label>
            <input id="1516" name="hora[]" value="15-16" type="checkbox">
        <br>
            <label for="1617">16-17</label>
            <input id="1617" name="hora[]" value="16-17" type="checkbox">
        <br>
            <label for="1718">17-18</label>
            <input id="1718" name="hora[]" value="17-18" type="checkbox">
        <br>
            <label for="1819">18-19</label>
            <input id="1819" name="hora[]" value="18-19" type="checkbox">
            
</section>
<br>
<input type="submit" value="Enviar" >
</section>
</form>
</body>
</html>