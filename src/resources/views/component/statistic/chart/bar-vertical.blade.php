<?php
/** @var string $diagramType */
/** @var string[] $labels */
/** @var int[] $values */
/** @var array $options */

$generatedViewId = uniqid();

if (!isset($options)) {
    $options = [];
}
?>

@component('dashboard::component.statistic.chart.diagram-quantity', [
            'diagramType' => 'bar',
            'labels'      => $labels,
            'values'      => $values,
            'options'     => $options,
        ])
@endcomponent
