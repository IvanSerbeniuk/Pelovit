Нова заявка з сайту Pelovit

Ім'я: {{ $lead->name }}
Телефон: {{ $lead->phone }}
Спосіб зв'язку: {{ $lead->contact_method }}
@if($lead->company)
Компанія: {{ $lead->company }}
@endif
@if($lead->details)
Деталі заявки:
{{ $lead->details }}
@endif
Джерело: {{ $lead->source }}
Дата: {{ $lead->created_at?->format('d.m.Y H:i') }}
