@extends('layouts.app')

@section('title', $post->title . ' — PELOVIT-R')

@section('content')
<section class="article_section">
  <div class="container py-5">

    <h1 class="fw-bold mb-4">{{ $post->title }}</h1>

    @if($post->image)
    <div class="mb-4">
      <img src="{{ asset($post->image) }}" class="img-fluid rounded-4 w-100 article-image" alt="{{ $post->title }}">
    </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-5">
      <div class="wrapper_date">
        @if($post->category)
        <button class="btn rounded-pill px-4 lik_prof">{{ $post->category }}</button>
        @endif
        <div class="date_artc_wrapper">
          <span class="date_artc">Дата публікації</span>
          <div class="date">{{ $post->formattedDate }}</div>
        </div>
      </div>

      <button class="btn btn-light rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#shareModal">
        <i class="bi bi-share me-2"></i> Поділитись
      </button>
    </div>

    <section class="article_content w-50 mx-auto">
      {!! $post->body !!}
    </section>
  </div>
</section>

@if($related->isNotEmpty())
<section class="container publications_box similar py-5">
  <h2 class="mb-4">Подібні публікації</h2>
  <div class="row g-4">
    @foreach($related as $rel)
    <div class="col-lg-4">
      <a href="{{ route('journal.show', $rel->slug) }}" class="text-decoration-none text-dark">
        <div class="card h-100">
          <div class="position-relative">
            <div class="card-img-top_wrapper">
              <img src="{{ $rel->image ? asset($rel->image) : 'https://picsum.photos/id/' . (100 + $rel->id) . '/800/600' }}"
                   class="card-img-top" alt="{{ $rel->title }}">
            </div>
            @if($rel->category)
            <span class="badge position-absolute px-3 py-2">{{ $rel->category }}</span>
            @endif
          </div>
          <div class="card-body d-flex flex-column">
            <p class="text-muted small data">{{ $rel->formattedDate }}</p>
            <h5 class="card-title">{{ $rel->title }}</h5>
            <span class="detailed mt-auto">Детальніше <x-icons.arrow-right /></span>
          </div>
        </div>
      </a>
    </div>
    @endforeach
  </div>
</section>
@endif

{{-- Share modal --}}
<div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="max-width: 420px;">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold" id="shareModalLabel">Поділитися:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body pt-2">
        <div class="input-group mb-4">
          <input type="text" id="shareUrl" class="form-control bg-light border-0"
                 value="{{ request()->url() }}" readonly>
          <button class="btn btn-primary px-4" id="copyBtn" type="button">
            Скопіювати <i class="bi bi-clipboard ms-1"></i>
          </button>
        </div>
        @php $shareUrl = urlencode(request()->url()); @endphp
        <div class="d-flex justify-content-center gap-3 flex-wrap">
          <a href="https://api.whatsapp.com/send?text={{ $shareUrl }}" target="_blank" rel="noopener" class="share-icon">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" width="48" height="48" alt="WhatsApp">
          </a>
          <a href="https://t.me/share/url?url={{ $shareUrl }}" target="_blank" rel="noopener" class="share-icon">
            <img src="https://upload.wikimedia.org/wikipedia/commons/8/82/Telegram_logo.svg" width="48" height="48" alt="Telegram">
          </a>
          <a href="viber://forward?text={{ $shareUrl }}" class="share-icon">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5d/Viber_logo_2018_%28without_text%29.svg/960px-Viber_logo_2018_%28without_text%29.svg.png" width="48" height="48" alt="Viber">
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank" rel="noopener" class="share-icon">
            <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" width="48" height="48" alt="Facebook">
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
document.getElementById('copyBtn')?.addEventListener('click', function() {
    const urlInput = document.getElementById('shareUrl');
    navigator.clipboard.writeText(urlInput.value).then(() => {
        const orig = this.innerHTML;
        this.textContent = 'Скопійовано!';
        this.style.backgroundColor = '#198754';
        setTimeout(() => { this.innerHTML = orig; this.style.backgroundColor = ''; }, 2000);
    });
});
</script>
@endsection
