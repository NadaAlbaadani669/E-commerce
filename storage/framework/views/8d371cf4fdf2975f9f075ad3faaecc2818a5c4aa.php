
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.layout','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <main class="my-8">
        <div class="container px-6 mx-auto">
            <a href="/"
                            class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Back to Main page
                        </a>
            <div class="flex justify-center my-6">
                <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                  <?php if($message = Session::get('success')): ?>
                      <div class="p-4 mb-3 bg-blue-500 text-white rounded">
                          <p class="text-green-800"><?php echo e($message); ?></p>
                      </div>
                  <?php endif; ?>
                    <h3 class="text-3xl text-bold">Cart List</h3>
                  <div class="flex-1">
                    <table class="w-full text-sm lg:text-base" cellspacing="0">
                      <thead>
                        <tr class="h-12 uppercase">
                          <th class="hidden md:table-cell"></th>
                          <th class="text-left">Name</th>
                          <th class="pl-5 text-left lg:text-right lg:pl-0">
                            <span class="lg:hidden" title="Quantity">Qtd</span>
                            <span class="hidden lg:inline">Quantity</span>
                          </th>
                          <th class="hidden text-right md:table-cell"> price</th>
                          <th class="hidden text-right md:table-cell"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if($cartItems->count()): ?>
                          <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                            <td class="hidden pb-4 md:table-cell">
                                <?php $path =asset('storage/'.$cartItem->product->image);?>
                                <a href="/product/<?php echo e($cartItem->product->name); ?>">
                                <img src="<?php echo e($path); ?>" class="w-20 rounded" alt="Thumbnail">
                                </a>
                            </td>
                            <td>
                                <a href="/product/<?php echo e($cartItem->product->name); ?>">
                                <p class="mb-2 md:ml-4"><?php echo e($cartItem->product->name); ?></p>

                                </a>
                            </td>
                            <td class="justify-center mt-6 md:justify-end md:flex">
                                <div class="h-10 w-35">
                                <div class="relative flex flex-row w-full h-8">

                                    <form action="/cart/adjustAmount" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="product_id" value="<?php echo e($cartItem->product->id); ?>" >
                                        <button type="submit" name="action" value="dicrease" class="px-2 text-3xl py-0.25 ml-2 text-black mr-2 rounded">-   </button>
                                        <input type="hidden" value="<?php echo e($cartItem->product->price); ?>" name="price">
                                        <output><?php echo e($cartItem->quantity); ?></output>

                                        <input type="hidden" name="totalQuantity" value="<?php echo e($cartItem->product->quantity); ?>">
                                        <button type="submit" name="action" value="increase" class="px-2 text-xl py-0.25 ml-2 text-black mr-2 rounded" >+</button>
                                    </form>

                                </div>
                                </div>
                            </td>
                            <td class="hidden text-right md:table-cell">
                                <span class="text-sm font-medium lg:text-base">
                                    <?php echo e($cartItem->price); ?>


                                </span>
                            </td>
                            <td class="hidden text-right md:table-cell">
                                <form action="/cart/remove-item" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" value="<?php echo e($cartItem->product->id); ?>" name="id">
                                    <button class="px-4 mb-3 py-2 text-white bg-red-600 rounded">Remove</button>
                                </form>

                                <form action="/product/buy" method="POST">
                                    <?php echo csrf_field(); ?>

                                    <input type="hidden" value="<?php echo e($cartItem->product->id); ?>" name="product_id">
                                    <input type="hidden" value="<?php echo e($cartItem->quantity); ?>" name="quantity">
                                    <input type="hidden" value="<?php echo e($cartItem->price); ?>" name="price">
                                    <input type="hidden" value="<?php echo e($addres); ?>" name="addres">
                                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-500">Buy Now</button>
                                </form>
                            </td>
                            </tr>


                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                      </tbody>


                    </table>


                  </div>
                </div>
              </div>
        </div>
    </main>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Nada Albaadani\Desktop\E-Commerce\resources\views/cart/index.blade.php ENDPATH**/ ?>