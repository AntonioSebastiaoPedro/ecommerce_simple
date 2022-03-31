


<?php $__env->startSection('body'); ?>
    <section id="prodetails" class="section-p1">
    <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="single-pro-image">
            <img src="img/products/produto-unico-1.png" width="100%" id="MainImg" alt="">

            <div class="small-img-group">
                <div class="small-img-col">
                    <img src="img/products/produto-unico-1.png" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="img/products/produto-unico-2.png" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="img/products/produto-unico-3.png" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="img/products/produto-unico-4.png" width="100%" class="small-img" alt="">
                </div>
            </div>
        </div>

        <div class="single-pro-details">
            <h6><?php echo e(App\Models\Category::getNameCategory($produto->id_category)[0]->name_category); ?></h6>
            <h4><?php echo e($produto->name_product); ?></h4>
            <h2><?php echo e($produto->price_unit); ?></h2>

            <input type="number" value="1">
            <button class="normal">Add Carrinho</button>
            <h4>Detalhes do Produto</h4>
            <span><?php echo e($produto->details); ?></span>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>

    <section id="producto1" class="section-p1">
        <h2>Mais vendidos </h2>
        <p>Produtos em alta</p>
        <div class="pro-container">
        <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(DIRPAGE.'produto/'.$produto->id); ?>">
            <div class="pro" >
                <img src="<?php echo e(DIRIMG.'img/products/'.App\Models\Category::getNameCategory($produto->id_category)[0]->name_category.'/'.$produto->name_product.'/'.$produto->img); ?>" alt="">
                <div class="des">
                    <span> <?php echo e(App\Models\Category::getNameCategory($produto->id_category)[0]->name_category); ?> </span>
                    <h5><?php echo e($produto->name_product); ?></h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4><?php echo e($produto->price_unit); ?></h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
            </div>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>            
        </div>
    </section>


<?php $__env->stopSection(); ?>
    <script>
        var MainImg = document.getElementById("MainImg");
        var smallimg = document.getElementsByClassName("small-img");

        smallimg[0].onclick = function() {
            MainImg.src = smallimg[0].src;
        }
        smallimg[1].onclick = function() {
            MainImg.src = smallimg[1].src;
        }
        smallimg[2].onclick = function() {
            MainImg.src = smallimg[2].src;
        }
        smallimg[3].onclick = function() {
            MainImg.src = smallimg[3].src;
        }
    </script>


    <script src="script.js"></script>
</body>

</html>
<?php echo $__env->make('user.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blade\app\views/user/sproduct.blade.php ENDPATH**/ ?>