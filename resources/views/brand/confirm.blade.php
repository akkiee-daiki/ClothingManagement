@extends('../layouts/app')

@section('title', 'ブランド確認')

@section('main')
    <section class="form-section">
        <h2>{{(session()->has($SESS_KEY . '.new')) ? '新規作成' : '編集'}}確認</h2>
        <dl>
            <dt>ブランド名</dt>
            <dd>{{ $input['name'] }}</dd>
            <dt>日本語名</dt>
            <dd>{{ $input['Japanese_name'] }}</dd>
            <dt></dt>
            <dd>
                <form action="" method="post" id="js-storeForm">
                    @csrf
                    <button type="button" id="js-backBtn">戻る</button>
                    <button type="button" id="js-storeBtn">{{ (session()->has($SESS_KEY . '.new')) ? '登録' : '更新' }}</button>
                </form>
            </dd>
        </dl>
    </section>
@endsection

@section('js')
    <script>
        let form = document.getElementById('js-storeForm');
        let storeBtn = document.getElementById('js-storeBtn');
        let backBtn = document.getElementById('js-backBtn');

        storeBtn.addEventListener('click', function () {
            form.action = '{{ (session()->has($SESS_KEY . '.new')) ? route('brand.store') : route('brand.update', ['brand_id' => $brand_id]) }}';
            form.submit();
        });

        backBtn.addEventListener('click', function () {
            window.location.href = '{{ (session()->has($SESS_KEY . '.new')) ? route('brand.create') : route('brand.edit', ['brand_id' => $brand_id]) }}';
        });
    </script>
@endsection
