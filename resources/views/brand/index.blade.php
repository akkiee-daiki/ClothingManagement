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

    <form method="post" action="{{ route('brand.destroy') }}" id="js-destroyForm">
        @csrf
        <input id="js-destroyInput" type="hidden" name="brand_id" value="">
    </form>

    <div class="btn_container">
        <button onclick="location.href='{{ route('brand.create') }}'">ブランド追加</button>
    </div>
</section>
@endsection

@section('js')
<script>
    let destroyForm = document.getElementById('js-destroyForm');
    let destroyBtns = document.getElementsByClassName('js-destroyBtn');
    let destroyInput = document.getElementById('js-destroyInput');

    for (let i = 0; i < destroyBtns.length; i++) {
        destroyBtns[i].addEventListener('click', function () {
            if (confirm('削除してよろしいですか')) {
                destroyInput.value = this.dataset.id;
                destroyForm.submit();
            } else {
                alert('削除がキャンセルされました');
            }

        });
    }

</script>
@endsection
