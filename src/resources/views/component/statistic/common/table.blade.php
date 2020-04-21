<?php /** @var string $name */ ?>
<?php /** @var string[] $headers */ ?>
<?php /** @var string[] $rows */ ?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">{{ $name }}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding" style="max-height: 700px; overflow-y: auto;">
        <table class="table">
            <tbody>
            <tr>
                @foreach($headers as $header)
                    <th>{{ $header }}</th>
                @endforeach
            </tr>
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
    <!-- /.box-body -->
</div>
