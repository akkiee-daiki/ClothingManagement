@extends('../layouts/app')

@section('main')
    <section id="new">
        <h2>新規作成 確認</h2>
        <dl>
            <dt>ブランド名</dt>
            <dd>{{ $input['name'] }}</dd>
            <dt></dt>
            <dd>
                <button type="button" onclick="location.href='{{ route('brand.create') }}'">戻る</button>
                <form action="{{ route('brand.store') }}" method="post" id="js-storeForm">
                    @csrf
                    <button id="js-storeBtn">登録</button>
                </form>
            </dd>
        </dl>
    </section>
@endsection

@section('js')
    <script>
        let form = document.getElementById('js-storeForm')
        let storeBtn = document.getElementById('js-storeBtn');

        confirmBtn.addEventListener('click', function () {
            form.submit();
        });
    </script>
@endsection
