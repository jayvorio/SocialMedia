<div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($trends->isEmpty()): ?>
        <p class="text-sm text-surface-500 dark:text-surface-400">No trending topics right now.</p>
    <?php else: ?>
        <div class="space-y-2">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $trends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $trend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a wire:navigate href="<?php echo e($trend->type === 'hashtag' ? route('hashtags.show', ltrim($trend->name, '#')) : route('search', ['q' => $trend->name])); ?>" class="block hover:bg-surface-50 dark:hover:bg-surface-700/50 -mx-2 px-2 py-2 rounded-lg transition-colors">
                    <div class="flex items-start justify-between">
                        <div>
                            <span class="text-xs text-surface-400 dark:text-surface-500"><?php echo e($index + 1); ?> &bull; <?php echo e(ucfirst($trend->type)); ?></span>
                            <p class="font-medium text-surface-900 dark:text-white"><?php echo e($trend->name); ?></p>
                            <p class="text-xs text-surface-500 dark:text-surface-400"><?php echo e(number_format($trend->daily_count)); ?> posts</p>
                        </div>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH D:\jason\jasen\Sobaisu\socialapparatus\resources\views/livewire/suggestions/trending.blade.php ENDPATH**/ ?>