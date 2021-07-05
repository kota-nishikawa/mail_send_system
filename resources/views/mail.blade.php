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
        <label for="working_day" class="form-label">勤務時間</label>
        <select name="working_day" class="">
          @for ($i = 18; $i < 24; $i++)
          @if ($i == 19)
          <option value="{{ $working_day }} 10:00~{{ $i }}:00" selected >10:00~{{ $i }}:00</option>

          @else
          <option value="{{ $working_day }} 10:00~{{ $i }}:00"  >10:00~{{ $i }}:00</option>
          @endif
          @endfor
        </select>
      </div>
      <div class="mb-3">
        <label for="mailbody" class="form-label">Example textarea</label>
        {{-- 日報によって変える --}}
        <textarea class="form-control" style='white-space: pre-wrap;' id="mailbody" name="mailbody" rows="20">
        </textarea>
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