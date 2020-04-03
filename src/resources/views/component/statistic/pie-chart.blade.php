<?php
/** @var string $name */
/** @var string[] $labels */
/** @var int[] $values */

$generatedViewId = uniqid();
?>

@component('dashboard::component.card', ['header' => $name])
    @slot('body')
        @component('dashboard::component.statistic.diagram-quantity', [
            'diagramType' => 'pie',
            'labels'      => $labels,
            'values'      => $values
        ])
        @endcomponent
    @endslot
@endcomponent


