<?php
/** @var string $name */
/** @var string[] $labels */
/** @var int[] $values */
/** @var array $options */
if (!isset($options)) {
    $options = [];
}
?>

@component('dashboard::component.card', ['header' => $name])
    @slot('body')
        @component('dashboard::component.statistic.chart.diagram-quantity', [
            'diagramType' => 'bar',
            'labels'      => $labels,
            'values'      => $values,
            'options'     => $options,
        ])
        @endcomponent
    @endslot
@endcomponent
