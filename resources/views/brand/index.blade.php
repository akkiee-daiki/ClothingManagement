@extends('../layouts/app')

@section('main')
<section id="new">
    <h2>ブランドリスト</h2>
    <dl>
        <dt>2019/04/22</dt>
        <dd>より初心者が使いやすいよう少し調整。古いものを使っている人はそのままでOKです。</dd>
        <dt>2017/10/06</dt>
        <dd>初心者向け無料ホームページテンプレートtp_beginner5公開。</dd>
        <dt>20XX/00/00</dt>
        <dd>サンプルテキスト。サンプルテキスト。サンプルテキスト。</dd>
        <dt>20XX/00/00</dt>
        <dd>サンプルテキスト。サンプルテキスト。サンプルテキスト。</dd>
        <dt>20XX/00/00</dt>
        <dd>サンプルテキスト。サンプルテキスト。サンプルテキスト。</dd>
        <dt>20XX/00/00</dt>
        <dd>サンプルテキスト。サンプルテキスト。サンプルテキスト。</dd>
        <dt>20XX/00/00</dt>
        <dd>サンプルテキスト。サンプルテキスト。サンプルテキスト。</dd>
        <dt>20XX/00/00</dt>
        <dd>サンプルテキスト。サンプルテキスト。サンプルテキスト。</dd>
    </dl>
    <div class="btn_container">
        <button onclick="location.href='{{ route('brand.create') }}'">ブランド追加</button>
    </div>
</section>

<section>

    <h2>テンプレートのご利用前に必ずお読み下さい</h2>

    <h3>利用規約のご案内</h3>
    <p>このテンプレートは、<a href="https://template-party.com/">Template Party</a>にて無料配布している『初心者向けホームページテンプレート tp_beginner5』です。必ずダウンロード先のサイトの<a href="https://template-party.com/read.html">利用規約</a>をご一読の上でご利用下さい。</p>
    <p><span class="color1">■<strong>HP最下部の著作表示『Web Design:Template-Party』は無断で削除しないで下さい。</strong></span><br>
        わざと見えなく加工する事も禁止です。</p>
    <p><span class="color1">■<strong>下部の著作を外したい場合は</strong></span><br>
        <a href="https://template-party.com/">Template-Party</a>の<a href="https://template-party.com/member.html">ライセンス契約</a>を行う事でHP下部の著作を外す事ができます。</p>

    <h3>当テンプレートの詳しい使い方は</h3>
    <p><a href="about.html">こちらをご覧下さい。</a></p>

</section>
@endsection
