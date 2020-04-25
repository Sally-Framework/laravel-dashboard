<?php
/** @var array $components */
/** @var string $title */

$panelItemClass = uniqid();
$selectedTabClass = uniqid();
$components = collect($components)->map(function (array $item) {
    $item['id'] = uniqid();
    return $item;
})->all();
?>

<div class="col-lg-12">
    <div class="card no-b r-20">
        <div class="card-header r-20 white" style="overflow-x: auto; display: inline-flex;">
            @foreach($components as $componentName => $componentData)
                <button type="button" class="btn {{ $loop->first ? 'btn-primary' : 'btn-outline-secondary' }} btn-lg ml-2 mr-2 r-20 {{ $selectedTabClass }}" onclick="$('.{{ $panelItemClass }}').fadeOut('slow').promise().done(function() {$('#{{ $componentData['id'] }}').fadeIn('slow');});$('.{{ $selectedTabClass }}').removeClass('btn-primary').addClass('btn-outline-secondary');$(this).removeClass('btn-outline-secondary');$(this).addClass('btn-primary')">{{ $componentName }}</button>
            @endforeach
        </div>

        <div class="card-body no-p">
            @foreach($components as $componentName => $componentData)
                <div class="pt-5 pb-5 {{ $panelItemClass }}" style="display: {{ $loop->first ? 'block' : 'none'}}" id="{{ $componentData['id'] }}">
                    @component($componentData['name'], $componentData['data'])
                    @endcomponent
                </div>
            @endforeach
        </div>

    </div>
</div>
