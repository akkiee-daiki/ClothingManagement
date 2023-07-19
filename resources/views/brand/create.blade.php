@extends('../layouts/app')

@section('main')
    <section id="new">
        <h2>新規作成</h2>
        <form action="{{ route('brand.create_confirm') }}" method="post" id="js-createForm">
            @csrf
            <dl>
                <dt>ブランド名</dt>
                <dd>
                    <input type="text" name="name" value="{{ old('name', $input['name'] ?? '') }}">
                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror
                </dd>
                <dt></dt>
                <dd>
                    <button type="button" id="js-confirmBtn">確認</button>
                </dd>
            </dl>
        </form>

    </section>
@endsection

@section('js')
    <script>
        let form = document.getElementById('js-createForm')
        let confirmBtn = document.getElementById('js-confirmBtn');

        confirmBtn.addEventListener('click', function () {
           form.submit();
        });
    </script>
@endsection
