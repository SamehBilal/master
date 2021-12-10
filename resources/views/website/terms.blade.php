@extends('layouts.website')

@section('contact-us')
    active
@endsection

@section('content')
    <header id="header" class="header-v3">
        @include('website.components.main-navigation')

        @include('website.components.search-top')

        @include('website.components.menu-mobile')

        @include('website.components.menu')
    </header><!-- /header -->

    <div class="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="{{ route('website.index') }}">Home</a></li>
                <li class="active">Terms & Conditions</li>
            </ul>
        </div>
        <!-- End container -->
    </div>
    <div class="col-12 container">
        <div class="text-about">
            <div class="title-text title-about">
                <h3><span>s</span>hipping Terms and Conditions</h3>
            </div>
            <!-- End title -->
            <div class="col-12 content">
                <p>Droplin is a delivery platform empowered by technology. Retailers large and small can depend on Bosta to deliver products by using an easy-to-use, easy-to-manage, customizable delivery service.</p>
                <p>These Terms and conditions are made and entered into by and between the company <strong>“Business”</strong> and Bosta Technology for using Bosta delivery Service;</p>
            </div>
            <div class="title-text title-about">
                <h2>Permitted Items:</h2>
            </div>
            <div class="col-12 content">
                <ol>
                    <li>Courier can only deliver items that are no more than 23 kilograms.</li>
                    <li>Courier has the right to refuse any delivery if it is oversized or restricted. A cancellation fee will apply if the Courier refuses to accept a delivery.</li>
                    <li>Courier will only do deliveries for your business, they will not do any purchasing for a delivery. A cancellation fee will apply if you asked the Courier to purchase anything.</li>
                </ol>
            </div>
            <div class="title-text title-about">
                <h2>Restricted Items from Shipping:</h2>
            </div>
            <div class="col-12 content">
                <ol>
                    <li>People or animals</li>
                    <li>Any Food or Beverage products.</li>
                    <li>Illegal, stolen items, or anything you do not have permission to send</li>
                    <li>Sensitive, fragile, or any items that can be easily broken</li>
                    <li>Any alcoholic or tobacco items</li>
                    <li>Illegal electronic devices or telecommunications equipment</li>
                    <li>Currency exchanges</li>
                    <li>Dangerous items (weapons, explosives, flammable, batteries etc.)</li>
                    <li>Items with value more than 10,000 LE</li>
                </ol>
            </div>
            <div class="title-text title-about">
                <h2>The service is provided to the business under the terms and conditions below:</h2>
            </div>
            <div class="col-12 content">
                <ol>
                    <li>The Business hereby authorizes Bosta to ship, collect or receive any and all packages addressed to Consignees until the Business notifies Bosta of its intent to terminate the Service.</li>
                    <li>The Business will be charged on which is greater either the package weight in Kilograms or the dimensional weight. Calculate Dimensional weight of a package by: (Length x Width x Height)/ 3000</li>
                    <li>The Business undertakes not to use the Service for any illegal, immoral, obscene or fraudulent purpose or for any purposes prohibited by Bosta, or by the country or any other regulations. Business further undertakes that any use of the Service shall be in conformity with all local laws. Such laws include but are not limited to laws related to banking, money laundering, trade sanctions and terrorist activities. & Business is totally responsible for his shipments content.</li>
                </ol>
            </div>

            <h5>Delivered packages due to the fact that the address on the shipment is not clear, consignee</h5>
            <h5>The Business agrees that Bosta may cease to provide Service to the Customer for good cause shall include, but is not limited to:</h5>
            <div class="col-12 content">
                <ol>
                    <li>Business’s use of the Service for an illegal, obscene, or fraudulent purpose or for any purpose prohibited by Bosta, the Country or any other regulation or law;</li>
                    <li>Business’s failure to pay monies owed to Bosta when due; and</li>
                    <li>Business’s violation of any provision of these Terms and Conditions.</li>
                    <li>Business’s acknowledges that, for the purpose of determining the good cause as provided herein, the actions of any person authorized by Customer to use the Service will be attributed to Customer.</li>
                </ol>
            </div>

            <h5>The Business’s warrants not to ship bearer/ blank cheques with Bosta,</h5>
            <div class="col-12 content">
                <ol>
                    <li>The Business is responsible to ensure that the content of shipment is packed correctly, Bosta will not be responsible for damage due to poor packing. Customer is responsible for obtaining its own insurance, upon customer’s request Bosta can arrange for insurance for the declared shipment value.</li>
                </ol>
            </div>
            <h5>These Terms and conditions shall be construed and interpreted in accordance with the laws of Egypt.</h5>
            <h5>Bosta is not responsible for the package once the customer receives it and sign that he received the package.</h5>

            <div class="title-text title-about">
                <h2>Shipping Cancellation Policies:</h2>
            </div>
            <div class="col-12 content">
                <h5>Depending on the stage when you cancel the delivery, the current policies will apply:</h5>
                <ol>
                    <li>If you canceled the delivery before the “Picking up” state, no cancellation fee will apply.</li>
                    <li>If you canceled the delivery right when the courier arrives to your place, or if there is no one present at your place, a cancellation fee with the price of the next day delivery price will apply.</li>
                    <li>If you canceled the delivery while the courier is delivering it, a cancellation fee with the price of the next day delivery price will apply.</li>
                    <li>If your customer refused to accept the item you sent him, the Courier will deliver the item back to your place, and you will be responsible for a full fare.</li>
                    <li>If there is no one present at the drop-off address, the Courier will call your customer, and will wait for him 10 minutes before returning the item to you, a full fare will apply in this case.</li>
                    <li>If there is no person at the drop-off address, the Courier will call to inform you. If no one is present at your place when the Courier arrives, you will be fully responsible for your delivery item, and a full fare will apply.</li>
                </ol>
            </div>
        </div>
    </div>


@endsection
