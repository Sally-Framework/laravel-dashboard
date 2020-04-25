<?php
/** @var string $diagramType */
/** @var string[] $labels */
/** @var int[] $values */
/** @var array $options */

$generatedViewId = uniqid();
?>

<canvas id="{{ $generatedViewId }}"></canvas>

<script type="text/javascript">
    var labels = {!! json_encode($labels) !!};
    var values = {!! json_encode($values) !!};
    var colors = [];
    for (var i = 0; i < values.length; i++) {
        colors.push(getUniqColorForDiagram('{{ $generatedViewId }}'));
    }

    var options = {!! isset($options) ? json_encode($options) : '{}' !!};
    var diagram = {
        'type': '{{ $diagramType }}',
        'data': {
            'labels': labels,
            'datasets': [{
                backgroundColor: colors,
                data: values
            }],
        },
        'options': options
    };

    new Chart(document.getElementById("{{ $generatedViewId }}"), diagram);
</script>


