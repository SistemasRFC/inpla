//window.location.href='../../View/MenuPrincipal/Redirect.php';
$(document).ready(function(){
    $("input[type='button']").each(function(){
        $(this).jqxButton({theme: theme});            
    });
    $("input[type='text']").each(function(){
        $(this).jqxInput({theme: theme, height: 25});          
    }); 
});
function VerificaSessao(result){
    if (!result){            
        window.location.href='../../index.php';
    }else{
        CarregaMenu();
    }
}

function CriarCombo(nmeCombo, url, parametros, dataFields, displayMember, valueMember, valor){ 
    $("#td"+nmeCombo).html('');
    $("#td"+nmeCombo).html('<div id="'+nmeCombo+'"></div>');
    var dados = dataFields.split('|');
    var lista = new Array();
    for (i=0;i<dados.length;i++){
        var data = new Object();
        data.name = dados[i];
        lista.push(data);
    }

    var dados = parametros.split('|');   
    var obj = new Object();
    for (i=0;i<dados.length;i++){
        var campos = dados[i].split(';');
        Object.defineProperty(obj, campos[0], {
                            __proto__: null,
                            enumerable : true,
                            configurable : true,
                            value: campos[1] });
    }
    var source =
    {
        datatype: "json",
        type: "POST",
        datafields: lista,
        cache: false,
        url: url,
        data: obj
    };       
    var dataAdapter = new $.jqx.dataAdapter(source,{
        loadComplete: function (records){         
            $("#"+nmeCombo).jqxDropDownList(
            {
                source: records[1],
                theme: theme,
                width: 200,
                height: 25,
                selectedIndex: 0,
                displayMember: displayMember,
                valueMember: valueMember
            }); 
            if (valor!='undefined'){
                $("#"+nmeCombo).val(valor);
            }
        },
        async:true
                     
    });  
    dataAdapter.dataBind();    
}

function CriarComboTamanho(nmeCombo, largura, altura, larguraDrop, url, parametros, dataFields, displayMember, valueMember, valor){ 
    $("#td"+nmeCombo).html('');
    $("#td"+nmeCombo).html('<div id="'+nmeCombo+'"></div>');
    var dados = dataFields.split('|');
    var lista = new Array();
    for (i=0;i<dados.length;i++){
        var data = new Object();
        data.name = dados[i];
        lista.push(data);
    }

    var dados = parametros.split('|');   
    var obj = new Object();
    for (i=0;i<dados.length;i++){
        var campos = dados[i].split(';');
        Object.defineProperty(obj, campos[0], {
                            __proto__: null,
                            enumerable : true,
                            configurable : true,
                            value: campos[1] });
    }
    var source =
    {
        datatype: "json",
        type: "POST",
        datafields: lista,
        cache: false,
        url: url,
        data: obj
    };       
    var dataAdapter = new $.jqx.dataAdapter(source,{
        loadComplete: function (records){         
            $("#"+nmeCombo).jqxDropDownList(
            {
                source: records[1],
                theme: theme,
                width: largura,
                height: altura,
                dropDownWidth: larguraDrop,
                selectedIndex: 0,
                displayMember: displayMember,
                valueMember: valueMember
            }); 
            if (valor!='undefined'){
                $("#"+nmeCombo).val(valor);
            }
        },
        async:true
                     
    });  
    dataAdapter.dataBind();    
}

/**
 * 
 * @param {type} arrCampos
 * @param {type} valorPadrao (Passar o nome do campo concatenado com ';' e após o tipo do campo e depois '|' ex.:IND_ATIVO;B|
 * @returns {undefined}
 */
function preencheCamposForm(arrCampos, valorPadrao){
    var entrou = false;
    for (var k in arrCampos){
        if (typeof arrCampos[k] !== 'function') {
            var LK = k.toLowerCase();
            var ret = LK.split('_');
            var campo='';
            for (var i=0;i<ret.length;i++){
                if (i>0){
                    campo += ret[i].substring(0,1).toUpperCase()+ret[i].substring(1,ret[i].lenght);
                }else{
                    campo = ret[i];
                }
            }
            if (valorPadrao!=undefined){
                var valores = valorPadrao.split('|');
                for (i=0;i<valores.length;i++){
                    var tipo = valores[i].split(';');
                    var entrou = false;
                    if (tipo[0]==campo){
                        switch (tipo[1]) {
                            case 'B':
                                if (arrCampos[k]=='S'){
                                    $("#"+campo).prop('checked', true);
                                }else{
                                    $("#"+campo).prop('checked', false);
                                }
                                break;
                            default:
                                $("#"+campo).val(arrCampos[k]);
                                break;
                        }
                        entrou=true;
                    }
                }
            }
            if (!entrou){
                $("#"+campo).val(arrCampos[k]);
            }
        }
    }
}

function LimparCampos(){
    $(".persist").each(function(index) { 
        switch ($(this).attr('type')) {
            case 'checkbox':
                $(this).prop("checked", false);
                break;                
            case 'file':
                $(this).replaceWith($(this).val('').clone(true));
                break;
            case 'text':
            case 'hidden':
                $(this).val('');
                break;                
            default:
                $(this).val('0');
                break;
        }
    });
}

$(document).ready(function(){        
    ExecutaDispatch('MenuPrincipal', 'VerificaSessao', '', VerificaSessao);
});