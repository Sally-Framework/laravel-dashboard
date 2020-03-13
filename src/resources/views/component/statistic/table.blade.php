<?php /** @var string $name */ ?>
<?php /** @var string[] $headers */ ?>
<?php /** @var string[] $rows */ ?>

@component('dashboard::component.card', ['header' => $name])
    @slot('body')
        <div style="height: 400px; overflow-y: auto;">
            <table class="table table-hover">
                <thead>
                <tr>
                    @foreach($headers as $header)
                        <th scope="col">{{ $header }}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @foreach($rows as $row)
                    <tr>
                        @foreach($row as $item)
                            <td>{{ $item }}</td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endslot
@endcomponent
