@section('javaScript-body')
    <script src="https://cdn.paddle.com/paddle/paddle.js"></script>
    <script type="text/javascript">
        Paddle.Setup({vendor: {{ config('services.paddle.vendor_id') }} });

        window.addEventListener('load',function() {

            document.querySelectorAll('[data-product-id]').forEach(element => {
                element.addEventListener('click', event => {

                    Paddle.Checkout.open({
                        product: event.target.getAttribute('data-product-id'),
                        email: "{{ auth()->user()->email }}",
                        allowQuantity: false,
                        disableLogout: true,
                        title: event.target.getAttribute('data-product-label'),
                        successCallback: function(data) {
                            console.log(data)

                            console.log('sold')
                        }
                    });
                })
            })
        });
    </script>
@endsection
