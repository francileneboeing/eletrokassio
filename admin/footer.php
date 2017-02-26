
    <!-- START PRELOADS -->
    <audio id="audio-alert" src="<?php echo $url; ?>/audio/alert.mp3" preload="auto"></audio>
    <audio id="audio-fail" src="<?php echo $url; ?>/audio/fail.mp3" preload="auto"></audio>
    <!-- END PRELOADS -->      
        
    <!-- START SCRIPTS -->

        <!-- Plugins Tabelas -->   
        <script type="text/javascript" src="<?php echo $url; ?>/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo $url; ?>/js/plugins/tableexport/tableExport.js"></script>
        <script type="text/javascript" src="<?php echo $url; ?>/js/plugins/tableexport/jquery.base64.js"></script>
        <script type="text/javascript" src="<?php echo $url; ?>/js/plugins/tableexport/html2canvas.js"></script>
        <script type="text/javascript" src="<?php echo $url; ?>/js/plugins/tableexport/jspdf/libs/sprintf.js"></script>
        <script type="text/javascript" src="<?php echo $url; ?>/js/plugins/tableexport/jspdf/jspdf.js"></script>
        <script type="text/javascript" src="<?php echo $url; ?>/js/plugins/tableexport/jspdf/libs/base64.js"></script>   
        <!-- END Plugins Tabelas -->
        
        <script type="text/javascript" src="<?php echo $url; ?>/js/plugins/morris/raphael-min.js"></script>
        <!-- <script type="text/javascript" src="<?php echo $url; ?>/js/plugins/morris/morris.min.js"></script>    -->    
        <script type="text/javascript" src="<?php echo $url; ?>/js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="<?php echo $url; ?>/js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src='<?php echo $url; ?>/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='<?php echo $url; ?>/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
        <script type='text/javascript' src='<?php echo $url; ?>/js/plugins/bootstrap/bootstrap-datepicker.js'></script>                
        <script type="text/javascript" src="<?php echo $url; ?>/js/plugins/owl/owl.carousel.min.js"></script>  

        <script type="text/javascript" src="<?php echo $url; ?>/js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="<?php echo $url; ?>/js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="<?php echo $url; ?>/js/plugins/tagsinput/jquery.tagsinput.min.js"></script>               
        
        <script type="text/javascript" src="<?php echo $url; ?>/js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo $url; ?>/js/plugins/daterangepicker/daterangepicker.js"></script>


        <script type="text/javascript" src="<?php echo $url; ?>/js/plugins/dropzone/dropzone.min.js"></script>
        <script type="text/javascript" src="<?php echo $url; ?>/js/plugins/fileinput/fileinput.min.js"></script>        
        <script type="text/javascript" src="<?php echo $url; ?>/js/plugins/filetree/jqueryFileTree.js"></script>

        <script type="text/javascript" src="<?php echo $url; ?>/js/plugins/summernote/summernote.js"></script>
        <!-- END THIS PAGE PLUGINS-->

        <!-- START TEMPLATE -->
        <!-- <script type="text/javascript" src="js/settings.js"></script> -->        

        <!-- START TEMPLATE -->        
        <script type="text/javascript" src="<?php echo $url; ?>/js/plugins.js"></script>        
        <script type="text/javascript" src="<?php echo $url; ?>/js/actions.js"></script>
        
        <script type="text/javascript" src="<?php echo $url; ?>/js/demo_dashboard.js"></script>
        
        <!-- <script type="text/javascript" src="js/demo_dashboard.js"></script> -->
        <!-- END TEMPLATE -->

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