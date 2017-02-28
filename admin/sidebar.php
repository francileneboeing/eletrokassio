<!-- START PAGE SIDEBAR -->
<div class="page-sidebar"">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="started.php">BG Studio {admin}</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <div class="profile">
            </div>
        </li>
        <li>
            <a href="<?php echo ADMIN; ?>/started.php"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
        </li>
        <li class="l-cadastro xn-openable">
            <a href="#"><span class="fa fa-certificate"></span> <span class="xn-text">Cadastros</span></a>
            <ul>
                <li class="l-cadastro">
                    <li class="l-cadastro-produto xn-openable">
                        <a href="#"><span class="fa fa-image"></span> Produto</a>
                        <ul>
                            <li><a href="<?php echo CADASTRAR; ?>/cadastroProduto.php"><span class="fa fa-plus"></span> Adicionar</a></li>
                            <li><a href="<?php echo LISTAR; ?>/listaProduto.php"><span class="fa fa-list-ul"></span> Listar</a></li>
                        </ul>
                        <ul>
                            <li class="l-cadastro-produto-categoria">
                                <li class="l-cadastro-produto-categoria xn-openable">
                                    <a href="#"><span class="fa fa-image"></span> Categoria</a>
                                    <ul>
                                       <li><a href="<?php echo CADASTRAR; ?>/cadastroCategoriaProduto.php"><span class="fa fa-plus"></span> Adicionar</a></li>
                                       <li><a href="<?php echo LISTAR; ?>/listaCategoriaSubcategoria.php"><span class="fa fa-list-ul"></span> Listar</a></li>
                                    </ul>
                                </li>
                            </li>                                                        
                        </ul>
                    </li>
                </li>
            </ul>
        </li>
        <li class="l_site xn-openable">
            <a href="#"><span class="fa fa-certificate"></span> <span class="xn-text">Site</span></a>
            <ul>
                
                <li class="l_site">
                    <li class="l_banner xn-openable">
                        <a href="#"><span class="fa fa-image"></span> Banner</a>
                        <ul>
                            <li><a href="cadastros/cadastroBanner.php"><span class="fa fa-plus"></span> Adicionar</a></li>
                            <li><a href="<?php echo ADMIN; ?>/listaBanner.php"><span class="fa fa-list-ul"></span> Listar</a></li>
                        </ul>
                    </li>
                </li>
                <li class="l_cont_site-novidade xn-openable">
                    <a href="#"><span class="fa fa-certificate"></span> <span class="xn-text">Novidades</span></a>
                    <ul>
                        <li class="xn-openable">
                            <a href="#"><span class="fa fa-outdent"></span> Postagem</a>
                            <ul>
                                <li><a href="#"><span class="fa fa-plus"></span> Adicionar</a></li>
                                <li><a href="#"><span class="fa fa-list-ul"></span> Listar</a></li>
                            </ul>
                        </li>
                        <li class= xn-openable">
                            <a href="#"><span class="fa fa-dot-circle-o"></span> Categorias</a>
                            <ul>
                                <li><a href="#"><span class="fa fa-plus"></span> Adicionar</a></li>
                                <li><a href="#"><span class="fa fa-list-ul"></span> Listar</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="l_cont_site">
                    <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Conteúdo</span></a>
                </li>
                <li><a href="#"><span class="fa fa-phone"></span> Contato</a></li>
                <li><a href="#"><span class="fa fa-envelope-o"></span> <span class="xn-text">Newsletter</span></a></li>
                <li><a href="#"><span class="fa fa-building-o"></span> Sobre</a></li>
            </ul>
        </li>
        <li><a href="#"><span class="fa fa-dollar"></span> <span class="xn-text">Orçamentos</span></a></li>
    </ul>
    <!-- END X-NAVIGATION -->
</div>
<!-- END PAGE SIDEBAR -->