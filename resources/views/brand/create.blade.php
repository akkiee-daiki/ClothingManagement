@extends('../layouts/app')

@section('title', 'ブランド作成')

@section('main')
    <section class="form-section">
        <h2>{{ (session()->has($SESS_KEY . '.new')) ? '新規作成' : '編集' }}</h2>
        <form action="" method="post" id="js-createForm">
            @csrf
            <dl>
                <dt>ブランド名（必須）</dt>
                <dd>
                    <input type="text" name="name" value="{{ old('name', $input['name'] ?? '')}}">
                    @error('name')
                        <p class="err_msg">{{ $message }}</p>
                    @enderror
                </dd>
            </dl>
            <dl>
                <dt>日本語名</dt>
                <dd>
                    <input type="text" name="Japanese_name" value="{{ old('Japanese_name', $input['Japanese_name'] ?? '')}}">
                    @error('Japanese_name')
                        <p class="err_msg">{{ $message }}</p>
                    @enderror
                </dd>
            </dl>
            <dl>
                <dd>
                    <button type="button" id="js-backBtn">戻る</button>
                    <button type="button" id="js-confirmBtn">確認</button>
                </dd>
            </dl>
        </form>

    </section>
@endsection

@section('js')
<script>
    let form = document.getElementById('js-createForm');
    let confirmBtn = document.getElementById('js-confirmBtn');
    let backBtn = document.getElementById('js-backBtn');

    confirmBtn.addEventListener('click', function () {
        form.action = '{{ (session()->has($SESS_KEY . '.new')) ? route('brand.create_confirm') : route( 'brand.edit_confirm', ['brand_id' => $brand_id]) }}';
        form.submit();
    });

    backBtn.addEventListener('click', function () {
       window.location.href = '{{ route('brand.index') }}';
    });
</script>
@endsection
