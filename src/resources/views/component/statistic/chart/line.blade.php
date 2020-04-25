<?php
/** @var string $diagramType */
/** @var array[] $data */
/** @var string $colorType */

$generatedViewId = uniqid();
?>

<canvas id="{{ $generatedViewId }}"></canvas>
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
        let color = getUniqColorForDiagram('{{ $generatedViewId }}');
        datasets.push({
            'data': items,
            'label': itemName,
            'borderColor': color,
            pointBorderColor: color,
            backgroundColor: '#FFF',
            pointHitRadius: 15,
            pointRadius: 5,
            borderRadius: 20,
            'fill': false
        });
    });

    var diagram = {
        'type': 'line',
        'data': {
            'labels': labels,
            'datasets': datasets
        },
    };

    new Chart(document.getElementById("{{ $generatedViewId }}"), diagram);
</script>



