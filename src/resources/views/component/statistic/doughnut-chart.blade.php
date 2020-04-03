<?php
/** @var string $name */
/** @var string[] $labels */
/** @var int[] $values */

$generatedViewId = uniqid();
?>

@component('dashboard::component.card', ['header' => $name])
    @slot('body')
        @component('dashboard::component.statistic.abstract-diagram-template', [
            'diagramType' => 'doughnut',
            'labels' => $labels,
            'values' => $values
        ])
        @endcomponent
    @endslot
@endcomponent


