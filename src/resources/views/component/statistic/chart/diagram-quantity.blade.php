<?php
/** @var string $diagramType */
/** @var string[] $labels */
/** @var int[] $values */
/** @var array $options */

$generatedViewId = uniqid();
?>

<canvas id="{{ $generatedViewId }}" style="height:250px !important;"></canvas>
<script type="text/javascript">
    var labels = {!! json_encode($labels) !!};
    var values = {!! json_encode($values) !!};
    var colors = [];
    for (var i = 0; i < values.length; i++) {
        colors.push('#' + Math.floor(Math.random()*16777215).toString(16));
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


