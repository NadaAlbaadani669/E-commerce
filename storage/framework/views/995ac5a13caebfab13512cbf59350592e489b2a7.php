<?php foreach($attributes->onlyProps(['product']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['product']); ?>
<?php foreach (array_filter((['product']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<article
                <?php echo e($attributes->merge(['class'=> "transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl"])); ?>>
                <div class="py-6 px-5">
                    <div class="space-x-2">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.category-button','data' => ['category' => $product->category]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('category-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['category' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->category)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                    <br>
                    <div class="mt-8 flex flex-col justify-between">
                        <header>


                            <div class="mt-4">
                                <a href="/product/<?php echo e($product->name); ?>">
                                    <?php $path =asset('storage/'.$product->image);?>
                                    <img src="<?php echo e($path); ?>" alt="<?php echo e($product->name); ?>" class="rounded-xl" width="150px" height="200px"> <br>
                                    <h1 class="text-3xl">
                                        <?php echo e($product->name); ?>

                                    </h1>
                                </a>
                                <span class="mt-2 block text-gray-400 text-xs">
                                    <p>
                                        price : <?php echo e($product->price); ?> $.
                                    </p>
                                </span>
                            </div>
                        </header>

                        <div class="text-sm mt-4">
                            <p>
                               <?php echo e($product->description); ?>

                            </p>
                        </div>

                        <footer class="flex justify-between items-center mt-8">
                            <div class="flex items-center text-sm">
                                <div class="ml-3">
                                    

                                </div>
                            </div>
                            <div class="flex items-left text-sm">
                                <?php if(auth()->guard()->check()): ?>
                                    <form action="/addToCart" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php ?>
                                        <input type="hidden" value=""  name="cart_id">
                                        <input type="hidden" value="<?php echo e(auth()->user()->id); ?>" name="customer_id">
                                        <input type="hidden" value="<?php echo e($product->id); ?>" name="product_id">
                                        <input type="hidden" value=1 name="quantity">
                                        <input type="hidden" value="<?php echo e($product->price); ?>" name="price">
                                        <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-500">Add To Cart</button>
                                    </form>
                                <?php endif; ?>

                            </div>

                        </footer>
                    </div>
                </div>
            </article>
<?php /**PATH C:\Users\Nada Albaadani\Desktop\E-Commerce\resources\views/components/product-card.blade.php ENDPATH**/ ?>