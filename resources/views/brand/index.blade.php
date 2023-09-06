@extends('../layouts/app')

@section('title', 'ブランド一覧')

@section('main')
<section id="new">
    <table class="ta1">
        <thead>

        </thead>
        <tbody>
            @foreach($list ?? [] as $v)
                <tr>
                    <th style="width: 10%">{{ $loop->index + 1 }}</th>
                    <td>{{ $v->name }}</td>
                    <td>
                        <button onclick="location.href='{{ route('brand.edit', $v->brand_id) }}'">編集</button>
                        <button onclick="location.href='{{ route('brand.create', $v->brand_id) }}'">削除</button>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    <div class="btn_container">
        <button onclick="location.href='{{ route('brand.create') }}'">ブランド追加</button>
    </div>
</section>
@endsection
