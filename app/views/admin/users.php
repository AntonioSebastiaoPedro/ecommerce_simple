<?php
    require_once('cabecalho.php');
?>                <div class="side-head">
                    <span class="text-white">Painel Admin</span> &nbsp;
                    <i class="fa-solid fa-bars menu-btn text-white"></i>
                    <i class="fa-solid fa-arrow-right close-btn text-white"></i>
                </div>
                <div class="header-nav">
                    <ul>
                        <li><a href=""> <i class="fa-solid fa-house"></i> Ordenar </a></li>
                        <li><a href=""> <i class="fa-solid fa-truck"></i> Entrega</a></li>
                        <li><a href=""> <i class="fa-solid fa-user"></i> usuario </a></li>
                        <li><a href=""> <i class="fa-solid fa-right-from-bracket"></i> Sair </a></li>
                    </ul>
                </div>
            </div>
        </div>
        </header>
        
        <div class="wrapper">
            <section class="sidebar">
                <ul class="nav-bar">
                    <li><a href="#"><i class="fa-solid fa-gauge-high"></i> <span class="text-link"> PAINEL DO ADMIN </span></a></li>
                    <li><a href="#"><i class="fa-solid fa-plus"></i> <span class="text-link">CADASTRAR</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-plus"></i> <span class="text-link">CADASTRAR</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-plus"></i> <span class="text-link">CADASTRAR</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-plus"></i><span class="text-link"> CADASTRAR</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-plus"></i><span class="text-link"> CADASTRAR</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-plus"></i><span class="text-link"> CADASTRAR</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-plus"></i><span class="text-link"> CADASTRAR</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-plus"></i> <span class="text-link">CADASTRAR</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-right-from-bracket"></i> <span class="text-link">SAIR </span></a></li>
        
                </ul>
            </section>
            <section class="working-panel">
                <div class="container-fluid">
                    <h1 class="display-4">Usuários</h1>
                    <hr>                      
                    <div class="container">
                    <table class="table table-light mt-5">
                        <thead>
                            <tr>
                                <th>
                                    Id
                                </th>
                    
                                <th>
                                    tipo
                                </th>
                    
                                <th>
                                    nome
                                </th>
                                
                                <th>
                                    Email
                                </th>
                    
                                <th>
                                    Senha
                                </th>
                    
                                <th>
                                    Opções
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                    
                            <tr>    
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                <form action="" method="post">
                                        <input type="hidden"  name="id" value="">
                                        <button class="btn btn-sm btn-danger" name="deletar">
                                            Eliminar
                                        </button>
                                         
                                        <button class="btn btn-sm btn-danger" name="editar">
                                            Editar
                                        </button>
                    
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <?php
    require_once('cabecalho.php');
?>