<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\Setting;
use MoonShine\Laravel\Pages\Page;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Components\FlexibleRender;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Components\Layout\Grid;
use MoonShine\UI\Components\Layout\Column;

class SettingsPage extends Page
{
    public function getBreadcrumbs(): array
    {
        return ['#' => $this->getTitle()];
    }

    public function getTitle(): string
    {
        return 'Налаштування';
    }

    protected function components(): iterable
    {
        $s = Setting::allKeyed();
        $action = route('admin.settings.save');
        $csrf = csrf_token();
        $success = session('success') ? "<div class='ms-alert ms-alert-success' style='margin-bottom:16px;padding:10px 16px;background:#d1fae5;border-radius:8px;color:#065f46;font-size:13px'>" . session('success') . "</div>" : '';

        $field = fn(string $label, string $key, string $type = 'text', string $hint = '') =>
            "<div style='margin-bottom:16px'>
                <label style='display:block;font-size:12px;font-weight:600;color:var(--color-base-text);opacity:.7;margin-bottom:6px'>{$label}</label>
                <input type='{$type}' name='{$key}' value='" . htmlspecialchars($s[$key] ?? '') . "'
                    style='width:100%;padding:8px 12px;border:1px solid var(--color-base-stroke);border-radius:8px;background:var(--color-body);color:var(--color-base-text);font-size:13px;outline:none'
                    class='ms-settings-input'>
                " . ($hint ? "<span style='font-size:11px;color:var(--color-base-text);opacity:.45;margin-top:4px;display:block'>{$hint}</span>" : '') . "
            </div>";

        $contactsHtml = $field('Телефон 1', 'phone') .
            $field('Телефон 2', 'phone_2') .
            $field('Телефон 3', 'phone_3') .
            $field('Email', 'email', 'email');

        $socialHtml = $field('Instagram', 'instagram_url', 'url') .
            $field('Facebook', 'facebook_url', 'url') .
            $field('Telegram', 'telegram_url', 'url') .
            $field('Viber', 'viber_url', 'url') .
            $field('YouTube', 'youtube_url', 'url');

        $shopHtml = $field('Мінімальна сума для безкоштовної доставки (₴)', 'min_free_shipping', 'number', 'Залиште порожнім щоб вимкнути') .
            $field('Текст банера / оголошення', 'banner_text', 'text', 'Відображається у шапці сайту. Порожньо — банер прихований.');

        $formHtml = "
        {$success}
        <form method='POST' action='{$action}'>
            <input type='hidden' name='_token' value='{$csrf}'>
            <div style='display:grid;grid-template-columns:1fr 1fr;gap:24px'>
                <div>
                    <div style='font-size:12px;font-weight:700;letter-spacing:.05em;text-transform:uppercase;color:var(--color-base-text);opacity:.45;margin-bottom:16px'>Контакти</div>
                    {$contactsHtml}
                </div>
                <div>
                    <div style='font-size:12px;font-weight:700;letter-spacing:.05em;text-transform:uppercase;color:var(--color-base-text);opacity:.45;margin-bottom:16px'>Соціальні мережі</div>
                    {$socialHtml}
                </div>
            </div>
            <div style='margin-top:8px'>
                <div style='font-size:12px;font-weight:700;letter-spacing:.05em;text-transform:uppercase;color:var(--color-base-text);opacity:.45;margin-bottom:16px'>Магазин</div>
                {$shopHtml}
            </div>
            <button type='submit' style='padding:10px 28px;background:#422928;color:#fff;border:none;border-radius:8px;font-size:13px;font-weight:600;cursor:pointer'>Зберегти</button>
        </form>";

        return [
            Box::make([FlexibleRender::make($formHtml)]),
        ];
    }
}
