#!/usr/bin/env bash
# Переносить локальну БД у прод (MariaDB-контейнер) однією командою.
#
#   ./deploy/push-db.sh root@develop-site.online
#
# Локальні креди беруться з ./.env (DB_DATABASE/DB_USERNAME/DB_PASSWORD).
# Пароль прод-БД читається з env контейнера ($MARIADB_ROOT_PASSWORD) — не треба вводити.
# УВАГА: перезаписує однойменні таблиці на проді даними з локальної БД.
set -euo pipefail

REMOTE="${1:?Використання: ./deploy/push-db.sh user@host [remote_dir] [prod_db]}"
REMOTE_DIR="${2:-/opt/pelovit}"
PROD_DB="${3:-pelovit}"

# Локальні креди з .env
envval() { grep -E "^$1=" .env | head -1 | cut -d= -f2- | tr -d '"'; }
LDB="$(envval DB_DATABASE)"; LUSER="$(envval DB_USERNAME)"; LPASS="$(envval DB_PASSWORD)"

echo "Локальна БД '${LDB}'  →  ${REMOTE}:${REMOTE_DIR} (контейнер db, база '${PROD_DB}')"

mysqldump -u"${LUSER}" -p"${LPASS}" --no-tablespaces --single-transaction \
          --default-character-set=utf8mb4 "${LDB}" \
  | ssh "${REMOTE}" "cd ${REMOTE_DIR} && docker compose exec -T db sh -c 'exec mariadb -uroot -p\"\$MARIADB_ROOT_PASSWORD\" ${PROD_DB}'"

echo "Готово. Перевір каталог на https://develop-site.online"
