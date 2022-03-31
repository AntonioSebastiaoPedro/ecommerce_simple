<?php
    require_once('cabecalho.php');
?>

<h1 class="display-4 font-weight-bold text-center">PRODUTOS</h1>
                     <hr>                      
            <div class="container">

            
                
          <form action="" method="post" class="col-sm-6 offset-md-3 border ">
                <h1 class="display-5 mt-5 text-center font-weight-bold">Editar produto</h1>
                    <div class="for-group mt-5">
                        <input class="form-control" type="text" name="nome" placeholder="Nome do produto">
                    </div>

                    <div class="for-group mt-5 mb-5">
                    <textarea class="form-control" name="descricao" id="" cols="60" rows="5" placeholder="descrição do produto"></textarea>
                    </div>
                

                    <div class="for-group mt-5">
                        <input class="form-control" type="text" name="" placeholder="preço unitario">
                    </div>
        
                    <div class="for-group mt-5">
                        <input class="form-control" type="text" name="" placeholder="preço de venda">
                    </div>

                    <div class="for-group mt-5">
                        <input class="form-control" type="text" name="" placeholder="preço unitario">
                    </div>

                    <div class="for-group mt-5">
                        <input class="form-control" type="text" name="" placeholder="Categoria">
                    </div>
        
                    <div class="for-group mt-5 up">
                     
                    <div class="upload-box"> 
        <div class="upload-img">
            <img src="imagens/img.png" alt="">
        </div>
        <label for="upload-input" class="upload-label">Upload Image</label>
        <input type="file"  id="upload-input" accept="images/*" width="200px" heigth="200px">
    </div>
                    </div>

                    <button type="submit" class="btn btn-success btn-block mt-5 mb-5" 
                    name="btn">
                        Editar
                    </button>
                </form>
        

                
        

            </div>
    </div>


              
        </div>
    </section>
</div>





<?php
    require_once('rodape.php');
?>