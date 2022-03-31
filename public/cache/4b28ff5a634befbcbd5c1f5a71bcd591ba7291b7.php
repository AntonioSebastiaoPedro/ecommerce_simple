
<?php $__env->startSection('active2', 'active'); ?>

<?php $__env->startSection('body'); ?>
    <section id="pagina-cabecalho" >

        <h2>Os melhores da Tecnologia</h2>

        <p>Aqui tens a boa qualidade!</p>

    </section>
    
    <section id="producto1" class="section-p1">
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

    <section id="pagination" class="section-p1">
        <a href="#">1</a>
        <a href="#">2</a> &nbsp;
        <a href="#"><i class="fal fa-long-arrow-alt-right"></i></a>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blade\app\views/user/shop.blade.php ENDPATH**/ ?>