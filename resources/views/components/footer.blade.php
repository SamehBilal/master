@php $locale = session()->get('locale');
$info = \App\Models\About::find(1); @endphp
<div class="bg-white border-top-2 mt-auto">
    <div class="container page__container page-section d-flex flex-column">
        <p class="text-70 brand mb-24pt">
            {{--<img class="brand-icon"
                 src="{{ asset('backend/images/logo/black-70@2x.png') }}"
                 width="30"
                 alt="{{ config('app.name', 'Laravel') }}">--}} {{ config('app.name', 'Droplin') }}
        </p>
        <p class="measure-lead-max text-50 small mr-8pt">{{ __('content.mission') }}</p>
        <p class="mb-8pt d-flex">
            <a href="{{ route('website.terms') }}"
               class="text-70 text-underline mr-8pt small">{{ __('content.Terms and Conditions') }}</a>
            <a href="{{ route('website.privacy') }}"
               class="text-70 text-underline small">{{ __('content.Privacy') }}</a>
        </p>
        <p class="text-50 small mt-n1 mb-0">Copyright {{ date("Y") }} &copy; All rights reserved.</p>
    </div>
</div>
