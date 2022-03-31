<?php
    require_once('cabecalho.php');
?>


            <h1 class="display-4">bem vindo ao painel</h1>
            <hr>

            <div class="row">
                <!--ferramenta categoria-->
                <div class="col-md-3 mt-5">
                    <div class="card bg-danger text-white">
                        <div class="card-body">
                            <h4 class="font-weigth-light">Categoria</h4>
                            <hr>
                            <h5>
                                 <b>3</b>
                            </h5>
                        </div>
                    </div>
                </div>
                <!--ferramenta categoria-->

                               
                <!--ferramenta pedidos-->
                <div class="col-md-3 mt-5">
                    <div class="card bg-secondary text-white">
                        <div class="card-body">
                            <h4 class="font-weigth-light"> <i class="fa-solid fa-clipboard-list"></i> Produtos</h4>
                            <hr>
                            <h5>
                                <b>3</b>
                            </h5>
                        </div>
                    </div>
                </div>
                <!--ferramenta pedidos-->


                <!--ferramenta produtos -->
                <div class="col-md-3 mt-5">
                    <div class="card bg-info text-white">
                        <div class="card-body">
                            <h4 class="font-weigth-light">Estoque</h4>
                            <hr>
                            <h5>
                                <b>3</b>
                            </h5>
                        </div>
                    </div>
                </div>
                <!--ferramenta produtos-->

                 <!--ferramenta entregas -->
                <div class="col-md-3 mt-5">
                    <div class="card bg-info text-white">
                        <div class="card-body">
                            <h4 class="font-weigth-light">Users</h4>
                            <hr>
                            <h5>
                                <b>3</b>
                            </h5>
                        </div>
                    </div>
                </div>
                <!--ferramenta entregas-->

            </div>

            <!--tabela-->
            <div class="todos-pedidos mt-5">
                <hr>
                <h3>Pedidos</h3>
            <table class="table table-bordered table-hover">

                <thead>
                  <tr class="bg-primary text-white">
                    <th scope="col">id</th>
                    <th scope="col">nome</th>
                    <th scope="col">data</th>
                    <th scope="col">estado</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>

              <div class="paginacao-pedido">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <li class="page-item"><a class="page-link" href="#">Aterior</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">Proximo</a></li>
                    </ul>
                  </nav>
              </div>

            </div>
              <!-- FIM da tabela-->



              

        </div>
    </section>
</div>



<?php
    require_once('rodape.php');
?>

