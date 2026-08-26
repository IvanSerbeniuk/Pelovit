const BLOCKED_TAGS = /<\/?(script|style|iframe|object|embed|form|input|link|meta)\b[^>]*>/gi
const BLOCKED_BLOCKS = /<(script|style)\b[^>]*>[\s\S]*?<\/\1>/gi
const EVENT_ATTRS = /\s+on[a-z]+\s*=\s*("[^"]*"|'[^']*'|[^\s>]+)/gi
const JS_URLS = /\s+(href|src)\s*=\s*("\s*javascript:[^"]*"|'\s*javascript:[^']*'|javascript:[^\s>]+)/gi

/**
 * Прибирає з HTML небезпечні теги, інлайн-обробники та javascript:-посилання.
 * Описи товарів зберігаються як HTML (перенесені зі старого сайту), тому
 * виводимо їх через v-html — але тільки після цієї чистки.
 */
export function sanitizeHtml(html?: string | null): string {
  if (!html) return ''
  return String(html)
    .replace(BLOCKED_BLOCKS, '')
    .replace(BLOCKED_TAGS, '')
    .replace(EVENT_ATTRS, '')
    .replace(JS_URLS, '')
}

/** Перетворює HTML на звичайний текст — для meta-описів і schema.org. */
export function htmlToText(html?: string | null, limit = 300): string {
  if (!html) return ''
  const text = String(html)
    .replace(BLOCKED_BLOCKS, '')
    .replace(/<[^>]+>/g, ' ')
    .replace(/&nbsp;/gi, ' ')
    .replace(/&amp;/gi, '&')
    .replace(/&quot;/gi, '"')
    .replace(/&#0?39;|&apos;/gi, "'")
    .replace(/&lt;/gi, '<')
    .replace(/&gt;/gi, '>')
    .replace(/\s+/g, ' ')
    .trim()
  return text.length > limit ? text.slice(0, limit - 1).trimEnd() + '…' : text
}
