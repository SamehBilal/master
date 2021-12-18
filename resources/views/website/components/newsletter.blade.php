<div class="newsletter">
    <div class="container">
        <h3><a href="{{ route('register') }}" title="{{ __('content.sign up') }}">{{ __('content.sign up') }}</a> {{ __('content.newsletter') }}</h3>
        <p>{{ __('content.first shipping') }}</p>
        <form action="{{ route('subscribers.store') }}" method="POST" accept-charset="utf-8">
            @csrf
            <input type="email" onblur="if (this.value == '') {this.value = '{{ __('content.Enter your email') }}';}" onfocus="if(this.value != '') {this.value = '';}" value="{{ __('content.Enter your email') }}" class="input-text required-entry validate-email" title="Sign up for our newsletter" id="newsletter" name="email">
            <button class="button button1" title="Subscribe" type="submit"></button>
            @error('email')
                <div class="invalid-feedback" role="alert">{{ $message }}</div>
            @enderror
        </form>
    </div>
    <!-- End container -->
</div>
<!-- End newsletter -->
