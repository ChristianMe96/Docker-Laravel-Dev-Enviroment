@component('mail::message')
    # Order Shipped

    Your order has been shipped!

    <h1>TEST</h1>


    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
