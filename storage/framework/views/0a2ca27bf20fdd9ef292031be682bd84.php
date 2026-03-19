<?php if (isset($component)) { $__componentOriginal451b5c755784ffa362e20cadc2356369 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal451b5c755784ffa362e20cadc2356369 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.spa','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.spa'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('feed.index');

$__key = null;

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-3387308822-0', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key);

echo $__html;

unset($__html);
unset($__key);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal451b5c755784ffa362e20cadc2356369)): ?>
<?php $attributes = $__attributesOriginal451b5c755784ffa362e20cadc2356369; ?>
<?php unset($__attributesOriginal451b5c755784ffa362e20cadc2356369); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal451b5c755784ffa362e20cadc2356369)): ?>
<?php $component = $__componentOriginal451b5c755784ffa362e20cadc2356369; ?>
<?php unset($__componentOriginal451b5c755784ffa362e20cadc2356369); ?>
<?php endif; ?>
<?php /**PATH D:\jason\jasen\Sobaisu\socialapparatus\resources\views/pages/feed.blade.php ENDPATH**/ ?>