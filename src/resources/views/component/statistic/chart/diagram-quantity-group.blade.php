<?php
/** @var string $diagramType */
/** @var array[] $data */

$generatedViewId = uniqid();
?>

<canvas id="{{ $generatedViewId }}" style="height:250px !important;"></canvas>
<script type="text/javascript">
    var data = {!! json_encode($data) !!};
    var labels = Object.keys(data);
    var sortedData = {};

    Object.keys(data).forEach(function(indicator) {
        let items = data[indicator];
        Object.keys(items).forEach(function(itemName) {
            let value = items[itemName];
            if (!(itemName in sortedData)) sortedData[itemName] = [];
            sortedData[itemName].push(value);
        });
    });

    var datasets = [];
    Object.keys(sortedData).forEach(function(itemName) {
        let items = sortedData[itemName];
        datasets.push({
            'data': items,
            'label': itemName,
            'borderColor': '#' + Math.floor(Math.random()*16777215).toString(16),
            'fill': false
        });
    });

    var diagram = {
        'type': '{{ $diagramType }}',
        'data': {
            'labels': labels,
            'datasets': datasets
        },
    };

    new Chart(document.getElementById("{{ $generatedViewId }}"), diagram);
</script>


