<div class="social-links">
  <p>Ви можете написати нам самі:</p>
  <div class="social-icons">
    @if(!empty($settings['instagram_url']))
    <a href="{{ $settings['instagram_url'] }}" target="_blank" rel="noopener" aria-label="Instagram">
      <x-icons.instagram />
    </a>
    @endif
    @if(!empty($settings['telegram_url']))
    <a href="{{ $settings['telegram_url'] }}" target="_blank" rel="noopener" aria-label="Telegram">
      <x-icons.telegram />
    </a>
    @endif
    @if(!empty($settings['viber_url']))
    <a href="{{ $settings['viber_url'] }}" target="_blank" rel="noopener" aria-label="Viber">
      <x-icons.viber />
    </a>
    @endif
  </div>
</div>
