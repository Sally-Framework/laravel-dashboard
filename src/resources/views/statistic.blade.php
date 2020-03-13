<?php

use Sally\Dashboard\Domain\Statistic\Type;

/**
 * @var Type\AbstractType[] $items
 */

?>

@extends('dashboard::layouts.app')

@section('content')
    <div class="container">

        {{-- Начало секции текстовых карточек --}}
        <div class="row justify-content-center pb-5">
            @foreach($items as $item)
                @if ($item instanceof Type\Text)
                    <?php /** @var Type\Text $item */ ?>
                    @component(
                        'dashboard::component.statistic.card-text',
                        [
                            'name' => $item->getName(),
                            'value' => $item->getValue()
                        ]
                    )
                    @endcomponent
                @endif
            @endforeach
        </div>
        {{-- Конец секции текстовых карточек --}}

        {{-- Начало секции таблиц --}}
        @foreach($items as $item)
            @if ($item instanceof Type\Table)
                <div class="table-responsive">
                    <div class="pb-5">
                    <?php /** @var Type\Table $item */ ?>
                    @component(
                        'dashboard::component.statistic.table',
                        [
                            'name' => $item->getName(),
                            'headers' => $item->getHeaders(),
                            'rows' => $item->getRows(),
                        ]
                    )
                    @endcomponent
                    </div>
                </div>
            @endif
        @endforeach
        {{-- Конец секции таблиц --}}

    </div>
@endsection
