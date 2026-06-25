<script setup>
import { onMounted } from 'vue'

onMounted(() => {
    window.Cart?._updateBadge()
    window.Wishlist?._updateBadge()

    // Range slider bubbles
    const ranges = document.querySelectorAll('.custom-range')
    ranges.forEach(range => {
        const bubble = range.previousElementSibling
        function update() {
            const val = range.value
            const min = range.min
            const max = range.max
            const unit = range.dataset.unit || ''
            if (bubble) {
                bubble.textContent = val + ' ' + unit
                const percent = (val - min) / (max - min)
                bubble.style.left = (percent * range.offsetWidth + 8) + 'px'
            }
        }
        range.addEventListener('input', update)
        window.addEventListener('resize', update)
        update()
    })

    // Category tabs
    document.querySelectorAll('[data-category-tab]').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('[data-category-tab]').forEach(b => b.classList.remove('active'))
            btn.classList.add('active')
            const cat = btn.dataset.categoryTab
            document.querySelectorAll('[data-category-content]').forEach(c => {
                c.style.display = c.dataset.categoryContent === cat ? 'block' : 'none'
            })
        })
    })
})
</script>

<template>
<!-- Breadcrumb hero -->
<section class="py-4 bg-light">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Головна</a></li>
        <li class="breadcrumb-item active">Контрактне виробництво</li>
      </ol>
    </nav>
    <h1 class="fw-bold mt-2">Контрактне виробництво косметики</h1>
    <p class="lead">Виготовляємо косметику під вашим брендом — від розробки формули до готової продукції.</p>
    <a href="#consultation" class="btn btn-dark px-5 py-3 rad-16 mt-3">Отримати консультацію</a>
  </div>
</section>

<!-- Services section -->
<section class="py-5">
  <div class="container">
    <h2 class="fw-bold mb-4">Наші послуги</h2>
    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="card h-100 p-4">
          <h5>Розробка формули</h5>
          <p class="text-muted">Індивідуальна розробка косметичної формули з урахуванням ваших вимог та цільової аудиторії.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card h-100 p-4">
          <h5>Виробництво</h5>
          <p class="text-muted">Повний цикл виробництва на сертифікованому обладнанні відповідно до стандартів якості.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card h-100 p-4">
          <h5>Пакування та маркування</h5>
          <p class="text-muted">Розробка дизайну та виготовлення пакування з вашим логотипом та брендингом.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card h-100 p-4">
          <h5>Сертифікація</h5>
          <p class="text-muted">Супровід у процесі сертифікації та отримання всіх необхідних дозволів.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card h-100 p-4">
          <h5>Логістика</h5>
          <p class="text-muted">Організація доставки готової продукції до вашого складу або до кінцевого споживача.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card h-100 p-4">
          <h5>Технічна підтримка</h5>
          <p class="text-muted">Постійний супровід від наших технологів протягом усього виробничого процесу.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Own Brands -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="fw-bold mb-4">Власні бренди</h2>
    <div class="row g-4">
      <div class="col-md-3 col-6">
        <div class="card text-center p-3">
          <img :src="'/images/image.png'" alt="Бренд" class="img-fluid mb-3">
          <h6>Пеловіт-Р</h6>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="card text-center p-3">
          <img :src="'/images/image.png'" alt="Бренд" class="img-fluid mb-3">
          <h6>Доктор Лоріс+</h6>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Process steps -->
<section class="py-5">
  <div class="container">
    <h2 class="fw-bold mb-5">Як ми працюємо</h2>
    <div class="row g-4">
      <div class="col-md-3 text-center">
        <div class="step-number mb-3">1</div>
        <h5>Заявка</h5>
        <p class="text-muted">Ви залишаєте заявку та описуєте ваш продукт</p>
      </div>
      <div class="col-md-3 text-center">
        <div class="step-number mb-3">2</div>
        <h5>Консультація</h5>
        <p class="text-muted">Наш технолог підбирає формулу та інгредієнти</p>
      </div>
      <div class="col-md-3 text-center">
        <div class="step-number mb-3">3</div>
        <h5>Виробництво</h5>
        <p class="text-muted">Запускаємо виробництво відповідно до вашого замовлення</p>
      </div>
      <div class="col-md-3 text-center">
        <div class="step-number mb-3">4</div>
        <h5>Доставка</h5>
        <p class="text-muted">Готова продукція доставляється до вас</p>
      </div>
    </div>
  </div>
