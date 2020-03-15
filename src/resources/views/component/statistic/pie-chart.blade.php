<?php
/** @var string $name */
/** @var string[] $labels */
/** @var int[] $values */

$generatedViewId = uniqid();
?>

@component('dashboard::component.card', ['header' => $name])
    @slot('body')
        <canvas id="{{ $generatedViewId }}" style="height:250px !important;"></canvas>
        <script type="text/javascript">
            var labels = {!! json_encode($labels) !!};
            var values = {!! json_encode($values) !!};
            var colors = [];
            for (var i = 0; i < values.length; i++) {
                colors.push('#' + Math.floor(Math.random()*16777215).toString(16));
            }

            new Chart(document.getElementById("{{ $generatedViewId }}"), {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        backgroundColor: colors,
                        data: values
                    }]
                },
            });
        </script>
    @endslot
@endcomponent

