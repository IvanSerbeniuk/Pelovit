#!/usr/bin/env bash
# Генерує .webp поруч з кожним PNG/JPG у public/. Ідемпотентний: перезбирає
# лише ті файли, де оригінал новіший за .webp.
#
# nginx віддає .webp автоматично (див. deploy/develop-site.online.conf):
# якщо браузер шле Accept: image/webp і файл існує — йде .webp, інакше оригінал.
# Тобто для картинок без .webp нічого не ламається.
#
# Використання:  ./deploy/make-webp.sh
set -euo pipefail

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
DIRS=(public/images public/products public/categories public/storage)
QUALITY=82

command -v cwebp >/dev/null || { echo "cwebp не знайдено (apt install webp)"; exit 1; }

made=0 skipped=0
for dir in "${DIRS[@]}"; do
    [ -d "$ROOT/$dir" ] || continue
    while IFS= read -r -d '' img; do
        # Ім'я — з повним оригінальним розширенням (foo.png.webp), щоб nginx
        # міг зібрати шлях як $uri$webp_suffix у try_files.
        webp="${img}.webp"
        if [ -f "$webp" ] && [ "$webp" -nt "$img" ]; then
            skipped=$((skipped + 1))
            continue
        fi
        cwebp -quiet -q "$QUALITY" -metadata none "$img" -o "$webp"
        # На частині зображень (плоска графіка, вже стиснуті PNG) webp виходить
        # більшим за оригінал — тоді викидаємо його, і nginx віддасть оригінал.
        if [ "$(stat -c%s "$webp")" -ge "$(stat -c%s "$img")" ]; then
            rm -f "$webp"
            skipped=$((skipped + 1))
            continue
        fi
        made=$((made + 1))
    done < <(find "$ROOT/$dir" -type f \( -iname '*.png' -o -iname '*.jpg' -o -iname '*.jpeg' \) -print0)
done

echo "webp: створено $made, без змін $skipped"
