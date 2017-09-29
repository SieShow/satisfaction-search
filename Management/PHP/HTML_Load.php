<?php
function Nex_PreviewButtons($number){
    if($number > 13){
        echo "<div id='tableend'>";
            echo "<button id='btnback'>Voltar</button>";
            echo "<button id='btnnext'>Próxima</button>";
        echo "</div>";
    }
}
?>