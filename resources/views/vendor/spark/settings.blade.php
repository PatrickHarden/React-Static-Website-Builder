@extends('spark::layouts.app', ['body_class' => 'settings'])

@section('scripts')
    @if (Spark::billsUsingStripe())
        <script src="https://js.stripe.com/v3/"></script>
    @else
        <script src="https://js.braintreegateway.com/v2/braintree.js"></script>
    @endif
@endsection

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <spark-settings :user="user" :teams="teams" inline-template>
        <div class="spark-screen container">
            <div class="row">
                <!-- Tabs -->
                <div class="col-md-3 spark-settings-tabs">
                    <aside>
                        <h3 class="nav-heading ">
                            {{__('Settings')}}
                        </h3>
                        <ul class="nav flex-column mb-4 ">
                            <li class="nav-item ">
                                <a class="nav-link" href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
                                    <svg class="icon-20 " viewBox="0 0 20 20 " xmlns="http://www.w3.org/2000/svg ">
                                        <path d="M10 20C4.4772 20 0 15.5228 0 10S4.4772 0 10 0s10 4.4772 10 10-4.4772 10-10 10zm0-17C8.343 3 7
              4.343 7 6v2c0 1.657 1.343 3 3 3s3-1.343 3-3V6c0-1.657-1.343-3-3-3zM3.3472 14.4444C4.7822 16.5884 7.2262 18 10
              18c2.7737 0 5.2177-1.4116 6.6528-3.5556C14.6268 13.517 12.3738 13 10 13s-4.627.517-6.6528 1.4444z "></path>
                                    </svg>
                                    {{__('Profile')}}
                                </a>
                            </li>

                            @if (Spark::usesTeams())
                                <li class="nav-item ">
                                    <a class="nav-link" href="#{{Spark::teamsPrefix()}}" aria-controls="teams" role="tab" data-toggle="tab">
                                        <svg class="icon-20 " xmlns="http://www.w3.org/2000/svg " viewBox="0 0 19 20 ">
                                            <path d="M6 8C4 8 2 6.2 2 4s2-4 4-4c2.3 0 4 1.8 4 4S8.4 8 6 8zm0 1c2.3 0 4.3.4 6.2 1l-1 6H9.8l-1 4H3l-.6-4H1l-1-6c2-.6
              4-1 6-1zm8.4.2c1.3 0 2.6.4 3.8 1l-1 5.8H16l-1 4h-4l.4-2h1.3l1.6-8.8zM12 0c2.3 0 4 1.8 4 4s-1.7 4-4 4c-.4 0-.8
              0-1.2-.2.8-1 1.3-2.4 1.3-3.8s0-2.7-1-3.8l1-.2z "/>
                                        </svg>
                                        {{__('teams.teams')}}
                                    </a>
                                </li>
                            @endif

                            <li class="nav-item ">
                                <a class="nav-link" href="#security" aria-controls="security" role="tab" data-toggle="tab">
                                    <svg class="icon-20 " xmlns="http://www.w3.org/2000/svg " viewBox="0 0 18 20 ">
                                        <path d="M3 8V6c0-3.3 2.7-6 6-6s6 2.7 6 6v2h1c1 0 2 1 2 2v8c0 1-1 2-2 2H2c-1 0-2-1-2-2v-8c0-1 1-2 2-2h1zm5
              6.7V17h2v-2.3c.6-.3 1-1 1-1.7 0-1-1-2-2-2s-2 1-2 2c0 .7.4 1.4 1 1.7zM6 6v2h6V6c0-1.7-1.3-3-3-3S6 4.3 6 6z "
                                        />
                                    </svg>
                                    {{__('Security')}}
                                </a>
                            </li>

                            @if (Spark::usesApi())
                                <li class="nav-item ">
                                    <a class="nav-link" href="#api" aria-controls="api" role="tab" data-toggle="tab">
                                        <svg class="icon-20 " xmlns="http://www.w3.org/2000/svg " viewBox="0 0 20 20 ">
                                            <path d="M20 14v4c0 1-1 2-2 2h-4v-2c0-1-1-2-2-2s-2 1-2 2v2H6c-1 0-2-1-2-2v-4H2c-1 0-2-1-2-2s1-2 2-2h2V6c0-1
              1-2 2-2h4V2c0-1 1-2 2-2s2 1 2 2v2h4c1 0 2 1 2 2v4h-2c-1 0-2 1-2 2s1 2 2 2h2z "/>
                                        </svg>
                                        {{__('API')}}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </aside>

                    <!-- Billing Tabs -->
                    @if (Spark::canBillCustomers())
                        <aside>
                            <h3 class="nav-heading ">
                                {{__('Billing')}}
                            </h3>
                            <ul class="nav flex-column mb-4 ">
                                @if (Spark::hasPaidPlans())
                                    <li class="nav-item ">
                                        <a class="nav-link" href="#subscription" aria-controls="subscription" role="tab" data-toggle="tab">
                                            <svg class="icon-20 " xmlns="http://www.w3.org/2000/svg " viewBox="0 0 14 20 ">
                                                <path d="M7 3v2c-2.8 0-5 2.2-5 5 0 1.4.6 2.6 1.5 3.5L2 15c-1.2-1.3-2-3-2-5 0-4 3-7 7-7zm5 2c1.2 1.3 2 3
              2 5 0 4-3 7-7 7v-2c2.8 0 5-2.2 5-5 0-1.4-.6-2.6-1.5-3.5L12 5zM7 20l-4-4 4-4v8zM7 8V0l4 4-4 4z " />
                                            </svg>
                                            {{__('Subscription')}}
                                        </a>
                                    </li>
                                @endif

                                <li class="nav-item ">
                                    <a class="nav-link" href="#payment-method" aria-controls="payment-method" role="tab" data-toggle="tab">
                                        <svg class="icon-20 " xmlns="http://www.w3.org/2000/svg " viewBox="0 0 20 16 ">
                                            <path d="M18 4V2H2v2h16zm0 4H2v6h16V8zM0 2c0-1 1-2 2-2h16c1 0 2 1 2 2v12c0 1-1 2-2 2H2c-1 0-2-1-2-2V2zm4
              8h4v2H4v-2z " />
                                        </svg>
                                        {{__('Payment Method')}}
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link" href="#invoices" aria-controls="invoices" role="tab" data-toggle="tab">
                                        <svg class="icon-20 " xmlns="http://www.w3.org/2000/svg " viewBox="0 0 20 20 ">
                                            <path d="M4 2h16l-3 9H4c-.6 0-1 .4-1 1s.5 1 1 1h13v2H4c-1.7 0-3-1.3-3-3s1.3-3 3-3h.3L3 5 2 2H0V0h3c.5 0
              1 .5 1 1v1zm1 18c-1 0-2-1-2-2s1-2 2-2 2 1 2 2-1 2-2 2zm10 0c-1 0-2-1-2-2s1-2 2-2 2 1 2 2-1 2-2 2z " />
                                        </svg>
                                        {{__('Invoices')}}
                                    </a>
                                </li>
                            </ul>
                        </aside>
                    @endif

                    <!-- Billing Tabs -->
                    <aside>
                        <h3 class="nav-heading ">
                            {{__('Website')}}
                        </h3>
                        <ul class="nav flex-column mb-4 ">
                        <li class="nav-item ">
                                <a class="nav-link" href="#firmWelcome" aria-controls="firmWelcome" role="tab" data-toggle="tab">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M336.174 80c-49.132 0-93.305-32-161.913-32-31.301 0-58.303 6.482-80.721 15.168a48.04 48.04 0 0 0 2.142-20.727C93.067 19.575 74.167 1.594 51.201.104 23.242-1.71 0 20.431 0 48c0 17.764 9.657 33.262 24 41.562V496c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-83.443C109.869 395.28 143.259 384 199.826 384c49.132 0 93.305 32 161.913 32 58.479 0 101.972-22.617 128.548-39.981C503.846 367.161 512 352.051 512 335.855V95.937c0-34.459-35.264-57.768-66.904-44.117C409.193 67.309 371.641 80 336.174 80zM464 336c-21.783 15.412-60.824 32-102.261 32-59.945 0-102.002-32-161.913-32-43.361 0-96.379 9.403-127.826 24V128c21.784-15.412 60.824-32 102.261-32 59.945 0 102.002 32 161.913 32 43.271 0 96.32-17.366 127.826-32v240z"/></svg>
                                    {{__('Welcome')}}
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#firmInfo" aria-controls="firmInfo" role="tab" data-toggle="tab">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M128 148v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12zm140 12h40c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12zm-128 96h40c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12zm128 0h40c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12zm-76 84v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm76 12h40c6.6 0 12-5.4 12-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12zm180 124v36H0v-36c0-6.6 5.4-12 12-12h19.5V24c0-13.3 10.7-24 24-24h337c13.3 0 24 10.7 24 24v440H436c6.6 0 12 5.4 12 12zM79.5 463H192v-67c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v67h112.5V49L80 48l-.5 415z"/></svg>
                                    {{__('Firm Info')}}
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#firmOverview" aria-controls="firmOverview" role="tab" data-toggle="tab">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M552 64H112c-20.858 0-38.643 13.377-45.248 32H24c-13.255 0-24 10.745-24 24v272c0 30.928 25.072 56 56 56h496c13.255 0 24-10.745 24-24V88c0-13.255-10.745-24-24-24zM48 392V144h16v248c0 4.411-3.589 8-8 8s-8-3.589-8-8zm480 8H111.422c.374-2.614.578-5.283.578-8V112h416v288zM172 280h136c6.627 0 12-5.373 12-12v-96c0-6.627-5.373-12-12-12H172c-6.627 0-12 5.373-12 12v96c0 6.627 5.373 12 12 12zm28-80h80v40h-80v-40zm-40 140v-24c0-6.627 5.373-12 12-12h136c6.627 0 12 5.373 12 12v24c0 6.627-5.373 12-12 12H172c-6.627 0-12-5.373-12-12zm192 0v-24c0-6.627 5.373-12 12-12h104c6.627 0 12 5.373 12 12v24c0 6.627-5.373 12-12 12H364c-6.627 0-12-5.373-12-12zm0-144v-24c0-6.627 5.373-12 12-12h104c6.627 0 12 5.373 12 12v24c0 6.627-5.373 12-12 12H364c-6.627 0-12-5.373-12-12zm0 72v-24c0-6.627 5.373-12 12-12h104c6.627 0 12 5.373 12 12v24c0 6.627-5.373 12-12 12H364c-6.627 0-12-5.373-12-12z"/></svg>
                                    {{__('Firm Overview')}}
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#firmAction" aria-controls="firmAction" role="tab" data-toggle="tab">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M561.938 158.06L417.94 14.092C387.926-15.922 336 5.097 336 48.032v57.198c-42.45 1.88-84.03 6.55-120.76 17.99-35.17 10.95-63.07 27.58-82.91 49.42C108.22 199.2 96 232.6 96 271.94c0 61.697 33.178 112.455 84.87 144.76 37.546 23.508 85.248-12.651 71.02-55.74-15.515-47.119-17.156-70.923 84.11-78.76V336c0 42.993 51.968 63.913 81.94 33.94l143.998-144c18.75-18.74 18.75-49.14 0-67.88zM384 336V232.16C255.309 234.082 166.492 255.35 206.31 376 176.79 357.55 144 324.08 144 271.94c0-109.334 129.14-118.947 240-119.85V48l144 144-144 144zm24.74 84.493a82.658 82.658 0 0 0 20.974-9.303c7.976-4.952 18.286.826 18.286 10.214V464c0 26.51-21.49 48-48 48H48c-26.51 0-48-21.49-48-48V112c0-26.51 21.49-48 48-48h132c6.627 0 12 5.373 12 12v4.486c0 4.917-2.987 9.369-7.569 11.152-13.702 5.331-26.396 11.537-38.05 18.585a12.138 12.138 0 0 1-6.28 1.777H54a6 6 0 0 0-6 6v340a6 6 0 0 0 6 6h340a6 6 0 0 0 6-6v-25.966c0-5.37 3.579-10.059 8.74-11.541z"/></svg>
                                    {{__('Call to Action')}}
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#firmPractice" aria-controls="firmPractice" role="tab" data-toggle="tab">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M464 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V80c0-26.51-21.49-48-48-48zm-6 400H54a6 6 0 0 1-6-6V86a6 6 0 0 1 6-6h404a6 6 0 0 1 6 6v340a6 6 0 0 1-6 6zm-42-92v24c0 6.627-5.373 12-12 12H204c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h200c6.627 0 12 5.373 12 12zm0-96v24c0 6.627-5.373 12-12 12H204c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h200c6.627 0 12 5.373 12 12zm0-96v24c0 6.627-5.373 12-12 12H204c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h200c6.627 0 12 5.373 12 12zm-252 12c0 19.882-16.118 36-36 36s-36-16.118-36-36 16.118-36 36-36 36 16.118 36 36zm0 96c0 19.882-16.118 36-36 36s-36-16.118-36-36 16.118-36 36-36 36 16.118 36 36zm0 96c0 19.882-16.118 36-36 36s-36-16.118-36-36 16.118-36 36-36 36 16.118 36 36z"/></svg>
                                    {{__('Practice Areas')}}
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#firmStaff" aria-controls="firmStaff" role="tab" data-toggle="tab">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M528 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h480c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm0 400H303.2c.9-4.5.8 3.6.8-22.4 0-31.8-30.1-57.6-67.2-57.6-10.8 0-18.7 8-44.8 8-26.9 0-33.4-8-44.8-8-37.1 0-67.2 25.8-67.2 57.6 0 26-.2 17.9.8 22.4H48V144h480v288zm-168-80h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8H360c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8zm0-64h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8H360c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8zm0-64h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8H360c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8zm-168 96c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64z"/></svg>
                                    {{__('Staff Members')}}
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#firmAwards" aria-controls="firmAwards" role="tab" data-toggle="tab">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M528.1 171.5L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6zM388.6 312.3l23.7 138.4L288 385.4l-124.3 65.3 23.7-138.4-100.6-98 139-20.2 62.2-126 62.2 126 139 20.2-100.6 98z"/></svg>
                                    {{__('Awards')}}
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#firmContact" aria-controls="firmContact" role="tab" data-toggle="tab">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1.8-4.1 2.3-5.6zm156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8zM460.1 174L402 115.9 216.2 301.8l-7.3 65.3 65.3-7.3L460.1 174zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1 30.9-30.9c4-4.2 4-10.8-.1-14.9z"/></svg>
                                    {{__('Contact Form')}}
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#firmSocial" aria-controls="firmSocial" role="tab" data-toggle="tab">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M144 208c-17.7 0-32 14.3-32 32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32zm112 0c-17.7 0-32 14.3-32 32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32zm112 0c-17.7 0-32 14.3-32 32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32zM256 32C114.6 32 0 125.1 0 240c0 47.6 19.9 91.2 52.9 126.3C38 405.7 7 439.1 6.5 439.5c-6.6 7-8.4 17.2-4.6 26S14.4 480 24 480c61.5 0 110-25.7 139.1-46.3C192 442.8 223.2 448 256 448c141.4 0 256-93.1 256-208S397.4 32 256 32zm0 368c-26.7 0-53.1-4.1-78.4-12.1l-22.7-7.2-19.5 13.8c-14.3 10.1-33.9 21.4-57.5 29 7.3-12.1 14.4-25.7 19.9-40.2l10.6-28.1-20.6-21.8C69.7 314.1 48 282.2 48 240c0-88.2 93.3-160 208-160s208 71.8 208 160-93.3 160-208 160z"/></svg>
                                    {{__('Social Media')}}
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#firmAnalytics" aria-controls="firmAnalytics" role="tab" data-toggle="tab">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M220.116 487.936l-20.213-49.425a3.992 3.992 0 0 0-5.808-1.886l-45.404 28.104c-29.466 18.24-66.295-8.519-58.054-42.179l12.699-51.865a3.993 3.993 0 0 0-3.59-4.941l-53.251-3.951c-34.554-2.562-48.632-45.855-22.174-68.247L65.08 259.05a3.992 3.992 0 0 0 0-6.106l-40.76-34.497c-26.45-22.384-12.39-65.682 22.174-68.246l53.251-3.951a3.993 3.993 0 0 0 3.59-4.941L90.637 89.443c-8.239-33.656 28.581-60.42 58.054-42.179l45.403 28.104a3.993 3.993 0 0 0 5.808-1.887l20.213-49.425c13.116-32.071 58.638-32.081 71.758 0l20.212 49.424a3.994 3.994 0 0 0 5.809 1.887l45.403-28.104c29.464-18.236 66.297 8.513 58.054 42.179l-12.699 51.865a3.995 3.995 0 0 0 3.59 4.941l53.251 3.951c34.553 2.563 48.633 45.854 22.175 68.246l-40.76 34.497a3.993 3.993 0 0 0 0 6.107l40.76 34.496c26.511 22.441 12.322 65.689-22.175 68.247l-53.251 3.951a3.993 3.993 0 0 0-3.589 4.942l12.698 51.864c8.241 33.658-28.583 60.421-58.054 42.18l-45.403-28.104a3.994 3.994 0 0 0-5.809 1.887l-20.212 49.424c-13.159 32.178-58.675 31.993-71.757 0zm16.814-64.568l19.064 46.616 19.064-46.615c10.308-25.2 40.778-35.066 63.892-20.759l42.822 26.507-11.976-48.919c-6.475-26.444 12.38-52.339 39.487-54.349l50.226-3.726-38.444-32.536c-20.782-17.591-20.747-49.621.001-67.18l38.442-32.536-50.225-3.727c-27.151-2.015-45.95-27.948-39.488-54.349l11.978-48.919-42.823 26.507c-23.151 14.327-53.603 4.4-63.892-20.76l-19.064-46.615-19.064 46.617c-10.305 25.198-40.778 35.066-63.891 20.76l-42.823-26.508 11.977 48.918c6.474 26.446-12.381 52.338-39.488 54.35l-50.224 3.726 38.443 32.537c20.782 17.588 20.747 49.619 0 67.178L52.48 322.123l50.226 3.726c27.151 2.014 45.95 27.947 39.487 54.349l-11.977 48.919 42.823-26.507c23.188-14.355 53.622-4.352 63.891 20.758zM256 384c-70.58 0-128-57.421-128-128 0-70.58 57.42-128 128-128 70.579 0 128 57.42 128 128 0 70.579-57.421 128-128 128zm0-208c-44.112 0-80 35.888-80 80s35.888 80 80 80 80-35.888 80-80-35.888-80-80-80z"/></svg>
                                    {{__('Analytics')}}
                                </a>
                            </li>
                            @if(auth()->user()->website())
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url()->route('websites:deploy', auth()->user()->website()) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M336.174 80c-49.132 0-93.305-32-161.913-32-31.301 0-58.303 6.482-80.721 15.168a48.04 48.04 0 0 0 2.142-20.727C93.067 19.575 74.167 1.594 51.201.104 23.242-1.71 0 20.431 0 48c0 17.764 9.657 33.262 24 41.562V496c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-83.443C109.869 395.28 143.259 384 199.826 384c49.132 0 93.305 32 161.913 32 58.479 0 101.972-22.617 128.548-39.981C503.846 367.161 512 352.051 512 335.855V95.937c0-34.459-35.264-57.768-66.904-44.117C409.193 67.309 371.641 80 336.174 80zM464 336c-21.783 15.412-60.824 32-102.261 32-59.945 0-102.002-32-161.913-32-43.361 0-96.379 9.403-127.826 24V128c21.784-15.412 60.824-32 102.261-32 59.945 0 102.002 32 161.913 32 43.271 0 96.32-17.366 127.826-32v240z"/></svg>
                                        {{__('Deploy')}}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </aside>
                </div>

                <!-- Tab cards -->
                <div class="col-md-9">
                    <div class="tab-content">
                        <!-- Profile -->
                        <div role="tabcard" class="tab-pane active" id="profile">
                            @include('spark::settings.profile')
                        </div>

                        <!-- Teams -->
                        @if (Spark::usesTeams())
                            <div role="tabcard" class="tab-pane" id="{{Spark::teamsPrefix()}}">
                                @include('spark::settings.teams')
                            </div>
                        @endif

                    <!-- Security -->
                        <div role="tabcard" class="tab-pane" id="security">
                            @include('spark::settings.security')
                        </div>

                        <!-- API -->
                        @if (Spark::usesApi())
                            <div role="tabcard" class="tab-pane" id="api">
                                @include('spark::settings.api')
                            </div>
                        @endif

                    <!-- Billing Tab Panes -->
                        @if (Spark::canBillCustomers())
                            @if (Spark::hasPaidPlans())
                            <!-- Subscription -->
                                <div role="tabcard" class="tab-pane" id="subscription">
                                    <div v-if="user">
                                        @include('spark::settings.subscription')
                                    </div>
                                </div>
                            @endif

                        <!-- Payment Method -->
                            <div role="tabcard" class="tab-pane" id="payment-method">
                                <div v-if="user">
                                    @include('spark::settings.payment-method')
                                </div>
                            </div>

                            <!-- Invoices -->
                            <div role="tabcard" class="tab-pane" id="invoices">
                                @include('spark::settings.invoices')
                            </div>
                        @endif

                        <!-- Firm Welcome -->
                        <div role="tabcard" class="tab-pane" id="firmWelcome">
                            @include('spark::settings.website-welcome')
                        </div>
                        
                        <!-- Firm Information -->
                        <div role="tabcard" class="tab-pane" id="firmInfo">
                            @include('spark::settings.website-firm-info')
                        </div>

                        <!-- Firm Overview -->
                        <div role="tabcard" class="tab-pane" id="firmOverview">
                            @include('spark::settings.website-firm-overview')
                        </div>

                        <!-- Call To Action -->
                        <div role="tabcard" class="tab-pane" id="firmAction">
                            @include('spark::settings.website-action')
                        </div>

                        <!-- Practice Areas -->
                        <div role="tabcard" class="tab-pane" id="firmPractice">
                            @include('spark::settings.website-practice')
                        </div>

                        <!-- Staff Members -->
                        <div role="tabcard" class="tab-pane" id="firmStaff">
                            @include('spark::settings.website-staff')
                        </div>

                        <!-- Awards -->
                        <div role="tabcard" class="tab-pane" id="firmAwards">
                            @include('spark::settings.website-awards')
                        </div>

                        <!-- Contact Form -->
                        <div role="tabcard" class="tab-pane" id="firmContact">
                            @include('spark::settings.website-contact')
                        </div>

                        <!-- Social Media -->
                        <div role="tabcard" class="tab-pane" id="firmSocial">
                            @include('spark::settings.website-social')
                        </div>

                        <!-- Analytics -->
                        <div role="tabcard" class="tab-pane" id="firmAnalytics">
                            @include('spark::settings.website-analytics')
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </spark-settings>
@endsection
