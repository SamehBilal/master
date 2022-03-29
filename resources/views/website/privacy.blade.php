@extends('layouts.website')

@section('contact-us')
    active
@endsection

@section('extra-scripts')
    <style>
        .title-text h3 {
            padding-left: 70px;
        }

        .title-text h3:after {
            position: absolute;
            content: "";
            left: 0px;
            top: 50%;
        }
    </style>
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
                <li><a href="{{ route('website.index') }}">{{ __('content.Home') }}</a></li>
                <li class="active">{{ __('content.Terms and Conditions') }}</li>
            </ul>
        </div>
        <!-- End container -->
    </div>
    <div class="col-12 container" dir="ltr">
        <div class="text-about">
            <div class="title-text title-about">
                <h3><span>P</span>rivacy Policy:</h3>
            </div>
            <!-- End title -->
            <div class="title-text title-about">
                <h4 style="font-weight: bold">We at Droplin LLC. know you care about how your personal information is used and shared, and we take your privacy seriously. Please read the following to learn more about our Privacy Policy. By using or accessing the Site in any manner, you acknowledge that you accept the practices and policies outlined in this Privacy Policy, and you hereby consent that we will collect, use, and share your information in the following ways:</h4>
            </div>
            <div class="col-12 content">
                <ol>
                    <li>Droplin LLC (“us”, “we”, or “our”) operates https://www.droplin.co (the “Site”). This page informs you of our policies regarding the collection, use and disclosure of Personal Information we receive from users of the Site.</li>
                    <li>We use your Personal Information only for providing and improving the Site. By using the Site, you agree to the collection and use of information in accordance with this policy.</li>
                </ol>
            </div>
            <div class="title-text title-about">
                <h2>Information Collection And Use:</h2>
            </div>
            <div class="col-12 content">
                <ol>
                    <li>While using our Site, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you. Personally identifiable information may include, but is not limited to your name, email, phone number and address (“Personal Information”).</li>
                </ol>
            </div>
            <div class="title-text title-about">
                <h2>Log Data:</h2>
            </div>
            <div class="col-12 content">
                <ol>
                    <li>Like many site operators, we collect information that your browser sends whenever you visit our Site (“Log Data”).</li>
                    <li>This Log Data may include information such as your computer’s Internet Protocol (“IP”) address, browser type, browser version, the pages of our Site that you visit, the time and date of your visit, the time spent on those pages and other statistics.</li>
                    <li>In addition, we may use third party services such as Segment, Google Analytics, Hotjar & Mixpanel that collect, monitor and analyze the usage data.</li>
                </ol>
            </div>
            <div class="title-text title-about">
                <h2>Cookies:</h2>
            </div>
            <div class="col-12 content">
                <ol>
                    <li>Cookies are files with small amount of data, which may include an anonymous unique identifier. Cookies are sent to your browser from a web site and stored on your computer’s hard drive.</li>
                    <li>Like many sites, we use “cookies” to collect information. You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of our Site.</li>
                </ol>
            </div>
            <div class="title-text title-about">
                <h2>Security:</h2>
            </div>
            <div class="col-12 content">
                <ol>
                    <li>The security of your Personal Information is important to us, but remember that no method of transmission over the Internet, or method of electronic storage, is 100% secure. While we strive to use commercially acceptable means to protect your Personal Information, we cannot guarantee its absolute security.</li>
                </ol>
            </div>
            <div class="title-text title-about">
                <h2>Changes To This Privacy Policy:</h2>
            </div>
            <div class="col-12 content">
                <ol>
                    <li>This Privacy Policy is effective as of 1st June 2022 and will remain in effect except with respect to any changes in its provisions in the future, which will be in effect immediately after being posted on this page.</li>
                    <li>We reserve the right to update or change our Privacy Policy at any time and you should check this Privacy Policy periodically. Your continued use of the Service after we post any modifications to the Privacy Policy on this page will constitute your acknowledgment of the modifications and your consent to abide and be bound by the modified Privacy Policy.</li>
                    <li>If we make any material changes to this Privacy Policy, we will notify you either through the email address you have provided us, or by placing a prominent notice on our website.</li>
                </ol>
            </div>
            <div class="title-text title-about">
                <h2>What if I have questions about this policy? </h2>
            </div>
            <div class="col-12 content">
                <ol>
                    <li>If you have any questions or concerns regarding our privacy policies, please send us a detailed message to help@droplin.com, and we will try to resolve your concerns.</li>
                </ol>
            </div>
        </div>
    </div>

@endsection
