# Деплой на сервер (Docker + MariaDB)

Стек: **Laravel** (API + адмінка MoonShine, php-fpm+nginx) · **Nuxt SSR** (вітрина) ·
**MariaDB**. Хост-nginx термінує HTTPS і розподіляє трафік між контейнерами.

```
Інтернет ──HTTPS──> host nginx ─┬─ /api /admin /vendor /storage /products …  → laravel:8000
                                └─ /  (усе інше, SSR)                          → nuxt:3000
```

## 0. Передумови на сервері
```bash
# Docker + compose-плагін (якщо ще нема)
curl -fsSL https://get.docker.com | sh
docker compose version
```

## 1. Код і .env
```bash
git clone git@github.com:IvanSerbeniuk/Pelovit.git /opt/pelovit
cd /opt/pelovit
cp .env.docker.example .env
# згенерувати APP_KEY:
echo "APP_KEY=base64:$(openssl rand -base64 32)"   # вставити в .env
nano .env   # заповнити: DB паролі, LIQPAY_*, RESEND_API_KEY, домени
```
`.env` вже містить домен `develop-site.online` у прикладі — заміни, якщо інший.

## 2. Збірка та запуск
```bash
docker compose up -d --build
docker compose ps           # усі healthy/running
docker compose logs -f laravel   # переконатися, що міграції пройшли
```
Міграції виконуються автоматично при старті `laravel` (entrypoint).

## 3. Адмін-користувач (обов'язково — БД чиста)
```bash
docker compose exec laravel php artisan moonshine:user
```
(За потреби демо-каталог: `docker compose exec laravel php artisan db:seed --force` —
додасть тестові категорії/товари. Для чистого прод-старту пропусти й додай товари в `/admin`.)

## 4. Хост-nginx
У вже існуючий TLS-сервер certbot для `develop-site.online` додай вміст
`deploy/nginx-host.conf` (замінивши дефолтний `location /`). Далі:
```bash
nginx -t && systemctl reload nginx
```

## 5. Перевірка
- `https://develop-site.online` — вітрина (Nuxt).
- `https://develop-site.online/admin` — адмінка.
- `https://develop-site.online/api/settings` — має віддати JSON.
- Оформи тестове замовлення з LiqPay → оплати sandbox-карткою `4242 4242 4242 4242` →
  **тепер колбек дійде** (APP_URL публічний) і замовлення стане «Оплачено».

## Оновлення надалі
```bash
cd /opt/pelovit && git pull
docker compose up -d --build          # пересбирає змінені образи
docker compose exec laravel php artisan migrate --force   # якщо нема в entrypoint-логах
```

## Важливо
- **LiqPay**: зараз sandbox-ключі. Після активації кабінету — впиши бойові `LIQPAY_*`
  і `LIQPAY_SANDBOX=false`, `docker compose up -d`.
- **Нова Пошта**: `NOVA_POSHTA_API_KEY` порожній → автозаповнення міст вимкнено, у формі
  замовлення діє тимчасовий `REQUIRE_NP=false` (місто/відділення вводяться текстом). Коли
  додаси ключ НП — постав `REQUIRE_NP = true` у `frontend/app/pages/order/index.vue` і
  перезбери: `docker compose up -d --build nuxt`.
- **Дані**: свіжа БД порожня. Товари/категорії — через `/admin`, або імпортуй дамп своєї
  локальної БД (`docker compose exec -T db mariadb -u root -p pelovit < dump.sql`).
- **Ресурси**: збірка Nuxt важка для 1 ГБ RAM — swap (у тебе 2 ГБ) обов'язковий.
```
