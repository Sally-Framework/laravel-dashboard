<?php
/** @var string $name */
/** @var string[] $labels */
/** @var int[] $values */
?>

@component('dashboard::component.statistic.chart.diagram-quantity', [
            'diagramType' => 'doughnut',
            'labels'      => $labels,
            'values'      => $values
        ])
@endcomponent


