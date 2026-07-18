<x-mail::message>
# Дякуємо за замовлення!

Вітаємо, **{{ $order->first_name }} {{ $order->last_name }}**!

Ваше замовлення **#{{ $order->id }}** успішно прийнято. Наш консультант зв'яжеться з вами найближчим часом для підтвердження.

---

## Склад замовлення

<x-mail::table>
| Товар | Кількість | Ціна |
|:------|:---------:|-----:|
@foreach($order->items as $item)
| {{ $item['name'] }} | {{ $item['qty'] }} шт. | {{ number_format($item['price'] * $item['qty'], 0, '.', ' ') }} ₴ |
@endforeach
</x-mail::table>

**Разом: {{ number_format($order->total, 0, '.', ' ') }} ₴**

---

## Дані доставки

- **Телефон:** {{ $order->phone }}
@if($order->city)
- **Місто:** {{ $order->city }}
@endif
@if($order->branch)
- **Відділення НП:** {{ $order->branch }}
@endif
- **Оплата:** {{ $order->payment_method === 'card' ? 'Оплата карткою' : 'Накладний платіж' }}
@if($order->comment)
- **Коментар:** {{ $order->comment }}
@endif

@if($order->payment_method === 'card' && $paymentCardNumber)
---

## Реквізити для оплати

- **Номер картки:** {{ $paymentCardNumber }}
@if($paymentCardHolder)
- **Одержувач:** {{ $paymentCardHolder }}
@endif
@endif

---

З повагою,<br>
Команда **PELOVIT-R**

<x-mail::button :url="config('app.url')">
Перейти на сайт
</x-mail::button>

</x-mail::message>
