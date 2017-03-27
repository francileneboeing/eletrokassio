<!-- START PRELOADS -->
    <audio id="audio-alert" src="<?php echo ADMIN; ?>/audio/alert.mp3" preload="auto"></audio>
    <audio id="audio-fail" src="<?php echo ADMIN; ?>/audio/fail.mp3" preload="auto"></audio>
    <!-- END PRELOADS -->      
        
    <script type="text/javascript" src="<?php echo ADMIN; ?>/js/plugins/rickshaw/rickshaw.min.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN; ?>/js/plugins/jquery/jquery.mask.js"></script>
    <script type='text/javascript' src='<?php echo ADMIN; ?>/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
    <script type='text/javascript' src='<?php echo ADMIN; ?>/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
    <script type='text/javascript' src='<?php echo ADMIN; ?>/js/plugins/bootstrap/bootstrap-datepicker.js'></script>                
    <script type="text/javascript" src="<?php echo ADMIN; ?>/js/plugins/owl/owl.carousel.min.js"></script>  
    <script type="text/javascript" src="<?php echo ADMIN; ?>/js/plugins/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN; ?>/js/plugins/bootstrap/bootstrap-select.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN; ?>/js/plugins/tagsinput/jquery.tagsinput.min.js"></script>               
    <script type="text/javascript" src="<?php echo ADMIN; ?>/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN; ?>/js/plugins/morris/raphael-min.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN; ?>/js/plugins/rickshaw/d3.v3.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN; ?>/js/plugins/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN; ?>/js/plugins/daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN; ?>/js/plugins/dropzone/dropzone.min.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN; ?>/js/plugins/fileinput/fileinput.min.js"></script>        
    <script type="text/javascript" src="<?php echo ADMIN; ?>/js/plugins/filetree/jqueryFileTree.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN; ?>/js/plugins/summernote/summernote.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN; ?>/js/plugins.js"></script>        
    <script type="text/javascript" src="<?php echo ADMIN; ?>/js/actions.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN; ?>/js/demo_dashboard.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN; ?>/js/bg/utilsbg.js"></script>
    
        <script>
            var editor = CodeMirror.fromTextArea(document.getElementById("codeEditor"), {
                lineNumbers: true,
                matchBrackets: true,
                mode: "application/x-httpd-php",
                indentUnit: 4,
                indentWithTabs: true,
                enterMode: "keep",
                tabMode: "shift"                                                
            });
            editor.setSize('100%','420px');
        </script>   

        <!-- END SCRIPTS -->         
    </body>
</html>