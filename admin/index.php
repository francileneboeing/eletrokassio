<?php include('header.php'); ?>
        
        <div id="nomedadiv" class="login-container">
        
            <div class="login-box animated fadeInDown">
                <div class="login-titulo">BG Studio <strong>{admin}</strong></div>
                <div class="login-body">
                    <div class="login-title">Insira seus dados para iniciar sessão.</div>
                    <form action="login.php" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="usuario" placeholder="Usuario"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" name="senha" class="form-control" placeholder="Senha"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <!-- <a href="#" class="btn btn-link btn-block">Forgot your password?</a> -->
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block btn-login">Acessar</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2017 BG Studio
                    </div>

                </div>
            </div>
            
        </div>
        
    </body>
</html>