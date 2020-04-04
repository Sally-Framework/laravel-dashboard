<?php
/** @var string $name */
/** @var array $data */

$generatedViewId = uniqid();
?>

@component('dashboard::component.card', ['header' => $name])
    @slot('body')
        @component('dashboard::component.statistic.chart.diagram-quantity-group', [
            'diagramType' => 'line',
            'data'        => $data,
        ])
        @endcomponent
    @endslot
@endcomponent
