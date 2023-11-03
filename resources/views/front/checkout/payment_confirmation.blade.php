<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
.order-success {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    min-height: 100vh;
}
.check-img {
    max-width: 170px;
    margin: auto;
}
.check-img img {
    height: 100%;
    width: 100%;
    object-fit: cover;
}
</style>
</head>
<body>
    <section class="order-success">
        <div class="order-success-block">
            <div class="check-img">
              <img src="{{ asset('front/img/checked.png') }}" alt="">
            </div>
            <h2>Order Completed Successfully!</h2>
            <p>Your order was Successfully process using Google pay (visa **** 1234). <br> check your email for your receipt. </p>
            <p><a href="{{ url('') }}">Go Back to Home</a></p>
          </div>
    </section>

</body>
</html>