<x-app-layout>
    <div class="container">
        <!-- <div style="display: flex; margin-top: 20px;">
            <a href="create/plan" class="btn btn-primary btn-sm">CREATE PLAN</a>
            <a style="margin-left: 10px;" href="/plans" class="btn btn-primary btn-sm">PLANS</a>
        </div> -->
        <div class="page-titles justify-content-between">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Plan</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Payment Method</a></li>
            </ol>
        </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="">
                @if(\Session::has('success'))
                    <div class="alert alert-primary alert-dismissible fade show">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
                        <strong>Welcome!</strong> {{ \Session::get('success') }}
                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                        </button>
                    </div>
                @endif
                @foreach($plan as $PlanData)
                     <p>You will be charged ${{ number_format($PlanData->cost, 2) }} for {{ $PlanData->name }} Plan</p>
                @endforeach
            </div>
            <div class="card">
                <form action="{{ url('user/subscription/plan/create') }}" method="post" id="payment-form">
                    @csrf                    
                    <div class="form-group">
                        <div class="card-header">
                            <label for="card-element">
                                Enter your credit card information
                            </label>
                        </div>
                        <div class="card-body">
                            <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                            </div>
                            <div id="card-errors" role="alert"></div>
                            <input type="hidden" name="plan" value="{{ $PlanData->id }}" />
                            <!-- <input type="hidden" id="card-holder-name" value="2"> -->
                        </div>
                    </div>
                    <div class="card-footer">
                    <button class="btn btn-primary" id="card-button" data-secret="{{ $intent->client_secret }}">
                        Payment Method
                    </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://js.stripe.com/v3/"></script>
<script>
    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            lineHeight: '18px',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
            color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };
   
    const stripe = Stripe('{{ env("STRIPE_KEY") }}', { locale: 'en' }); // Create a Stripe client.
    const elements = stripe.elements(); // Create an instance of Elements.
    const cardElement = elements.create('card', { style: style }); // Create an instance of the card Element.
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;

    cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.

    // Handle real-time validation errors from the card Element.
    cardElement.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission.
    var form = document.getElementById('payment-form');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe
            .handleCardSetup(clientSecret, cardElement, {
                payment_method_data: {
                    //billing_details: { name: cardHolderName.value }
                }
            })
            .then(function(result) {
                console.log(result);
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    console.log(result);
                    // Send the token to your server.
                    stripeTokenHandler(result.setupIntent.payment_method);
                }
            });
    });

    // Submit the form with the token ID.
    function stripeTokenHandler(paymentMethod) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'paymentMethod');
        hiddenInput.setAttribute('value', paymentMethod);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }
</script>
</x-app-layout>