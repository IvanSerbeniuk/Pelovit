<script setup>
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    post: Object,
    related: Array,
})

const currentUrl = typeof window !== 'undefined' ? window.location.href : ''

function copyUrl() {
    navigator.clipboard.writeText(window.location.href).then(() => {
        const btn = document.getElementById('copyBtn')
        if (btn) {
            const orig = btn.innerHTML
            btn.textContent = 'Скопійовано!'
            btn.style.backgroundColor = '#198754'
            setTimeout(() => { btn.innerHTML = orig; btn.style.backgroundColor = '' }, 2000)
        }
    })
}
</script>

<template>
<section class="article_section">
  <div class="container py-5">

    <h1 class="fw-bold mb-4">{{ post.title }}</h1>

    <div v-if="post.image" class="mb-4">
      <img :src="'/' + post.image" class="img-fluid rounded-4 w-100 article-image" :alt="post.title">
    </div>

    <div class="d-flex justify-content-between align-items-center mb-5">
      <div class="wrapper_date">
        <button v-if="post.category" class="btn rounded-pill px-4 lik_prof">{{ post.category }}</button>
        <div class="date_artc_wrapper">
          <span class="date_artc">Дата публікації</span>
          <div class="date">{{ post.formattedDate }}</div>
        </div>
      </div>
      <button class="btn btn-light rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#shareModal">
        <i class="bi bi-share me-2"></i> Поділитись
      </button>
    </div>

    <section class="article_content w-50 mx-auto">
      <div v-html="post.body"></div>
    </section>
  </div>
</section>

<section v-if="related && related.length > 0" class="container publications_box similar py-5">
  <h2 class="mb-4">Подібні публікації</h2>
  <div class="row g-4">
    <div v-for="rel in related" :key="rel.id" class="col-lg-4">
      <Link :href="`/journal/${rel.slug}`" class="text-decoration-none text-dark">
        <div class="card h-100">
          <div class="position-relative">
            <div class="card-img-top_wrapper">
              <img :src="rel.image ? '/' + rel.image : `https://picsum.photos/id/${100 + rel.id}/800/600`"
                   class="card-img-top" :alt="rel.title">
            </div>
            <span v-if="rel.category" class="badge position-absolute px-3 py-2">{{ rel.category }}</span>
          </div>
          <div class="card-body d-flex flex-column">
            <p class="text-muted small data">{{ rel.formattedDate }}</p>
            <h5 class="card-title">{{ rel.title }}</h5>
            <span class="detailed mt-auto">Детальніше
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none"><path d="M17.3172 10.442L11.6922 16.067C11.5749 16.1843 11.4159 16.2502 11.25 16.2502C11.0841 16.2502 10.9251 16.1843 10.8078 16.067C10.6905 15.9498 10.6247 15.7907 10.6247 15.6249C10.6247 15.459 10.6905 15.2999 10.8078 15.1827L15.3664 10.6249H3.125C2.95924 10.6249 2.80027 10.559 2.68306 10.4418C2.56585 10.3246 2.5 10.1656 2.5 9.99986C2.5 9.8341 2.56585 9.67513 2.68306 9.55792C2.80027 9.44071 2.95924 9.37486 3.125 9.37486H15.3664L10.8078 4.81705C10.6905 4.69977 10.6247 4.54071 10.6247 4.37486C10.6247 4.20901 10.6905 4.04995 10.8078 3.93267C10.9251 3.8154 11.0841 3.74951 11.25 3.74951C11.4159 3.74951 11.5749 3.8154 11.6922 3.93267L17.3172 9.55767C17.3753 9.61572 17.4214 9.68465 17.4529 9.76052C17.4843 9.8364 17.5005 9.91772 17.5005 9.99986C17.5005 10.082 17.4843 10.1633 17.4529 10.2392C17.4214 10.3151 17.3753 10.384 17.3172 10.442Z" fill="#1A1A1A"/></svg>
            </span>
          </div>
        </div>
      </Link>
    </div>
  </div>
</section>

<!-- Share modal -->
<div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="max-width: 420px;">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold" id="shareModalLabel">Поділитися:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body pt-2">
        <div class="input-group mb-4">
          <input type="text" id="shareUrl" class="form-control bg-light border-0" :value="currentUrl" readonly>
          <button class="btn btn-primary px-4" id="copyBtn" type="button" @click="copyUrl">
            Скопіювати <i class="bi bi-clipboard ms-1"></i>
          </button>
        </div>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
          <a :href="`https://api.whatsapp.com/send?text=${encodeURIComponent(currentUrl)}`" target="_blank" rel="noopener" class="share-icon">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" width="48" height="48" alt="WhatsApp">
          </a>
          <a :href="`https://t.me/share/url?url=${encodeURIComponent(currentUrl)}`" target="_blank" rel="noopener" class="share-icon">
            <img src="https://upload.wikimedia.org/wikipedia/commons/8/82/Telegram_logo.svg" width="48" height="48" alt="Telegram">
          </a>
          <a :href="`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(currentUrl)}`" target="_blank" rel="noopener" class="share-icon">
            <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" width="48" height="48" alt="Facebook">
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
</template>
