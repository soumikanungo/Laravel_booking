@extends('layouts.header')

@section('content')
<div class="card card-default">
    <div class="card-header">
         Razorpay 
    </div>
    <div class="card-body text-center">
        <form action="{{ route('razorpay.payment.store') }}" method="POST" >
            @csrf 
            <script src="https://api.razorpay.com/v1"
                    data-key="{{ env('RAZORPAY_KEY') }}"
                    data-amount="10000"
                    data-buttontext="Pay 100 INR"
                    data-name="GeekyAnts official"
                    data-description="Razorpay payment"
                    data-image="/images/logo-icon.png"
                    data-prefill.name="ABC"
                    data-prefill.email="tdas11070@gmail.com"
                    data-theme.color="#ff7529">
            </script>
        </form>
    </div>
</div>
@endsection