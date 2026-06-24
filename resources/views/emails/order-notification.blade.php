<x-mail::message>
# Нове замовлення #{{ $order->id }}

**{{ $order->first_name }} {{ $order->last_name }}** оформив(ла) замовлення на суму **{{ number_format($order->total, 0, '.', ' ') }} ₴**.

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

## Контактні дані

- **Ім'я:** {{ $order->first_name }} {{ $order->last_name }}
- **Телефон:** {{ $order->phone }}
@if($order->email)
- **Email:** {{ $order->email }}
@endif
@if($order->city)
- **Місто:** {{ $order->city }}
@endif
@if($order->branch)
- **Відділення НП:** {{ $order->branch }}
@endif
- **Оплата:** {{ $order->payment_method === 'card' ? 'Карткою' : 'Накладний платіж' }}
@if($order->comment)
- **Коментар:** {{ $order->comment }}
@endif

<x-mail::button :url="config('app.url') . '/admin'">
Відкрити в адмінці
</x-mail::button>

</x-mail::message>
