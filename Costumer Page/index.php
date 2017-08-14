<?php

$img = 0;
$customid = '';
$emplid = '';
$datesent = '';

 if(isset($_GET['emplid']) && isset($_GET['custoid']) && isset($_GET['datesent']))
{
            $customid = $_GET['custoid'];
            $emplid = $_GET['emplid'];
            $datesent = $_GET['datesent'];

    if(isset($_GET['star_note']) && isset($_GET['issue_solved']))
        {
            $today = date("Y/m/d");
            $sql = "INSERT INTO form(commentary, idcustomer, idemployee, 
            evaluation_value,issue_solve, request_sent, request_answered) VALUES ('".$_GET['commentary']."'
            ,".$customid.",".$emplid.",".$_GET['star_note'].",'".$_GET['issue_solved']."','".$datesent."', '".$today."')";

            $connection = mysqli_connect("127.0.0.1", "root", "123", "satisfactionbd");

        $result = $connection->query($sql);
        if($result == 1){
            $img = 1;
            header("location: http://www.mafrainformatica.com.br"); 
        }
        else{
            header("location: http://www.mafrainformatica.com.br"); 
        }
}
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="Things.js"></script>
    <link rel="shortcut icon" href="http://www.mafrainformatica.com/wp-content/uploads/2015/12/favicon.png" type="image/x-icon"
    />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />  
    <link href="Style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="stylemedia.css" rel="text/css" />
    <title>Mafra - Pesquisa de satisfação</title>
    <body>
        <input type="hidden" name="custoid"  id="custoids" value="<?php echo $customid ?>" />
		<input type="hidden" name="emplid" id="empids" value="<?php echo $emplid ?>" />
		<input type="hidden" name="datesent" id="datesents" value="<?php echo $datesent ?>" />
        <!--HEDAER-->
        <div class="headdivcontainer">
            <div class="contact">
            <label>Fale conosco: Belo Horizonte Tel - (031) 3479-2900<br>Juiz de Fora - (032) 3231-0482</label>
            </div>
        </div>
        <!--/HEADER-->
        <!-- The Modal -->
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header" id="modalhead">
                    <span class="close">&times;</span>
                    <?php if($img == 0){echo "<h2>Enviando sua resposta...</h2>";}
                    else{echo "<h2>Resposta enviada com sucesso!</h2>";}
                    ?>
                </div>
                <div class="modal-body">
                <?php 
                if($img == 0){echo " <div class='loader'></div>";}
                else{echo "<img style='height: 90px;z-index: 1;position: relative;
                margin-top: 10px;left: 40%;'src='Img/sucessfull.png'>";
               }
                ?>
                </div>
            </div>
        </div>
        <div class="frmmain">
             <div class="topheader">
                        <a href="http://www.mafrainformatica.com.br" target="_blank">
                            <img src="Img/mafra.png" style="padding: 4px 2px 2px 13px" /></a>
                        <div class="buttondiv">
                            <button id="btnsender" Text="Enviar" />Enviar</button>
                        </div>
                    </div>
            <div class="squares" id="starsdiv1">
                <div id="firstlabelfield">
                    <label>Como você avalia a cordialidade do técnico ?</label>
                    <div class="required">
                        *
                        <span class="msgrequired">Campo Obrigatório</span>
                    </div>
                </div>
                <div class="stars">
                    <form action="">
                        <input class="star star-5" id="star-5" type="radio" name="star" />
                        <label data-toggle="tooltip" title="Excelente" class="star star-5" for="star-5"></label>
                        <input class="star star-4" id="star-4" type="radio" name="star" />
                        <label data-toggle="tooltip" title="Muito bom" class="star star-4" for="star-4"></label>
                        <input class="star star-3" id="star-3" type="radio" name="star" />
                        <label data-toggle="tooltip" title="Bom" class="star star-3" for="star-3"></label>
                        <input class="star star-2" id="star-2" type="radio" name="star" />
                        <label data-toggle="tooltip" title="Regular" class="star star-2" for="star-2"></label>
                        <input class="star star-1" id="star-1" type="radio" name="star" />
                        <label data-toggle="tooltip" title="Ruim" class="star star-1" for="star-1"></label>
                    </form>
                </div>
            </div>
            <div class="squares" id="starsdiv2">
                <div class="labelsfield">
                    <label>A sua solicitação foi atendida ?</label>
                    <div class="required">
                        *
                        <span class="msgrequired">Campo Obrigatório</span>
                    </div>
                </div>
                <div class="radioyesno">
                    <div class="buttonsradios">
                        <input type="radio" id="radio01" class="radios" name="radio" />
                        <label for="radio01" class="radiolabels"><span></span>Sim</label>
                        <div class="check">
                            <div class="inside"></div>
                        </div>
                    </div>
                    <div class="buttonsradios">
                        <input type="radio" id="radio02" class="radios" name="radio" />
                        <label for="radio02" class="radiolabels"><span></span>Não</label>
                        <div class="check">
                            <div class="inside"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="lasttopic">
                <div class="labelsfield">
                    <label>Deixe-nos um comentário:</label>
                    <div>
                        <textarea runat="server" id="txtopnion" name="txtopnion" maxlength="200"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // Get the modal
            var modal = document.getElementById('myModal');
            var issue_solve;
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
              //  $get = window.location.href.split("/").pop();
              $get = window.location.href.split("=");
              var g = $get.LastIndexOf("dwAfwACafWgeWQSQ");
                if(g != -1){
                modal.style.display = "block";
                }
            });
            //for when the radio buttons been setted
            $('#starsdiv1 input').on('change', function () {
                $('#starsdiv1').css('border', 'none');
                $('#starsdiv1').css("border-bottom", "1px solid #D6D6D6");
            });
            $('#starsdiv2 input').on('change', function () {
                $('#starsdiv2').css('border', 'none');
                $('#starsdiv2').css("border-bottom", "1px solid #D6D6D6");
            });
            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];
            // When the user clicks on <span> (x), close the modal
            span.onclick = function () {
                modal.style.display = "none";
            }
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
</script>
<script>
                //Check if the required field are marked
            $('#btnsender').click(function () {
                var trysend1, trysend2;
                if ($('#star-1').is(':checked') || $('#star-2').is(':checked') || $('#star-3').is(':checked') || $('#star-4').is(':checked') || $('#star-5').is(':checked')) {
                    trysend1 = true;
                }
                else {
                    $('#starsdiv1').css({ 'border': 'solid', 'border-color': '#B8040E' });
                }
                if ($('#radio01').is(':checked') || $('#radio02').is(':checked')) {
                    trysend2 = true;
                }
                else {
                    trysend = false;
                    $('#starsdiv2').css({
                        'border': 'solid', 'border-color': '#B8040E',
                    });
                }
                if (trysend1 == true && trysend2 == true) {
                    // When the user clicks the button, open the modal 
                    modal.style.display = "block";
                    var starvalue;

                    if(document.getElementById('star-1').checked){
                        starvalue = 1;
                    }
                    else if(document.getElementById('star-2').checked){
                        starvalue = 2;
                    }
                    else if(document.getElementById('star-3').checked){
                        starvalue = 3;
                    }
                    else if(document.getElementById('star-4').checked){
                        starvalue = 4;
                    }
                    else{
                        starvalue = 5;
                    }
                     if(document.getElementById('radio01').checked){
                        issue_solve = "yes";
                    }
                     if(document.getElementById('radio02').checked){
                        issue_solve = "no";
                     }

                    var empid = document.getElementById('empids').value;
                    var custoid = document.getElementById('custoids').value;
                    var datesent = document.getElementById('datesents').value;
                    var comment = document.getElementById('txtopnion').value;
                    window.location.href = "index.php?star_note=" +starvalue+"\u0026issue_solved="
                    +issue_solve+"\u0026commentary="+comment+"\u0026empid="+empid+"\u0026custoid="+custoid+"\u0026datesent="+datesent+"\u0026passnext=dwAfwACafWgeWQSQ";
                }
            });
    </script>
    </body>
</html>