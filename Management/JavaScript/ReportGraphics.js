   window.onload = function(){
        var chart = new CanvasJS.Chart("graphic1", {
            title:{
                text: "Proporção Envio/Respostas"
            },
            legend:{
                maxWidth: 350,
                itemWidth: 120
            },
            data: [
                {
                    type: "pie",
                    showInLegend: false,
                    legendText: "{indexLabel}",
                    dataPoints:[
                        {y: 10, indexLabel: "teste"},
                        {y: 40, indexLabel: "teste"},
                    ]
                }
            ]
        });
        chart.render();
    }