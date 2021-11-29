<div class="newsletter">
    <div class="container">
        <h3><a href="#" title="sign up">sign up</a> to newsletter</h3>
        <p>and receive a coupon for first shipping</p>
        <form action="{{ route('subscribes.store') }}" method="POST" accept-charset="utf-8">
            @csrf
            <input type="email" onblur="if (this.value == '') {this.value = 'Enter your email';}" onfocus="if(this.value != '') {this.value = '';}" value="Enter your emaill" class="input-text required-entry validate-email" title="Sign up for our newsletter" id="newsletter" name="email">
            <button class="button button1" title="Subscribe" type="submit"></button>
        </form>
    </div>
    <!-- End container -->
</div>
<!-- End newsletter -->
