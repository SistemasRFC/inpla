function CarregaDados(dados){
    var ValorTotal = dados[1][0]["VLR_TOTAL"]
    var ValorSacado = dados[1][0]["VLR_SACADO"];
    var ValorRestante = dados[1][0]["VLR_RESTANTE"];
    var ValorMax = '';
    if (ValorTotal > 0){
        ValorMax = ValorTotal;
    } else {
        ValorMax = 1;
    }
            $('#DadosInvestimentoKnob').jqxKnob({
                value: ValorTotal,
                min: 0,
                max: ValorMax,
                startAngle: 180,
                endAngle: 540,
                snapToStep: true,
                pointerGrabAction: 'progressBar',
                allowValueChangeOnDrag: false,
                allowValueChangeOnClick: false,
                allowValueChangeOnMouseWheel: false,
                rotation: 'clockwise',
                style: { fill: '#FFFFFF' },
                progressBar: {
                    style: { fill: '#18a25e', stroke: '#18a25e' },
                    size: '18%',
                    offset: '78%',
                    background: { fill: '#cfd0d4', stroke: '#cfd0d4' }
                },
                pointer: { type: 'line', visible: false, style: { fill: '#18a25e' }, size: '18%', offset: '78%', thickness: 0 }
            });
            var input = $('<div class="inputField">');
            var input2 = $('<div class="inputField2">');
            var input3 = $('<div class="inputField3">');
            var knob2 = $('<div id="knob2">');
            var knob3 = $('<div id="knob3">');
            $('#DadosInvestimentoKnob').append(knob2);
            $('#knob2').jqxKnob({
                value: ValorSacado,
                min: 0,
                max: ValorMax,
                startAngle: 190,
                width: 300,
                height: 300,
                endAngle: 350,
                snapToStep: true,
                pointerGrabAction: 'progressBar',
                allowValueChangeOnDrag: false,
                allowValueChangeOnClick: false,
                allowValueChangeOnMouseWheel: false,
                rotation: 'clockwise',
                style: { fill: 'transparent' },
                marks: {
                    drawAboveProgressBar: true,
                    colorRemaining: 'white',
                    colorProgress: 'white',
                    style: 'line',
                    offset: '78%',
                    thickness: 2,
                    size: '18%',
                    minorInterval: 12
                },
                progressBar: {
                    style: { fill: '#407ec3', stroke: '#407ec3' },
                    size: '18%',
                    offset: '78%',
                    background: { fill: '#cfd0d4', stroke: '#cfd0d4' }
                },
                pointer: { type: 'line', visible: false, style: { fill: '#33AADD' }, size: '18%', offset: '78%', thickness: 0 }
            });
            $(knob2).append(knob3);
            $('#knob3').jqxKnob({
                value: ValorRestante,
                min: 0,
                max: ValorMax,
                startAngle: 10,
                width: 300,
                height: 300,
                endAngle: 170,
                snapToStep: true,
                pointerGrabAction: 'progressBar',
                allowValueChangeOnDrag: false,
                allowValueChangeOnClick: false,
                allowValueChangeOnMouseWheel: false,
                rotation: 'clockwise',
                style: { fill: 'transparent' },
                marks: {
                    drawAboveProgressBar: true,
                    colorRemaining: 'white',
                    colorProgress: 'white',
                    style: 'line',
                    offset: '78%',
                    thickness: 2,
                    size: '18%',
                    minorInterval: 12
                },
                progressBar: {
                    style: { fill: '#ef6100', stroke: '#ef6100' },
                    size: '18%',
                    offset: '78%',
                    background: { fill: '#cfd0d4', stroke: '#cfd0d4' }
                },
                pointer: { type: 'line', visible: false, style: { fill: '#00a4e1' }, size: '18%', offset: '78%', thickness: 0 }
            });
            // Add label element to the Knob widget and attach event handlers to update them when the widget value updates.
            // Note that labels need not be sub elements of the knobs, and they are there just to display that they can be.
            $('#DadosInvestimentoKnob').append(input);
            $('#knob2').append(input2);
            $('#knob3').append(input3);
            $(input).html('<span style="font-size: 24px; width: 30%; display:inline-block; color: #18a25e">Total</span><span style="width:70%; display:inline-block;">R$ ' + ValorTotal + ',00</span>');
            $(input2).html('<div style="font-size: 18px; color: #407ec3">Valor Sacado</div><div>R$ ' + ValorSacado + ',00</div>');
            $(input3).html('<div>R$ ' + ValorRestante + ',00</div><div style="font-size: 18px; color: #ef6100">Valor Restante</div>');
}

$(document).ready(function() {
    ExecutaDispatch('MenuPrincipal', 'CarregaDadosInvestidor', 'verificaPermissao;N|', CarregaDados);
});
