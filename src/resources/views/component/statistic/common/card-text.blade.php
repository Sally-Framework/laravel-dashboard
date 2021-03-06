<?php /** @var string $name */ ?>
<?php /** @var string $value */ ?>

<div class="counter-box white mt-2" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
    <div class="p-4">
        <div class="counter-title">{{ $name }}</div>
        <h5 class="{{ ctype_digit($value) ? 'sc-counter' : '' }} mt-3">{{ $value }}</h5>
    </div>
    <div class="progress progress-xs r-0">
        <div class="progress-bar" role="progressbar" style="width: {{ rand(30, 70) }}%;"></div>
    </div>
</div>
