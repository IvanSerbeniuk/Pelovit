<script setup lang="ts">
// Опитування замість кнопки, яка раніше просто скролила до форми.
// Віддає назовні підсумок для заявки і параметри для калькулятора.
const emit = defineEmits<{
  finish: [payload: { summary: string, product: string | null, quantity: number | null }]
}>()

interface QuizOption { label: string, product?: string, quantity?: number }
interface QuizStep { key: string, question: string, options: QuizOption[] }

const steps: QuizStep[] = [
  {
    key: 'Хто ви',
    question: 'Для кого потрібні засоби?',
    options: [
      { label: 'Косметолог' },
      { label: 'Масажист або спа-майстер' },
      { label: 'Майстер манікюру' },
      { label: 'Трихолог' },
      { label: 'Подолог' },
      { label: 'Медичний або оздоровчий центр' },
    ],
  },
  {
    key: 'Тип продукту',
    question: 'Який продукт цікавить у першу чергу?',
    options: [
      { label: 'Крем', product: 'Крем' },
      { label: 'Сироватка', product: 'Сироватка' },
      { label: 'Маска', product: 'Маска' },
      { label: 'Гель', product: 'Гель' },
      { label: 'Олія', product: 'Олія' },
      { label: 'Ще не визначився', product: undefined },
    ],
  },
  {
    key: 'Тираж',
    question: 'Який тираж плануєте?',
    options: [
      { label: 'До 100 шт', quantity: 100 },
      { label: '100–500 шт', quantity: 300 },
      { label: '500–1000 шт', quantity: 700 },
      { label: 'Більше 1000 шт', quantity: 1200 },
      { label: 'Ще не знаю', quantity: undefined },
    ],
  },
  {
    key: 'Готовність бренду',
    question: 'Чи є у вас власний бренд?',
    options: [
      { label: 'Так, є назва й готовий дизайн' },
      { label: 'Є назва, дизайну немає' },
      { label: 'Ще нічого немає' },
    ],
  },
]

const started = ref(false)
const current = ref(0)
const answers = ref<Record<string, string>>({})
const picked = ref<{ product: string | null, quantity: number | null }>({ product: null, quantity: null })

const finished = computed(() => started.value && current.value >= steps.length)
const progress = computed(() => Math.round((current.value / steps.length) * 100))

// Порада спирається на те, що вже заявлено на сторінці, а не вигадується.
const advice = computed(() => {
  const brand = answers.value['Готовність бренду']
  if (brand === 'Ще нічого немає') {
    return 'Почнемо з нуля: технолог підбере рецептуру, а ви отримаєте 3 безкоштовні години з нашим дизайнером на назву та етикетку.'
  }
  if (brand === 'Є назва, дизайну немає') {
    return 'Назва вже є — залишився дизайн. Розробка етикетки входить у послугу, ви отримуєте 3 безкоштовні години з дизайнером.'
  }
  if (brand) {
    return 'З готовим дизайном ми стартуємо одразу: від затвердження етикетки до готової продукції — 15 днів.'
  }
  return ''
})

function start() {
  started.value = true
  current.value = 0
  answers.value = {}
  picked.value = { product: null, quantity: null }
}

function choose(step: QuizStep, option: QuizOption) {
  answers.value[step.key] = option.label
  if (option.product) picked.value.product = option.product
  if (option.quantity) picked.value.quantity = option.quantity
  current.value += 1

  if (current.value >= steps.length) {
    emit('finish', {
      summary: Object.entries(answers.value).map(([k, v]) => `${k}: ${v}`).join('\n'),
      product: picked.value.product,
      quantity: picked.value.quantity,
    })
  }
}

function back() {
  if (current.value > 0) current.value -= 1
}
</script>

<template>
  <div class="contract-quiz">
    <button v-if="!started" type="button" class="btn btn-dark btn-lg w-100 py-4 fs-5 rad-16" @click="start">
      Розпочати опитування
    </button>

    <div v-else-if="!finished" class="contract-quiz__box">
      <div class="contract-quiz__head">
        <span>Питання {{ current + 1 }} з {{ steps.length }}</span>
        <button type="button" class="contract-quiz__back" :disabled="current === 0" @click="back">Назад</button>
      </div>

      <div class="contract-quiz__progress" role="progressbar" :aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100">
        <span :style="{ width: `${progress}%` }"></span>
      </div>

      <p class="contract-quiz__question">{{ steps[current]!.question }}</p>

      <div class="contract-quiz__options">
        <button
          v-for="option in steps[current]!.options"
          :key="option.label"
          type="button"
          class="contract-quiz__option"
          @click="choose(steps[current]!, option)"
        >{{ option.label }}</button>
      </div>
    </div>

    <div v-else class="contract-quiz__box contract-quiz__box--result">
      <p class="contract-quiz__done">Готово — ось що ми зрозуміли:</p>
      <ul class="contract-quiz__summary">
        <li v-for="(value, key) in answers" :key="key"><span>{{ key }}</span><b>{{ value }}</b></li>
      </ul>
      <p v-if="advice" class="contract-quiz__advice">{{ advice }}</p>
      <p class="contract-quiz__note">Відповіді підуть менеджеру разом із заявкою — заповніть контакти у формі поруч.</p>
      <button type="button" class="contract-quiz__restart" @click="start">Пройти ще раз</button>
    </div>
  </div>
</template>
