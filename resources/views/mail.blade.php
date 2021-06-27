<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}"></script>
<div class="container">

<form action="{{ url('mailsend') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="mailaddress" class="form-label">メールアドレス</label>
        <input type="email" class="form-control" id="mailaddress" name="mailaddress" placeholder="name@example.com">
      </div>
      <div class="mb-3">
        <label for="subject" class="form-label">題名</label>
        <input type="text" class="form-control" id="subject" name="subject"  value="{{ $subject }}" placeholder="name@example.com">
      </div>
      <div class="mb-3">
        <label for="mailbody" class="form-label">Example textarea</label>
        {{-- 日報によって変える --}}
        <textarea class="form-control" style='white-space: pre-wrap;' id="mailbody" name="mailbody" rows="20">以下、日報になります。
            １）連絡事項等
            なし
            ２）今日の業務内容
            　
            　【MDP】（h）
            　・ミニアプリ
            　
            ３）翌営業日の業務内容
            　
            ４）課題</textarea>
      </div>
      <button type="submit" class="btn btn-primary">送信</button>

</form>
</div>
{{--

<button type="button" class="btn btn-secondary">Secondary</button>
<button type="button" class="btn btn-success">Success</button>
<button type="button" class="btn btn-danger">Danger</button>
<button type="button" class="btn btn-warning">Warning</button>
<button type="button" class="btn btn-info">Info</button>
<button type="button" class="btn btn-light">Light</button>
<button type="button" class="btn btn-dark">Dark</button>

<button type="button" class="btn btn-link">Link</button> --}}