<html>
    
    <body onload="cleanhorariosreg()">
    <form action = ../forms/reghorario.php" method="$_POST">
    <section>
    </section>
    <?php
    session_start();
    if(isset($_SESSION['datesya']) && !empty($_SESSION['datesya'])){
        $arraydateya = $_SESSION['datesya'];
        echo "<h1> Los siguientes horarios ya estan registrados </h1>";
        echo "<table border= '1'>";
        echo "<tr><th>NoControl</th><th>Dias</th><th>Hora</th> </tr>"; 
        foreach($arraydateya as $nestedarray):
            foreach($nestedarray as $innerarray):
                echo "<tr>";
                echo "<td>". $innerarray['nocontrol']. "</td>";
                echo "<td>". $innerarray['dias']. "</td>";
                echo "<td>". $innerarray['hora']. "</td>";
                echo "</tr>";
            endforeach;
    endforeach;
            echo("</table>");
    session_unset();
    session_destroy();
    }else{

    }
    ?>