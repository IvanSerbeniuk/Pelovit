// Контент сторінки «Майстрам → категорія». Тут єдине місце, де редагуються
// категорії, процедури, їхні відео та підбірка препаратів.
//
// youtubeId — ідентифікатор ролика (частина URL після /embed/ або ?v=).
// protocol  — покрокові дії майстра; поки список порожній, вкладка показує
//             нейтральну заглушку замість вигаданого тексту.
// productSlugs — слаги товарів із каталогу; картки тягнуться з API.

export interface MasterProcedure {
  slug: string
  title: string
  description?: string
  youtubeId?: string
  protocol?: string[]
  productSlugs?: string[]
}

export interface MasterCategory {
  slug: string
  title: string
  procedures: MasterProcedure[]
}

export const masterCategories: MasterCategory[] = [
  {
    slug: 'spa-masazhi',
    title: 'Спа-масажі',
    procedures: [],
  },
  {
    slug: 'likuvalni-masazhi',
    title: 'Лікувальні масажі',
    procedures: [
      {
        slug: 'limfodrenazhnyi-masazh-oblychchia',
        title: 'Лімфодренажний масаж обличчя',
        description: 'Ніжний лімфодренажний масаж обличчя допомагає зняти набряклість, покращити мікроциркуляцію та повернути шкірі свіжий, відпочитий вигляд. Ідеальний ритуал для легкості й природного сяйва.',
        productSlugs: [
          'maska-obliche-hriazova',
          'syrovatka-obliche-anti-age',
          'tonik-obliche-osvizhaluiuchyi',
        ],
      },
      {
        slug: 'masazh-oblychchia-vid-nabriakiv',
        title: 'Масаж обличчя від набряків',
        productSlugs: ['tonik-obliche-osvizhaluiuchyi', 'maska-obliche-hriazova'],
      },
      {
        slug: 'antyeidzh-masazh-oblychchia',
        title: 'Антиейдж масаж обличчя',
        productSlugs: ['syrovatka-obliche-anti-age', 'krem-obliche-zvolozhuiuchyi'],
      },
      {
        slug: 'rozslabliauchyi-masazh-oblychchia',
        title: 'Розслабляючий масаж обличчя',
        productSlugs: ['krem-obliche-zvolozhuiuchyi'],
      },
    ],
  },
  {
    slug: 'antytseliulitni-masazhi',
    title: 'Антицелюлітні масажі',
    procedures: [],
  },
  {
    slug: 'aparatni-masazhi',
    title: 'Апаратні масажі',
    procedures: [],
  },
  {
    slug: 'masazhi-oblychchia',
    title: 'Масажі обличчя',
    procedures: [],
  },
]

export const findCategory = (slug?: string) =>
  masterCategories.find(c => c.slug === slug)
