<?php

use Sally\Dashboard\Domain\Statistic\Type;

/**
 * @var Type\AbstractType[] $items
 */

?>

@extends('dashboard::layouts.new-design')

@section('content')

    {{-- Начало секции текстовых карточек --}}
    <div class="row justify-content-center pb-5">
        @foreach($items as $item)
            @if ($item instanceof Type\Common\Text)
                <?php /** @var Type\Common\Text $item */ ?>
                <div class="col-lg-3">
                    @component(
                        'dashboard::component.statistic.common.card-text',
                        [
                            'name'  => $item->getName(),
                            'value' => $item->getValue()
                        ]
                    )
                    @endcomponent
                </div>
            @endif
        @endforeach
    </div>
    {{-- Конец секции текстовых карточек --}}

    {{-- Начало секции таблиц --}}
    @foreach($items as $item)
        @if ($item instanceof Type\Common\Table)
            <div class="pb-5" style="padding-left: 10%; padding-right: 10%;">
                <?php /** @var Type\Common\Table $item */ ?>
                @component(
                    'dashboard::component.statistic.common.table',
                    [
                        'name'    => $item->getName(),
                        'headers' => $item->getHeaders(),
                        'rows'    => $item->getRows(),
                    ]
                )
                @endcomponent
            </div>
        @endif
    @endforeach
    {{-- Конец секции таблиц --}}
@endsection