</section>

<!-- Calculator section -->
<section class="py-5 bg-light calculator-section">
  <div class="container">
    <h2 class="fw-bold mb-4">Калькулятор вартості</h2>
    <div class="row g-4">
      <div class="col-lg-6">
        <div class="mb-4">
          <label class="form-label fw-medium">Обсяг виробництва (од.)</label>
          <div class="bubble-value" style="position:relative;">1000</div>
          <input type="range" class="form-range custom-range" min="100" max="10000" value="1000" step="100" data-unit="од.">
        </div>
        <div class="mb-4">
          <label class="form-label fw-medium">Об'єм продукту (мл)</label>
          <div class="bubble-value" style="position:relative;">250</div>
          <input type="range" class="form-range custom-range" min="50" max="1000" value="250" step="50" data-unit="мл">
        </div>
        <a href="#consultation" class="btn btn-dark px-4 py-2 rad-16">Отримати розрахунок</a>
      </div>
      <div class="col-lg-6">
        <div class="card p-4">
          <h5 class="mb-3">Орієнтована вартість</h5>
          <p class="text-muted">Точна вартість розраховується індивідуально залежно від складу, пакування та умов виробництва.</p>
          <p class="text-muted">Зв'яжіться з нами для отримання детального комерційного пропозиція.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Unique ingredients -->
<section class="py-5">
  <div class="container">
    <h2 class="fw-bold mb-4">Унікальні інгредієнти</h2>
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead class="table-light">
          <tr>
            <th>Інгредієнт</th>
            <th>Властивості</th>
            <th>Застосування</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Куяльницька грязь</td>
            <td>Протизапальна, регенеруюча</td>
            <td>Маски, скраби, лікувальні препарати</td>
          </tr>
          <tr>
            <td>Мінерали лиману</td>
            <td>Зміцнення, детокс</td>
            <td>Засоби догляду за тілом</td>
          </tr>
          <tr>
            <td>Натуральні олії</td>
            <td>Живлення, зволоження</td>
            <td>Всі типи продуктів</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- Certificates -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="fw-bold mb-4">Сертифікати</h2>
    <div class="row g-4">
      <div class="col-md-3 col-6">
        <div class="card p-3 text-center">
          <img :src="'/images/image.png'" alt="Сертифікат" class="img-fluid">
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="card p-3 text-center">
          <img :src="'/images/image.png'" alt="Сертифікат" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Consultation Form -->
