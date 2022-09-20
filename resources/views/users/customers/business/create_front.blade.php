@php $locale = session()->get('locale'); @endphp
<x-guest-layout>
    <x-auth-card >
        <x-slot name="logo">
            <br><br>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('dashboard.businesses.index') }}" enctype="multipart/form-data">
        @csrf

            <!-- Business Name -->
            <div>
                <x-label for="ar_name" style="{{ $locale == 'ar' ? 'text-align: right;':'' }}" :value="__('dashboard.Business Name ')" />

                <x-input id="ar_name" class="block mt-1 w-full" type="text" name="ar_name" :value="old('ar_name')" required autofocus />
            </div>

            <!-- Business Name -->
            <div class="mt-4">
                <x-label for="en_name" style="{{ $locale == 'ar' ? 'text-align: right;':'' }}" :value="__('dashboard.Business Name ')" />

                <x-input id="en_name" class="block mt-1 w-full" type="text" name="en_name" :value="old('en_name')" required autofocus />
            </div>

             <!-- Store URL -->
             <div class="mt-4">
                <x-label for="store_url" style="{{ $locale == 'ar' ? 'text-align: right;':'' }}" :value="__('dashboard.Store URL ')" />

                <x-input id="store_url" class="block mt-1 w-full" type="text" name="store_url" :value="old('store_url')" required />
            </div>

            <!-- Store URL -->
            <div class="mt-4" style="{{ $locale == 'ar' ? 'text-align: right;':'' }}">
                <x-label for="select05" style="{{ $locale == 'ar' ? 'text-align: right;':'' }}" :value=" __('dashboard.industry') " />

                    <select id="select05"
                            data-toggle="select"
                            data-minimum-results-for-search="-1"
                            class="rounded-md shadow-sm border-gray-300  form-control form-control-sm @error('industry') is-invalid @enderror"
                            name="industry">
                        @foreach($categories as $category)
                            <option value="{{ $category }}" >
                                {{ $category }}
                            </option>
                        @endforeach
                    </select>


            </div>

             <!-- Business Name -->
             <div class="mt-4" style="{{ $locale == 'ar' ? 'text-align: right;':'' }}">
                <x-label for="select01" style="{{ $locale == 'ar' ? 'text-align: right;':'' }}" :value=" __('dashboard.Sales Channel') " />

                    <select id="select01"
                            data-toggle="select"
                            data-minimum-results-for-search="-1"
                            class="rounded-md shadow-sm border-gray-300  form-control form-control-sm @error('sales_channel') is-invalid @enderror"
                            name="sales_channel">
                        <option value="Facebook" >
                            Facebook
                        </option>
                        <option value="Instagram" >
                            Instagram
                        </option>
                        <option value="Website" >
                            Website
                        </option>
                        <option value="Marketplace" >
                            Marketplace
                        </option>
                    </select>

            </div>

            <!-- Business Name -->
            <div class="mt-4">
                <x-label for="street" style="{{ $locale == 'ar' ? 'text-align: right;':'' }}" :value="__('dashboard.Street')" />

                <x-input id="street" class="block mt-1 w-full" type="text" name="street" :value="old('street')" autofocus />
            </div>

             <!-- Business Name -->
             <div class="mt-4">
                <x-label for="building" style="{{ $locale == 'ar' ? 'text-align: right;':'' }}" :value="__('dashboard.Building')" />

                <x-input id="building" class="block mt-1 w-full" type="text" name="building" :value="old('building')" autofocus />
            </div>

            <!-- Business Name -->
            <div class="mt-4">
                <x-label for="floor" style="{{ $locale == 'ar' ? 'text-align: right;':'' }}" :value="__('dashboard.Floor')" />

                <x-input id="floor" class="block mt-1 w-full" type="text" name="floor" :value="old('floor')" autofocus />
            </div>

            <!-- Business Name -->
            <div class="mt-4">
                <x-label for="apartment" style="{{ $locale == 'ar' ? 'text-align: right;':'' }}" :value="__('dashboard.Apartment')" />

                <x-input id="apartment" class="block mt-1 w-full" type="text" name="apartment" :value="old('apartment')" autofocus />
            </div>

            <!-- Business Name -->
            <div class="mt-4">
                <x-label for="landmarks" style="{{ $locale == 'ar' ? 'text-align: right;':'' }}" :value="__('dashboard.Landmarks')" />

                <x-input id="landmarks" class="block mt-1 w-full" type="text" name="landmarks" :value="old('landmarks')" autofocus />
            </div>

            <!-- Store URL -->
            <div class="mt-4" style="{{ $locale == 'ar' ? 'text-align: right;':'' }}">
                <x-label for="select03" style="{{ $locale == 'ar' ? 'text-align: right;':'' }}" :value=" __('dashboard.State') " />

                <select id="select03"
                        data-toggle="select"
                        data-minimum-results-for-search="-1"
                        class="rounded-md shadow-sm border-gray-300  form-control form-control-sm @error('state_id') is-invalid @enderror"
                        name="state_id">
                    @foreach($states as $state)
                        <option value="{{ $state->id }}">
                            {{ $state->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Store URL -->
            <div class="mt-4" style="{{ $locale == 'ar' ? 'text-align: right;':'' }}">
                <x-label for="select02" style="{{ $locale == 'ar' ? 'text-align: right;':'' }}" :value=" __('dashboard.City') " />

                <select id="select02"
                        data-toggle="select"
                        data-minimum-results-for-search="-1"
                        class="rounded-md shadow-sm border-gray-300  form-control form-control-sm @error('city_id') is-invalid @enderror"
                        name="city_id">
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}" >
                            {{ $city->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" name="country_id" value="64">

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4">
                    {{ __('content.Submit') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
