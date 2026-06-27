<script setup lang="ts">
useHead({
  title: 'Лікувальні масажі — Майстрам PELOVIT-R',
  meta: [{ name: 'description', content: 'Відеопротоколи лікувальних масажів з продуктами Pelovit-R для майстрів салонів краси.' }],
})
</script>

<template>
<section class="py-5 text-white master_category-section">
  <div class="container">
    <div class="master_category_breadcrums">
      <div class="breadcrumb_master">
        <NuxtLink to="/masters" class="text-white text-decoration-none">Майстрам</NuxtLink>
        &gt; Лікувальні масажі
      </div>
      <h1 class="fw-bold">Лікувальні масажі</h1>
    </div>
  </div>
</section>

<section>
  <div class="master_category container py-4">
    <div class="row">
      <div class="col-lg-3">
        <div class="sidebar sticky-top" style="top: 20px;">
          <div class="nav flex-column">
            <a href="#" class="nav-link active">Лімфодренажний масаж обличчя</a>
            <a href="#" class="nav-link">Масаж обличчя від набряків</a>
            <a href="#" class="nav-link">Антиейдж масаж обличчя</a>
            <a href="#" class="nav-link">Розслабляючий масаж обличчя</a>
            <a href="#" class="nav-link">Лімфодренажний масаж обличчя</a>
          </div>
        </div>
      </div>

      <div class="col-lg-9">
        <div class="hero-video mb-4">
          <iframe width="100%" height="550px"
            src="https://www.youtube.com/embed/y46hvE9JAXo?si=Olu0uOZGiZZcVqpu"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>

        <h1 class="display-5 fw-bold mb-3">Лімфодренажний масаж обличчя</h1>
        <p class="lead text-muted mb-5">
          Ніжний лімфодренажний масаж обличчя допомагає зняти набряклість, покращити мікроциркуляцію та повернути шкірі свіжий, відпочитий вигляд. Ідеальний ритуал для легкості й природного сяйва.
        </p>

        <div class="tabs mb-5">
          <button class="tab">Препарати з відео</button>
          <button class="tab active">Протокол процедури</button>
        </div>

        <section class="content_procedurs" id="procedurs">
          <div id="tab-products">
            <h5 class="mb-3">Препарати, які були використані</h5>
            <div class="row g-3 mb product_cards_sm">
              <div class="col-md-4 product_card_sm">
                <div class="cart-item d-flex align-items-center gap-3 bg-white p-2-5 rad-16">
                  <img :src="'/images/image.png'" alt="Пеловіт" class="product-img" style="width: 50px;">
                  <div>
                    <h6>Пеловіт-Р Класичний 500мл</h6>
                    <div class="content-product_card_sm">
                      <div class="fw-medium my-auto">690₴</div>
                      <button class="btn buy rad-16">
                        <span>Купити</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M6.33105 8H17.67C17.9584 7.99997 18.2434 8.06229 18.5054 8.1827C18.7674 8.30311 19.0003 8.47876 19.1881 8.6976C19.3759 8.91645 19.5141 9.17331 19.5933 9.45059C19.6726 9.72786 19.6909 10.019 19.647 10.304L18.392 18.456C18.2831 19.1644 17.9241 19.8105 17.38 20.2771C16.836 20.7438 16.1428 21.0002 15.426 21H8.57405C7.85745 21 7.16453 20.7434 6.62068 20.2768C6.07683 19.8102 5.71797 19.1643 5.60905 18.456L4.35405 10.304C4.31022 10.019 4.32854 9.72786 4.40775 9.45059C4.48697 9.17331 4.62521 8.91645 4.81299 8.6976C5.00078 8.47876 5.23367 8.30311 5.49569 8.1827C5.75772 8.06229 6.04268 7.99997 6.33105 8Z" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M9 11V6C9 5.20435 9.31607 4.44129 9.87868 3.87868C10.4413 3.31607 11.2044 3 12 3C12.7956 3 13.5587 3.31607 14.1213 3.87868C14.6839 4.44129 15 5.20435 15 6V11" stroke="#FAF7F3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</section>
</template>
