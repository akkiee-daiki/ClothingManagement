@extends('../layouts/app')

@section('title', 'ブランド一覧')

@section('main')
<section id="new">
    @if(session('complete_msg'))
        <p>{{ session('complete_msg') }}</p>
    @endif
    <table class="ta1">
        <thead>
            <th></th>
            <th>ブランド名</th>
            <th>日本語名</th>
            <th></th>
        </thead>
        <tbody>
            @foreach($list ?? [] as $v)
                <tr>
                    <td style="width: 10%">{{ $loop->index + 1 }}</td>
                    <td>{{ $v->name }}</td>
                    <td>{{ $v->Japanese_name }}</td>
                    <td>
                        <button onclick="location.href='{{ route('brand.edit', $v->brand_id) }}'">編集</button>
                        <button type="button" class="js-destroyBtn" data-id="{{ $v->brand_id }}">削除</button>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    <form action="{{ route('brand.destroy') }}" class="js-destroyForm">
        <input type="hidden" name="brand_id" value="">
    </form>

    <div class="btn_container">
        <button onclick="location.href='{{ route('brand.create') }}'">ブランド追加</button>
    </div>
</section>
@endsection

@section('js')
<script>
    let destroyForm = document.getElementById('js-destroyForm');
    let destroyBtn = document.getElementsByClassName('js-destroyBtn');

    // get brand_id of clicked delete button
    $('.js-destroyBtn').addEventListener('click', function () {
        console.log(this.dataset.id);
    });

</script>
@endsection
