<script setup lang="ts">
useHead({
  title: 'Меджурнал — PELOVIT-R',
  meta: [
    { name: 'description', content: 'Корисні статті про косметику, здоров\'я шкіри та лікувальні процедури від PELOVIT-R.' },
  ],
})

const config = useRuntimeConfig()
const { assetUrl } = useAsset()
const route = useRoute()
const router = useRouter()

const { data } = await useFetch<any>(`${config.public.apiBase}/journal`, {
  query: route.query,
  watch: [route.query],
})

const posts = computed(() => data.value?.posts ?? { data: [], last_page: 1, links: [] })
const featured = computed(() => data.value?.featured ?? [])
const categories = computed(() => data.value?.categories ?? [])

const currentCategory = computed(() => route.query.category as string ?? '')
const search = computed(() => route.query.search as string ?? '')

function navigatePage(url: string | null) {
  if (!url) return
  const parsed = new URL(url)
  router.push({ query: { ...route.query, page: parsed.searchParams.get('page') } })
}

function postImg(post: any) {
  return post.image ? assetUrl(post.image) : `https://picsum.photos/id/${100 + post.id}/600/400`
}
</script>

<template>
<header>
  <div class="container py-3">
    <div class="d-flex justify-content-between align-items-center">
      <h1 class="fw-bold">Меджурнал</h1>
      <form @submit.prevent="router.push({ query: { search: ($event.target as any).search.value } })" class="d-flex" style="max-width:420px;width:100%;">
        <div class="input-group" style="border-radius:16px;border:1px solid #DEDEDE;overflow:hidden;">
          <span class="input-group-text"><i class="bi bi-search"></i></span>
          <input type="text" name="search" class="form-control" placeholder="Пошук по блогу" :value="search">
        </div>
      </form>
    </div>
  </div>
</header>

<section v-if="featured.length > 0" class="container publications_box py-5">
  <h5 class="mb-4">Останні публікації</h5>
  <div class="row g-4">
    <div v-for="post in featured" :key="post.id" class="col-lg-6">
      <NuxtLink :to="`/journal/${post.slug}`" class="text-decoration-none text-dark">
        <div class="card h-100">
          <div class="position-relative">
            <div class="card-img-top_wrapper">
              <img :src="postImg(post)" class="card-img-top" :alt="post.title">
            </div>
            <span v-if="post.category" class="badge position-absolute px-3 py-2">{{ post.category }}</span>
          </div>
          <div class="card-body d-flex flex-column">
            <p class="text-muted small data">{{ post.formatted_date }}</p>
            <h5 class="card-title">{{ post.title }}</h5>
          </div>
        </div>
      </NuxtLink>
    </div>
  </div>
</section>

<section class="catalog_journal">
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-3 mb-5">
        <h5 class="mb-3">Категорії</h5>
        <div class="sidebar">
          <ul class="nav flex-column">
            <li class="nav-item">
              <NuxtLink to="/catalog-journal" class="nav-link" :class="{ active: !currentCategory }">Всі</NuxtLink>
            </li>
            <li v-for="cat in categories" :key="cat" class="nav-item">
              <NuxtLink :to="`/catalog-journal?category=${cat}`" class="nav-link" :class="{ active: currentCategory === cat }">{{ cat }}</NuxtLink>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-lg-9">
        <p v-if="!posts.data?.length" class="text-muted py-4">Публікацій не знайдено.</p>
        <div v-else class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4" id="articles">
          <div v-for="post in posts.data" :key="post.id" class="col">
            <NuxtLink :to="`/journal/${post.slug}`" class="text-decoration-none text-dark">
              <div class="card h-100">
                <div class="position-relative">
                  <div class="card-img-top_wrapper">
                    <img :src="postImg(post)" class="card-img-top" :alt="post.title">
                  </div>
                  <span v-if="post.category" class="badge position-absolute top-3 start-3">{{ post.category }}</span>
                </div>
                <div class="card-body">
                  <p class="text-muted small">{{ post.formatted_date }}</p>
                  <h6 class="card-title">{{ post.title }}</h6>
                </div>
              </div>
            </NuxtLink>
          </div>
        </div>

        <div v-if="posts.last_page > 1" class="mt-5 d-flex justify-content-center gap-1">
          <button
            v-for="link in posts.links"
            :key="link.label"
            class="btn btn-sm"
            :class="link.active ? 'btn-dark' : 'btn-outline-secondary'"
            :disabled="!link.url"
            @click="navigatePage(link.url)"
            v-html="link.label"
          ></button>
        </div>
      </div>
    </div>
  </div>
</section>
</template>
