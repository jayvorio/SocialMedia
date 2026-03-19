<div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($suggestions->isEmpty()): ?>
        <p class="text-sm text-surface-500 dark:text-surface-400">No suggestions at this time. Add more friends to discover mutual connections!</p>
    <?php else: ?>
        <div class="space-y-3">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $suggestions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex items-center justify-between">
                    <a wire:navigate href="<?php echo e(route('profile.view', $user->profile?->username ?? $user->id)); ?>" class="flex items-center space-x-3 flex-1 min-w-0">
                        <img src="<?php echo e($user->profile_photo_url); ?>" alt="<?php echo e($user->name); ?>" class="w-10 h-10 rounded-xl flex-shrink-0 object-cover">
                        <div class="flex-1 min-w-0">
                            <p class="font-medium text-surface-900 dark:text-white text-sm truncate"><?php echo e($user->name); ?></p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($user->mutual_friends_count > 0): ?>
                                <p class="text-xs text-surface-500 dark:text-surface-400"><?php echo e($user->mutual_friends_count); ?> mutual <?php echo e(Str::plural('friend', $user->mutual_friends_count)); ?></p>
                            <?php elseif($user->profile?->headline): ?>
                                <p class="text-xs text-surface-500 dark:text-surface-400 truncate"><?php echo e($user->profile->headline); ?></p>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </a>
                    <button wire:click="sendRequest(<?php echo e($user->id); ?>)"
                            class="ml-2 px-3 py-1.5 text-xs font-medium text-primary-600 bg-primary-100 hover:bg-primary-200 dark:text-primary-400 dark:bg-primary-900/50 dark:hover:bg-primary-900 rounded-lg transition-colors">
                        Add
                    </button>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <a wire:navigate href="<?php echo e(route('friends.index')); ?>" class="block mt-4 text-center text-sm text-primary-600 hover:text-primary-700 dark:text-primary-400 dark:hover:text-primary-300">
            See All Suggestions
        </a>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH D:\jason\jasen\Sobaisu\socialapparatus\resources\views/livewire/suggestions/friend-suggestions.blade.php ENDPATH**/ ?>