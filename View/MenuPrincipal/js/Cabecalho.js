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

$(document).ready(function(){        
    ExecutaDispatch('MenuPrincipal', 'VerificaSessao', '', VerificaSessao);
});