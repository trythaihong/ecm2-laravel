<!DOCTYPE html>
<html>
<head>
    <title>Laravel Restaurant Payment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        .StripeElement {
            box-sizing: border-box;
            height: 40px;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: white;
        }
        .StripeElement--focus {
            border-color: #66afe9;
            outline: 0;
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6);
        }
        .StripeElement--invalid {
            border-color: #fa755a;
        }
        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>
</head>
<body>
<div class="container">
    <h4 style="text-align: center;margin-top:60px">You need to pay ${{$total}}</h4>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table">
                    <h3 class="panel-title">Payment Details</h3>
                </div>
                <div class="panel-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif

                    <form role="form" action="{{ route('stripe.post', $total) }}" method="post" id="payment-form">
                        @csrf
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label>
                                <input class='form-control' name="name" size='4' type='text' id="card-holder-name">
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Details</label>
                                <div id="card-element"></div>
                                <div id="card-errors" role="alert" style="color: #fa755a;"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit" id="card-button">
                                    Pay Now (${{$total}})
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
    var elements = stripe.elements();
    var cardElement = elements.create('card');
    cardElement.mount('#card-element');

    var form = document.getElementById('payment-form');
    var cardErrors = document.getElementById('card-errors');

    cardElement.addEventListener('change', function(event) {
        if (event.error) {
            cardErrors.textContent = event.error.message;
        } else {
            cardErrors.textContent = '';
        }
    });

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        
        stripe.createToken(cardElement).then(function(result) {
            if (result.error) {
                cardErrors.textContent = result.error.message;
            } else {
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', result.token.id);
                form.appendChild(hiddenInput);
                
                form.submit();
            }
        });
    });
</script>
<script>
    form.addEventListener('submit', async function(event) {
    event.preventDefault();
    const button = document.getElementById('submit-button');
    button.disabled = true;
    document.getElementById('button-text').classList.add('d-none');
    document.getElementById('button-spinner').classList.remove('d-none');

    const {token, error} = await stripe.createToken(card);
    if (error) {
        const errorElement = document.getElementById('card-errors');
        errorElement.textContent = error.message;
        errorElement.classList.remove('d-none');
        button.disabled = false;
        document.getElementById('button-text').classList.remove('d-none');
        document.getElementById('button-spinner').classList.add('d-none');
    } else {
        const hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        form.submit(); // safe one-time submission
    }
});

</script>
</body>
</html>
