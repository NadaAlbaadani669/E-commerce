<!doctype html>

<title>E Commerce</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="app.js"></script>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <h1 class="text-2xl">E-commerce</h1>
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">
                <?php if(auth()->guard()->check()): ?>

                    <a href="/cart" class="mr-6"><img src="/images/shopping-basket.png" alt="Cart"></a>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.header_dropdown','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('header_dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <?php else: ?>
                    <a href="/register" class="text-m font-bold uppercase pr-10">Register</a>
                    <a href="/login" class="text-m font-bold uppercase pr-4">Login</a>
                <?php endif; ?>



            </div>
        </nav>

        <?php echo e($slot); ?>




    </section>

    <?php if(session()->has('success')): ?>
        <div x-data="{show : true}"
            x-init="setTimeout(()=>show=false,3000)"
            x-show ="show"
            class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
            <p><?php echo e(session('success')); ?></p>
        </div>
    <?php elseif(session()->has('failed')): ?>
    <div x-data="{show : true}"
        x-init="setTimeout(()=>show=false,3000)"
        x-show ="show"
        class="fixed bg-red-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
        <p><?php echo e(session('failed')); ?></p>
    </div>
    <?php endif; ?>



</body>
<?php /**PATH C:\Users\Nada Albaadani\Desktop\E-Commerce\resources\views/components/layout.blade.php ENDPATH**/ ?>