<section id="consultation" class="consultation-section py-5">
  <div class="container">
    <div class="consultation-form" style="grid-column: 1 / -1;">
      <h2>Замовити консультацію</h2>
      <p>Залиште свої контакти і наш менеджер зв'яжеться з вами для обговорення деталей контрактного виробництва.</p>
      <form>
        <input type="text" class="width_input" placeholder="Ваше ім'я" required>
        <input type="tel" class="width_input" placeholder="+38 (0..) ... ...." required>
        <input type="text" class="width_input" placeholder="Назва компанії / продукту">
        <div class="contact-method">
          <p>Спосіб зв'язку</p>
          <label><input type="radio" name="contact" checked> Дзвінок</label>
          <label><input type="radio" name="contact"> Telegram</label>
          <label><input type="radio" name="contact"> Viber</label>
          <label><input type="radio" name="contact"> WhatsApp</label>
        </div>
        <button type="submit" class="submit-btn">Надіслати</button>
      </form>
      <div class="social-links mt-3">
        <p>Ви можете написати нам самі:</p>
        <div class="social-icons">
          <a href="#" target="_blank" rel="noopener" aria-label="Instagram">
            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"><path d="M8.00544 12.0107C8.00544 9.79965 9.79682 8.00679 12.0072 8.00679C14.2176 8.00679 16.0099 9.79965 16.0099 12.0107C16.0099 14.2217 14.2176 16.0145 12.0072 16.0145C9.79682 16.0145 8.00544 14.2217 8.00544 12.0107ZM5.84165 12.0107C5.84165 15.4169 8.60196 18.178 12.0072 18.178C15.4124 18.178 18.1728 15.4169 18.1728 12.0107C18.1728 8.60444 15.4124 5.84333 12.0072 5.84333C8.60196 5.84333 5.84165 8.60444 5.84165 12.0107ZM16.976 5.5988C16.9759 5.88385 17.0603 6.16255 17.2185 6.39963C17.3767 6.63671 17.6017 6.82153 17.8649 6.93072C18.1281 7.03991 18.4178 7.06857 18.6974 7.01307C18.9769 6.95757 19.2337 6.82041 19.4353 6.61892C19.6369 6.41743 19.7742 6.16068 19.8299 5.88112C19.8856 5.60156 19.8572 5.31175 19.7482 5.04835C19.6393 4.78495 19.4547 4.55978 19.2178 4.40131C18.9809 4.24285 18.7024 4.15821 18.4174 4.15809H18.4168C18.0349 4.15827 17.6686 4.3101 17.3984 4.58023C17.1282 4.85036 16.9763 5.2167 16.976 5.5988ZM7.15629 21.7871C5.98564 21.7337 5.34935 21.5387 4.92651 21.3739C4.36591 21.1556 3.96593 20.8956 3.54539 20.4755C3.12485 20.0554 2.86453 19.6557 2.64725 19.0949C2.48242 18.6722 2.28742 18.0355 2.2342 16.8645C2.17599 15.5985 2.16437 15.2182 2.16437 12.0108C2.16437 8.80334 2.17695 8.42409 2.2342 7.15701C2.28752 5.98602 2.48395 5.35061 2.64725 4.92658C2.86549 4.36583 3.12543 3.96573 3.54539 3.54507C3.96535 3.12441 4.36495 2.86402 4.92651 2.64667C5.34916 2.48179 5.98564 2.28673 7.15629 2.2335C8.42195 2.17528 8.80214 2.16365 12.0072 2.16365C15.2123 2.16365 15.5928 2.17624 16.8596 2.2335C18.0302 2.28683 18.6654 2.48333 19.0893 2.64667C19.6499 2.86402 20.0499 3.12498 20.4705 3.54507C20.891 3.96515 21.1503 4.36583 21.3686 4.92658C21.5334 5.34936 21.7284 5.98602 21.7816 7.15701C21.8398 8.42409 21.8515 8.80334 21.8515 12.0108C21.8515 15.2182 21.8398 15.5974 21.7816 16.8645C21.7283 18.0355 21.5324 18.672 21.3686 19.0949C21.1503 19.6557 20.8904 20.0558 20.4705 20.4755C20.0505 20.8952 19.6499 21.1556 19.0893 21.3739C18.6667 21.5388 18.0302 21.7338 16.8596 21.7871C15.5939 21.8453 15.2137 21.8569 12.0072 21.8569C8.8007 21.8569 8.42156 21.8453 7.15629 21.7871ZM7.05687 0.0727366C5.77863 0.130964 4.90518 0.333704 4.14239 0.630608C3.35241 0.937216 2.68366 1.34856 2.01538 2.01597C1.34711 2.68338 0.936946 3.35338 0.630426 4.14358C0.333608 4.90708 0.130927 5.7803 0.0727156 7.05891C0.0135441 8.33953 0 8.74895 0 12.0107C0 15.2724 0.0135441 15.6818 0.0727156 16.9624C0.130927 18.2411 0.333608 19.1143 0.630426 19.8777C0.936946 20.6675 1.34721 21.3382 2.01538 22.0054C2.68356 22.6725 3.35241 23.0833 4.14239 23.3907C4.90662 23.6876 5.77863 23.8904 7.05687 23.9486C8.3378 24.0068 8.74643 24.0213 12.0072 24.0213C15.268 24.0213 15.6773 24.0078 16.9575 23.9486C18.2359 23.8904 19.1087 23.6876 19.872 23.3907C20.6615 23.0833 21.3307 22.6728 21.999 22.0054C22.6673 21.338 23.0766 20.6675 23.384 19.8777C23.6808 19.1143 23.8844 18.241 23.9417 16.9624C23.9999 15.6808 24.0134 15.2724 24.0134 12.0107C24.0134 8.74895 23.9999 8.33953 23.9417 7.05891C23.8835 5.78021 23.6808 4.9066 23.384 4.14358C23.0766 3.35386 22.6662 2.68443 21.999 2.01597C21.3318 1.3475 20.6615 0.937216 19.873 0.630608C19.1087 0.333704 18.2358 0.130003 16.9585 0.0727366C15.6782 0.0145089 15.2689 0 12.0082 0C8.74739 0 8.3378 0.013548 7.05687 0.0727366Z" fill="white"/></svg>
          </a>
          <a href="#" target="_blank" rel="noopener" aria-label="Telegram">
            <svg width="23" height="19" viewBox="0 0 23 19" fill="none"><path d="M1.35369 8.15985C1.35369 8.15985 11.1191 4.04681 14.506 2.59851C15.8043 2.01923 20.2072 0.165396 20.2072 0.165396C20.2072 0.165396 22.2393 -0.645587 22.07 1.32402C22.0135 2.13509 21.5619 4.97365 21.1104 8.044C20.433 12.3888 19.6992 17.1391 19.6992 17.1391C19.6992 17.1391 19.5863 18.4716 18.6267 18.7033C17.6671 18.935 16.0865 17.8923 15.8043 17.6605C15.5784 17.4868 11.5707 14.8798 10.1031 13.6053C9.70792 13.2578 9.25636 12.5627 10.1595 11.7516C12.1916 9.83986 14.6188 7.46472 16.0865 5.95853C16.7639 5.26332 17.4412 3.64128 14.6188 5.61089C10.6111 8.44953 6.65977 11.1143 6.65977 11.1143C6.65977 11.1143 5.75658 11.6936 4.06317 11.1722C2.36969 10.6509 0.394016 9.95572 0.394016 9.95572C0.394016 9.95572 -0.960648 9.08677 1.35369 8.15985Z" fill="white"/></svg>
          </a>
          <a href="#" target="_blank" rel="noopener" aria-label="Viber">
            <svg width="23" height="25" viewBox="0 0 23 25" fill="none"><path d="M5.43765 21.7041C5.43765 21.3018 5.43765 20.8994 5.43765 20.4971C5.4405 20.4806 5.43993 20.4638 5.43595 20.4475C5.43197 20.4313 5.42467 20.4161 5.41451 20.4028C5.40434 20.3895 5.39153 20.3784 5.37687 20.3701C5.3622 20.3619 5.34599 20.3568 5.32923 20.3551C4.32277 20.0717 3.39381 19.567 2.61159 18.8785C2.04166 18.3648 1.56713 17.756 1.20959 17.0798C0.705649 16.1029 0.370269 15.0494 0.217353 13.9629C0.0278894 12.5999 -0.0379108 11.2229 0.0207419 9.84829C0.0336043 9.20743 0.066679 8.57386 0.140178 7.933C0.257396 6.71519 0.567441 5.52326 1.05892 4.40101C1.66581 3.02117 2.76678 1.91279 4.14957 1.28958C5.09153 0.862486 6.08249 0.550685 7.10057 0.361072C8.09896 0.173701 9.1098 0.0586971 10.1251 0.0169759C11.0402 -0.0150904 11.9565 -0.00172252 12.8703 0.0570295C14.1782 0.111729 15.4742 0.326367 16.729 0.696065C17.6593 0.961778 18.5443 1.36372 19.3548 1.88857C20.1444 2.42567 20.7831 3.15308 21.2106 4.0023C21.7132 4.99415 22.0549 6.05831 22.2231 7.1556C22.3323 7.80707 22.4041 8.46415 22.438 9.12369C22.4858 9.94114 22.4803 10.7622 22.4491 11.5761C22.4178 12.3899 22.348 13.18 22.247 13.9774C22.1192 15.1743 21.7479 16.3331 21.1555 17.3838C20.3844 18.713 19.1491 19.7167 17.6826 20.2058C16.6799 20.5537 15.6445 20.8013 14.592 20.9449C13.8221 21.0505 13.0503 21.127 12.2749 21.1579C11.6814 21.1853 11.0879 21.178 10.4944 21.1689C10.1581 21.1689 9.82372 21.1361 9.4893 21.107C9.45647 21.1008 9.42254 21.1045 9.3918 21.1174C9.36106 21.1304 9.33488 21.1521 9.31657 21.1798C8.64038 21.9845 7.93846 22.7674 7.23103 23.5466C7.10217 23.6888 6.95297 23.8114 6.7882 23.9107C6.68003 23.981 6.5567 24.0251 6.42815 24.0395C6.29961 24.0539 6.16945 24.0381 6.0482 23.9935C5.92694 23.9488 5.81798 23.8765 5.73011 23.7824C5.64225 23.6884 5.57794 23.5752 5.54238 23.4519C5.47236 23.2329 5.43763 23.0044 5.43948 22.7746C5.43765 22.4142 5.43765 22.0591 5.43765 21.7041Z" fill="white"/></svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
</template>
