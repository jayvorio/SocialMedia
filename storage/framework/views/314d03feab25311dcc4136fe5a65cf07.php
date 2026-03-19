<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'padding' => 'md',
    'hover' => false,
    'divided' => false,
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'padding' => 'md',
    'hover' => false,
    'divided' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
$paddings = [
    'none' => '',
    'sm' => 'p-4',
    'md' => 'p-6',
    'lg' => 'p-8',
];

$baseClasses = 'bg-white dark:bg-surface-800 rounded-2xl border border-surface-200 dark:border-surface-700 overflow-hidden';
$hoverClasses = $hover ? 'transition-all duration-300 hover:shadow-soft-lg hover:border-surface-300 dark:hover:border-surface-600 hover:-translate-y-0.5' : 'shadow-soft';
$paddingClass = $paddings[$padding] ?? $paddings['md'];
$dividerClass = $divided ? 'divide-y divide-surface-200 dark:divide-surface-700' : '';
?>

<div <?php echo e($attributes->merge(['class' => "$baseClasses $hoverClasses $dividerClass"])); ?>>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($padding !== 'none'): ?>
        <div class="<?php echo e($paddingClass); ?>">
            <?php echo e($slot); ?>

        </div>
    <?php else: ?>
        <?php echo e($slot); ?>

    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php /**PATH D:\jason\jasen\Sobaisu\socialapparatus\resources\views/components/ui/card.blade.php ENDPATH**/ ?>