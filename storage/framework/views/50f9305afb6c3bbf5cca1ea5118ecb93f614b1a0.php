

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.layout','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <main class="max-w-6xl mx-auto mt-7 space-y-6">
            <h1  class="text-blue-500 text-xl">Chose Payment Method</h1>
            <section class="px-6 border border-gray-200 rounded-2xl pl-10 pt-5 w-5/12">

            <div class="mt-4 text-lg font-semibold">
                <form action="/product/finishBuying" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="product" value="<?php echo e($product->id); ?>">
                    <div>
                        <img src="<?php echo e(asset('storage/'.$product->image)); ?>" alt="<?php echo e($product->name); ?>" width="200" class="ml-20 mb-10 ">
                    </div>
                    <div class="mt-4">
                        <label for="name">Product Name: </label>
                        <output><?php echo e($product->name); ?></output>
                    </div>
                    <div class="mt-4">
                        <label for="quantity">Total Amount:  </label>
                        <input type="hidden" value="<?php echo e($quantity); ?>" name="quantity">
                        <output><?php echo e($quantity); ?></output>
                    </div>
                    <div class="mt-4">
                        <label for="price">Total Price: </label>
                        <input type="hidden" value="<?php echo e($price); ?>" name="price">
                        <output><?php echo e($price); ?> $</output>
                    </div>
                    <div class="mt-4">
                        <label for="payment_method">Payment Method:  </label><br>
                        <input name="payment_method" type="radio"  value="At the door" required>
                        <label for="at_the_door"> At the door</label> <br>
                        <input name="payment_method" type="radio"  value="Paypal">
                        <label for="paypal">Paypal</label> <br>
                    </div>
                    <div class="mt-4">
                        <label for="address">Address: </label>
                        <input type="hidden" value="<?php echo e($address->addres); ?>" name="addres">
                        <output name="address"><?php echo e($address->addres); ?></output>
                    </div>
                    <div>
                        <button type="submit" class="my-6 bg-blue-500 py-2.5 px-6 text-white rounded ">Buy</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Nada Albaadani\Desktop\E-Commerce\resources\views/product/buy.blade.php ENDPATH**/ ?>