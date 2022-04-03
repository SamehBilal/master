<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
        @csrf

            <!-- Business Name -->
            <div>
                <x-label for="ar_name" :value="__('dashboard.Business Name ')" />

                <x-input id="ar_name" class="block mt-1 w-full" type="text" name="ar_name" :value="old('ar_name')" required autofocus />
            </div>

            <!-- Business Name -->
            <div class="mt-4">
                <x-label for="en_name" :value="__('dashboard.Business Name ')" />

                <x-input id="en_name" class="block mt-1 w-full" type="text" name="en_name" :value="old('en_name')" required autofocus />
            </div>

            <!-- Business Name -->
            <div class="mt-4">
                <x-label for="select01" :value=" __('dashboard.Sales Channel') " />

                    <select id="select01"
                            data-toggle="select"
                            data-minimum-results-for-search="-1"
                            class="rounded-md shadow-sm border-gray-300  form-control form-control-sm @error('sales_channel') is-invalid @enderror"
                            name="sales_channel">
                        <option value="Facebook" data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
                            Facebook
                        </option>
                        <option value="Instagram" data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
                            Instagram
                        </option>
                        <option value="Website" data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
                            Website
                        </option>
                        <option value="Marketplace" data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
                            Marketplace
                        </option>
                    </select>

            </div>


            <!-- Store URL -->
            <div class="mt-4">
                <x-label for="select05" :value=" __('dashboard.industry') " />

                    <select id="select05"
                            data-toggle="select"
                            data-minimum-results-for-search="-1"
                            class="rounded-md shadow-sm border-gray-300  form-control form-control-sm @error('industry') is-invalid @enderror"
                            name="industry">
                        @foreach($categories as $category)
                            <option value="{{ $category }}" data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
                                {{ $category }}
                            </option>
                        @endforeach
                    </select>


            </div>

            <!-- Store URL -->
            <div class="mt-4">
                <x-label for="store_url" :value="__('dashboard.Store URL ')" />

                <x-input id="store_url" class="block mt-1 w-full" type="text" name="store_url" :value="old('store_url')" required />
            </div>


            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4">
                    {{ __('content.Submit') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
