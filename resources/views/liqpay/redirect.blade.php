<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Перехід до оплати — PELOVIT</title>
    <style>
        body { font-family: system-ui, -apple-system, sans-serif; display: flex; align-items: center;
               justify-content: center; min-height: 100vh; margin: 0; color: #333; }
        .box { text-align: center; padding: 24px; }
        .spinner { width: 36px; height: 36px; margin: 0 auto 16px; border: 3px solid #eee;
                   border-top-color: #888; border-radius: 50%; animation: spin 0.8s linear infinite; }
        @keyframes spin { to { transform: rotate(360deg); } }
        button { margin-top: 16px; padding: 10px 20px; font-size: 15px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="box">
        <div class="spinner"></div>
        <p>Переходимо до захищеної сторінки оплати…</p>

        {{-- LiqPay приймає лише POST, тому форма сабмітиться автоматично. --}}
        <form id="liqpay" method="POST" action="{{ $liqpay['action_url'] }}" accept-charset="utf-8">
            <input type="hidden" name="data" value="{{ $liqpay['data'] }}">
            <input type="hidden" name="signature" value="{{ $liqpay['signature'] }}">
            <noscript><button type="submit">Продовжити оплату</button></noscript>
        </form>
    </div>

    <script>
        document.getElementById('liqpay').submit();
    </script>
</body>
</html>
