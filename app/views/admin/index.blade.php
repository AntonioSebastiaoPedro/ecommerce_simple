@extends('admin.template')

@section('body')
            <h1 class="display-4">Bem-Vindo ao painel</h1>
            <hr>

            <div class="row">

                <!--ferramenta Vendas-->
                <div class="col-md-3 mt-5">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h4 class="font-weigth-light">Vendas</h4>
                            <hr>
                            <h5>
                                 <b>{{$sales ?? 0}}</b>
                            </h5>
                        </div>
                    </div>
                </div>
                <!--ferramenta Vendas-->

                <!--ferramenta Vendas-->
                <div class="col-md-3 mt-5">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h4 class="font-weigth-light">Encomendas</h4>
                            <hr>
                            <h5>
                                 <b>{{$encomendas ?? 0}}</b>
                            </h5>
                        </div>
                    </div>
                </div>
                <!--ferramenta Vendas-->

                <!--ferramenta categoria-->
                <div class="col-md-3 mt-5">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h4 class="font-weigth-light">Categorias</h4>
                            <hr>
                            <h5>
                                 <b>{{$caterorias ?? 0}}</b>
                            </h5>
                        </div>
                    </div>
                </div>
                <!--ferramenta categoria-->

                               
                <!--ferramenta pedidos-->
                <div class="col-md-3 mt-5">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h4 class="font-weigth-light"> <i class="fa-solid fa-clipboard-list"></i> Produtos</h4>
                            <hr>
                            <h5>
                                <b>{{$produtos ?? 0}}</b>
                            </h5>
                        </div>
                    </div>
                </div>
                <!--ferramenta pedidos-->


                <!--ferramenta produtos -->
                <div class="col-md-3 mt-5">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h4 class="font-weigth-light">Stock</h4>
                            <hr>
                            <h5>
                                <b>{{$stock ?? 0}}</b>
                            </h5>
                        </div>
                    </div>
                </div>
                <!--ferramenta produtos-->

                 <!--ferramenta entregas -->
                <div class="col-md-3 mt-5">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h4 class="font-weigth-light">Usuários</h4>
                            <hr>
                            <h5>
                                <b>{{$users ?? 0}}</b>
                            </h5>
                        </div>
                    </div>
                </div>
                <!--ferramenta entregas-->

            </div>

        </div>
    </section>
</div>


@endsection
