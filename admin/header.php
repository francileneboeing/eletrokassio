<?php 
    define(ADMIN, 'http://localhost/eletrokassio/admin');
    define(CADASTRAR, 'http://localhost/eletrokassio/admin/cadastrar');
    define(EDITAR, 'http://localhost/eletrokassio/admin/editar');
    define(LISTAR, 'http://localhost/eletrokassio/admin/listar');
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



    <!-- PLUGINS  -->
    <script type="text/javascript" src="<?php echo ADMIN; ?>/js/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN; ?>/js/plugins/jquery/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN; ?>/js/plugins/bootstrap/bootstrap.min.js"></script>        
    <!-- END PLUGINS -->

    <!-- START THIS PAGE PLUGINS-->        
    <script type='text/javascript' src='<?php echo ADMIN; ?>/js/plugins/icheck/icheck.min.js'></script>        
    <script type="text/javascript" src="<?php echo ADMIN; ?>/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN; ?>/js/plugins/scrolltotop/scrolltopcontrol.js"></script>

    <script type='text/javascript' src='<?php echo ADMIN; ?>/js/plugins/noty/jquery.noty.js'></script>
    <script type='text/javascript' src='<?php echo ADMIN; ?>/js/plugins/noty/layouts/topCenter.js'></script>
    <script type='text/javascript' src='<?php echo ADMIN; ?>/js/plugins/noty/layouts/topLeft.js'></script>
    <script type='text/javascript' src='<?php echo ADMIN; ?>/js/plugins/noty/layouts/topRight.js'></script>             
    
    <script type='text/javascript' src='<?php echo ADMIN; ?>/js/plugins/noty/themes/default.js'></script>
    <script type="text/javascript">                                            
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
            })                                                    
        }                                            
    </script>

<?php include ('bd/config.php'); ?>

</head>
<body>