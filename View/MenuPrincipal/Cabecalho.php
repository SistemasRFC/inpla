<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['cod_usuario'])) {
    header("Location:../../index.php");
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="../../Resources/JavaScript.js"></script>
        <link rel="stylesheet" href="../../Resources/css/style.css?random=<?php echo time(); ?>" type="text/css" />
        <link href="../../Resources/css/redmond/jquery-ui-1.10.3.custom.css" rel="stylesheet">
        <link rel="stylesheet" href="../../Resources/jqx/jqwidgets/styles/jqx.base.css" type="text/css" />
        <link rel="stylesheet" href="../../Resources/jqx/jqwidgets/styles/jqx.bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="../../Resources/jqx/jqwidgets/styles/jqx.darkcyan.css" type="text/css" />
        <script src="../../Resources/js/jquery-1.9.0.js"></script>
        <script src="../../Resources/js/jquery-ui-1.10.0.custom.js"></script>
        <script src="../../Resources/js/jquery.maskedinput.js" type="text/javascript"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxcore.js"></script>       
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxchart.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxdata.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxinput.js"></script> 
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxbuttons.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxscrollbar.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxknob.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxmenu.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxgrid.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxgrid.edit.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxgrid.sort.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxgrid.pager.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxgrid.columnsresize.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxgrid.filter.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxgrid.grouping.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxgrid.selection.js"></script> 
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxdata.js"></script> 
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxdata.export.js"></script> 
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxgrid.export.js"></script> 
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxlistbox.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxdropdownlist.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxcheckbox.js"></script> 
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxradiobutton.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxcalendar.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxnumberinput.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxdatetimeinput.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/globalization/globalize.js"></script>        
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxwindow.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxtabs.js"></script>
        <script type="text/javascript" src="../../Resources/jqx/jqwidgets/jqxtooltip.js"></script>
        <script src="../../Resources/js/jquery.maskMoney.js"></script>
        <script src="../../View/MenuPrincipal/js/Cabecalho.js?random=<?php echo time(); ?>"></script>
        <script src="../../View/MenuPrincipal/js/FuncoesGerais.js?random=<?php echo time(); ?>"></script>
        <script src="../../Resources/swal/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../../Resources/swal/dist/sweetalert.css"> 
        <style>
            a:link, a:visited {
                text-decoration: none;
                color: black;
            }
            a:active {
                text-decoration: none
            }
            .jqx-menu-item-top, .jqx-menu-item
            {
                font-size: 14px;
                vertical-align: middle;
            }
        </style>
    </head>
    <body>
        <div id="cabecalho">
            <table width="100%" align="left" style="border:2px solid #04b9b9;border-bottom: 0px;">
                <tr>
                    <!-- <td align="left" class="cabecalho" style="text-align:left;color:#000000;vertical-align:middle;font-family: arial;" width="40%">
                        INPLA - Invetimentos
                    </td> -->
                    <td class="cabecalho" style="text-align:left;">
                        <?php
                            echo "<a style=\"text-align: left;
                                                height: 10%;
                                                vertical-align: middle;
                                                font-family: Nimbus Mono L;
                                                color: #145b61;\"
                                        href=\"../../View/MenuPrincipal/MenuPrincipalView.php\"><img src='../../Resources/images/Icone_logoRADI.jpg' width='45'>RADI<br> <div style='font-size: 14px;color:#f68920;'>Trading Esportivo</div></a>";
                        ?>
                    </td>
                    <td style="text-align:right;vertical-align:middle;font-size: 17px;font-family: times new roman;">
                        <?php echo $_SESSION['dadosInvestidor']["NME_INVESTIDOR"]; ?>
                    </td>
                    <td style="text-align:right;vertical-align:middle;padding-right: 5px;" width="5%">
                        <?php
                            echo "<a href=\"../../index.php\">
                                        <img src='../../Resources/images/Logof.png' width='40' title='Sair'>
                                    </a>";
                        ?>
                    </td>
                </tr>
            </table>
            <div id="CriaMenu"></div>
        </div>
    </body>
</html>