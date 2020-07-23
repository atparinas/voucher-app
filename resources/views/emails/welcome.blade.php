@component('mail::message')
# Welcome to Budget Pet Products

Thank you for registering. We have provided you a voucher that you
can use during purchase.

# {{ $voucher }}


@component('mail::button', ['url' => 'http://homestead.test/users'])
View My Vouchers
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
