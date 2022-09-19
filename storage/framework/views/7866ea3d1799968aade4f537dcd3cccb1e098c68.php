<h1 class="text-4xl">
    Search A product
</h1>


<div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
<!-- ------------------------------------------------------------------>
    <!--  Category -->
    


    <!-- Search -->
    <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
        <form method="GET" action="#">
            <?php if(request('category')): ?>
                <input type="hidden" name="category" value="<?php echo e(request('category')); ?>">
            <?php endif; ?>
            <input
                type="text"
                name="search"
                placeholder="Find something"
                class="bg-transparent placeholder-black font-semibold text-sm"
                value = "<?php echo e(request('search')); ?>">
        </form>
    </div>
</div>
<?php /**PATH C:\Users\Nada Albaadani\Desktop\E-Commerce\resources\views/product/_header.blade.php ENDPATH**/ ?>