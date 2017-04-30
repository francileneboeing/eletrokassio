<?php 
    define(ADMIN,                  'http://localhost/eletrokassio/admin');
    define(CADASTRAR,              'http://localhost/eletrokassio/admin/cadastrar');    
    define(LISTAR,                 'http://localhost/eletrokassio/admin/listar');
    define(BD,                     'http://localhost/eletrokassio/admin/bd');
    define(DAO,                    'http://localhost/eletrokassio/admin/dao');
    define(CONNECTION,             'http://localhost/eletrokassio/admin/connection');
    define(FOTOS_MARCA,            $_SERVER['DOCUMENT_ROOT'].'/eletrokassio/admin/upload/marca');
    define(FOTOS_MARCA_ABSOLUTO,   'http://localhost/eletrokassio/admin/upload/marca');
    define(FOTOS_BANNER,           $_SERVER['DOCUMENT_ROOT'].'/eletrokassio/admin/upload/banner');
    define(FOTOS_BANNER_ABSOLUTO,  'http://localhost/eletrokassio/admin/upload/banner');
    define(FOTOS_PRODUTO,          $_SERVER['DOCUMENT_ROOT'].'/eletrokassio/admin/upload/produto');    
    define(FOTOS_PRODUTO_ABSOLUTO, 'http://localhost/eletrokassio/admin/upload/produto');    
?>

<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<html lang="pt" class="body-full-height">
<head>        
    <!-- META SECTION -->
    <title>EletroKassio - BG Studio {admin}</title>            
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    
    <link rel="icon" href="<?php echo ADMIN; ?>/img/favicon.ico" type="image/x-icon" />
    <!-- END META SECTION -->
    
    <!-- CSS INCLUDE -->        
    <link rel="stylesheet" type="text/css" id="theme" href="<?php echo ADMIN; ?>/css/estilo.css"/>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- EOF CSS INCLUDE -->       

    <script type="text/javascript" src="<?php echo ADMIN; ?>/js/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN; ?>/js/plugins/jquery/jquery.mask.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN; ?>/js/plugins/jquery/jquery-ui.min.js"></script>
<!--   <script type="text/javascript" src="<?php echo ADMIN; ?>/js/plugins/bootstrap/bootstrap.min.js"></script>        -->

    <script type='text/javascript' src='<?php echo ADMIN; ?>/js/plugins/icheck/icheck.min.js'></script>        
    <script type="text/javascript" src="<?php echo ADMIN; ?>/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN; ?>/js/plugins/scrolltotop/scrolltopcontrol.js"></script>

    <script type='text/javascript' src='<?php echo ADMIN; ?>/js/plugins/noty/jquery.noty.js'></script>
    <script type='text/javascript' src='<?php echo ADMIN; ?>/js/plugins/noty/layouts/topCenter.js'></script>
    <script type='text/javascript' src='<?php echo ADMIN; ?>/js/plugins/noty/layouts/topLeft.js'></script>
    <script type='text/javascript' src='<?php echo ADMIN; ?>/js/plugins/noty/layouts/topRight.js'></script>     
    <script type='text/javascript' src='<?php echo ADMIN; ?>/js/plugins/noty/themes/default.js'></script>
    
    <script type="text/javascript">
        $('.cep').mask("00000-000",           {reverse: false, placeholder: "00000-000"});
        $('.cpf').mask("000.000.000-00",      {reverse: false, placeholder: "000.000.000-00"});
        $('.cnpj').mask("00.000.000/0000-00", {reverse: false, placeholder: "00.000.000/0000-00"});
        $('.money').mask("#.##0,00",          {reverse: true,  placeholder: "R$ 0,00"});
        $('.decimal-2').mask("#.##0,00",      {reverse: true,  placeholder: "0,00"});
        $('.decimal-3').mask("#.##0,000",     {reverse: true,  placeholder: "0,000"});
        $('.decimal-4').mask("#.##0,0000",    {reverse: true,  placeholder: "0,0000"});
        
        function notyConfirm(){
            noty({
                text: 'Do you want to continue?',
                layout: 'topRight',
                buttons: [
                        {addClass: 'btn btn-success btn-clean', text: 'Ok', onClick: function($noty) {
                            $noty.close();
                            noty({text: 'You clicked "Ok" button', layout: 'topRight', type: 'success'});
                        }
                        },
                        {addClass: 'btn btn-danger btn-clean', text: 'Cancel', onClick: function($noty) {
                            $noty.close();
                            noty({text: 'You clicked "Cancel" button', layout: 'topRight', type: 'error'});
                            }
                        }
                    ]
            });                                                    
        }                                            
    </script>

<?php include ('bd/config.php'); ?>

</head>
<body>