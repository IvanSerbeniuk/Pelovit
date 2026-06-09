# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project

**Pelovit-R** — a Ukrainian cosmetics e-commerce storefront built with Laravel 13 + Blade + Bootstrap 5 + Tailwind CSS 4. The site is Ukrainian-language (`lang="uk"`). No admin panel exists yet; product/category data is managed directly via the database or Tinker.

## Commands

**First-time setup:**
```bash
composer run setup
```

**Start all dev services (PHP server + Vite HMR + queue + log viewer):**
```bash
composer run dev
```

**Run tests:**
```bash
composer run test
# or a single test file:
php artisan test tests/Feature/ExampleTest.php
```

**Lint (Laravel Pint):**
```bash
./vendor/bin/pint
# check only, no changes:
./vendor/bin/pint --test
```

**Build frontend assets:**
```bash
npm run build
```

**Database:**
```bash
php artisan migrate
php artisan migrate:fresh --seed   # reset + seed
php artisan tinker                 # interactive REPL
```

## Architecture

### Database

SQLite in development (`database/database.sqlite`). Two domain tables:

- **categories** — self-referencing tree (`parent_id`), ordered by `sort_order`. Only root categories (`parent_id IS NULL`) are shown in the catalog sidebar; children are eager-loaded via `with('children')`.
- **products** — belong to one category. `image` is the primary thumbnail path; `images` is a JSON array of gallery paths stored under `public/products/`. `is_featured` surfaces a product on the homepage promo section. `old_price` enables the computed `discountPercent` accessor on the model.

### Routing & Controllers

All routes are in `routes/web.php`. Most pages are static Blade views returned directly from route closures. Only two routes use controllers:

- `GET /catalog` → `CatalogController@index` — filters by category slug, brand, price range, and sort; paginates 12 per page.
- `GET /product/{slug}` → `ProductController@show` — resolves product by slug, attaches up to 4 related products from the same category.

### Frontend

- **Layout:** `resources/views/layouts/app.blade.php` — wraps all pages. Loads Bootstrap 5.3 and Font Awesome from CDN, then the compiled Vite asset (`resources/sass/main.scss`).
- **Partials:** `resources/views/partials/navbar.blade.php` and `footer.blade.php` are included globally.
- **Styles:** SCSS-only (no JS framework). `main.scss` imports one partial per page/component. Each page's styles live in its own `_<page>.scss` file. Tailwind CSS 4 is available via the Vite plugin but SCSS partials are the primary styling mechanism.
- **No custom JavaScript** — `resources/js/app.js` exists but is not bundled. Interactive behavior relies entirely on Bootstrap's JS bundle loaded from CDN.

### Image storage

Product images are stored under `public/products/` (gitignored) and referenced by relative path in the `image` / `images` columns. No filesystem disk abstraction is used — paths are direct public URLs.
