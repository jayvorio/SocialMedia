<?php $pendingRequests = $pendingRequests ?? collect(); ?>
<div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($pendingRequests->count() > 0): ?>
        <?php if (isset($component)) { $__componentOriginaldae4cd48acb67888a4631e1ba48f2f93 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldae4cd48acb67888a4631e1ba48f2f93 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.card','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <div class="flex items-center justify-between mb-4">
                <h4 class="font-semibold text-surface-900 dark:text-surface-100">Friend Requests</h4>
                <span class="text-xs font-bold bg-red-500 text-white px-2 py-0.5 rounded-full"><?php echo e($pendingRequests->count()); ?></span>
            </div>
            <div class="space-y-4">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $pendingRequests->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $from = $request->user; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($from): ?>
                    <div class="flex items-start gap-3" wire:key="fr-<?php echo e($request->id); ?>">
                        <img src="<?php echo e($from->profile_photo_url ?? ''); ?>" alt="<?php echo e($from->name); ?>" class="w-12 h-12 rounded-xl object-cover">
                        <div class="flex-1 min-w-0">
                            <a wire:navigate href="<?php echo e(route('profile.view', $from)); ?>" class="font-medium text-surface-900 dark:text-surface-100 hover:text-primary-600 dark:hover:text-primary-400">
                                <?php echo e($from->name); ?>

                            </a>
                            <p class="text-xs text-surface-500 mb-2"><?php echo e($from->mutual_friends_count ?? 0); ?> mutual friends</p>
                            <div class="flex gap-2">
                                <form method="POST" action="<?php echo e(route('friends.requests.accept', $request)); ?>" class="flex-1">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="w-full px-3 py-1.5 text-xs font-medium bg-primary-500 text-white rounded-lg hover:bg-primary-600 transition-colors disabled:opacity-50">
                                        Accept
                                    </button>
                                </form>
                                <form method="POST" action="<?php echo e(route('friends.requests.decline', $request)); ?>" class="flex-1">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="w-full px-3 py-1.5 text-xs font-medium bg-surface-200 dark:bg-surface-700 text-surface-700 dark:text-surface-300 rounded-lg hover:bg-surface-300 dark:hover:bg-surface-600 transition-colors disabled:opacity-50">
                                        Decline
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($pendingRequests->count() > 3): ?>
                <a wire:navigate href="<?php echo e(route('friends.requests')); ?>" class="block w-full text-center py-2.5 mt-4 text-sm font-medium text-primary-600 dark:text-primary-400 hover:bg-primary-50 dark:hover:bg-primary-900/20 rounded-xl transition-colors">
                    See All Requests
                </a>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldae4cd48acb67888a4631e1ba48f2f93)): ?>
<?php $attributes = $__attributesOriginaldae4cd48acb67888a4631e1ba48f2f93; ?>
<?php unset($__attributesOriginaldae4cd48acb67888a4631e1ba48f2f93); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldae4cd48acb67888a4631e1ba48f2f93)): ?>
<?php $component = $__componentOriginaldae4cd48acb67888a4631e1ba48f2f93; ?>
<?php unset($__componentOriginaldae4cd48acb67888a4631e1ba48f2f93); ?>
<?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH D:\jason\jasen\Sobaisu\socialapparatus\resources\views/livewire/connections/sidebar-friend-requests.blade.php ENDPATH**/ ?>