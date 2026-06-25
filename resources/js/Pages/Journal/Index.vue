<script setup>
import { Link, router } from '@inertiajs/vue3'

const props = defineProps({
    posts: Object,
    featured: Array,
    categories: Array,
})

const search = new URLSearchParams(window.location.search).get('search') || ''
const currentCategory = new URLSearchParams(window.location.search).get('category') || ''

function navigate(url) {
    if (url) router.visit(url, { preserveScroll: true })
}

function imgSrc(post, index) {
    const imgId = 100 + post.id
    return post.image ? '/' + post.image : `https://picsum.photos/id/${imgId}/600/400`
}
</script>

<template>
<header>
  <div class="container py-3">
    <div class="d-flex justify-content-between align-items-center">
      <h1 class="fw-bold">Меджурнал</h1>
      <form method="GET" action="/catalog-journal" class="d-flex" style="max-width: 420px; width: 100%;">
        <div class="input-group" style="border-radius: 16px;border: 1px solid #DEDEDE;overflow: hidden !important;">
          <span class="input-group-text"><i class="bi bi-search"></i></span>
          <input type="text" name="search" class="form-control" placeholder="Пошук по блогу" :value="search">
        </div>
      </form>
    </div>
  </div>
</header>

<section v-if="featured && featured.length > 0" class="container publications_box py-5">
  <h5 class="mb-4">Останні публікації</h5>
  <div class="row g-4">
    <div v-for="(post, index) in featured" :key="post.id" class="col-lg-6">
      <Link :href="`/journal/${post.slug}`" class="text-decoration-none text-dark">
        <div class="card h-100">
          <div class="position-relative">
            <div class="card-img-top_wrapper">
              <img :src="imgSrc(post, index)" class="card-img-top" :alt="post.title">
            </div>
            <span v-if="post.category" class="badge position-absolute px-3 py-2">{{ post.category }}</span>
          </div>
          <div class="card-body d-flex flex-column">
            <p class="text-muted small data">{{ post.formattedDate }}</p>
            <h5 class="card-title">{{ post.title }}</h5>
          </div>
        </div>
      </Link>
    </div>
  </div>
</section>

<section class="catalog_journal">
  <div class="container py-5">
    <div class="row">

      <!-- Sidebar -->
      <div class="col-lg-3 mb-5">
        <h5 class="mb-3">Категорії</h5>
        <div class="sidebar">
          <ul class="nav flex-column">
            <li class="nav-item">
              <Link href="/catalog-journal" class="nav-link" :class="{ active: !currentCategory }">Всі</Link>
            </li>
            <li v-for="cat in categories" :key="cat" class="nav-item">
              <Link :href="`/catalog-journal?category=${cat}`" class="nav-link" :class="{ active: currentCategory === cat }">{{ cat }}</Link>
            </li>
          </ul>
        </div>
      </div>

      <!-- Posts grid -->
      <div class="col-lg-9">
        <p v-if="!posts.data || posts.data.length === 0" class="text-muted py-4">Публікацій не знайдено.</p>
        <div v-else class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4" id="articles">
          <div v-for="post in posts.data" :key="post.id" class="col">
            <Link :href="`/journal/${post.slug}`" class="text-decoration-none text-dark">
              <div class="card h-100">
                <div class="position-relative">
                  <div class="card-img-top_wrapper">
                    <img :src="post.image ? '/' + post.image : `https://picsum.photos/id/${100 + post.id}/600/400`"
                         class="card-img-top" :alt="post.title">
                  </div>
                  <span v-if="post.category" class="badge position-absolute top-3 start-3">{{ post.category }}</span>
                </div>
                <div class="card-body">
                  <p class="text-muted small">{{ post.formattedDate }}</p>
                  <h6 class="card-title">{{ post.title }}</h6>
                </div>
              </div>
            </Link>
          </div>
        </div>

        <!-- Pagination -->
        <div v-if="posts.last_page > 1" class="mt-5 d-flex justify-content-center gap-1">
          <button
            v-for="link in posts.links"
            :key="link.label"
            class="btn btn-sm"
            :class="link.active ? 'btn-dark' : 'btn-outline-secondary'"
            :disabled="!link.url"
            @click="navigate(link.url)"
            v-html="link.label"
          ></button>
        </div>
      </div>

    </div>
  </div>
</section>
</template>
