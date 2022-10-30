@extends('layouts.backend')

@section('title')
{{ __('dashboard.Dashboard') }}
@endsection

@section('links')
    <li class="breadcrumb-item active">
        {{ __('dashboard.Dashboard') }}
    </li>
@endsection

@section('button-link')
    {{ route('dashboard') }}
@endsection

@section('button-icon')
    dashboard
@endsection

@section('button-title')
{{ __('dashboard.Dashboard') }}
@endsection

@section('main_content')
    <!-- Page Content -->

    <div class="container page__container">
        <div class="page-section">

            <div class="page-separator">
                <div class="page-separator__text">{{ __('dashboard.overview') }}</div>
            </div>

            <div class="row card-group-row mb-lg-8pt">
                <div class="col-lg-6 card-group-row__col">

                    <div class="card card-group-row__card">
                        <div class="card-header d-flex">
                            <div class="flex row">
                                <div class="col-auto d-flex flex-column">
                                    <div class="h2 mb-0">{{ $new_orders = \App\Models\Order::where('status','New')->whereYear('created_at', \Carbon\Carbon::now()->year)->count() }}</div>
                                    <div class="card-title">{{ __('dashboard.New_Orders') }}</div>
                                </div>
                                <div class="col-auto d-flex flex-column">
                                    <div class="h2 mb-0">{{ $canceled_orders = \App\Models\Order::where('status','Completed')->whereYear('created_at', \Carbon\Carbon::now()->year)->count() }}</div>
                                    <div class="card-title">{{ __('dashboard.Completed_Orders') }}</div>
                                </div>
                            </div>
                            <a href="#"><i class="material-icons text-50">more_horiz</i></a>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center">

                            <div class="mb-8pt">
                                <p class="d-flex align-items-center mb-4pt">
                                    <small class="flex lh-24pt"><strong>{{ __('dashboard.New_Orders') }}</strong></small>
                                    <small class="text-50 lh-24pt">due in 12 days</small>
                                </p>
                                <div class="progress"
                                     style="height: 4px;">
                                    <div class="progress-bar bg-warning"
                                         role="progressbar"
                                         style="width: 20%;"
                                         aria-valuenow="20"
                                         aria-valuemin="0"
                                         aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div>
                                <p class="d-flex align-items-center mb-4pt">
                                    <small class="flex lh-24pt"><strong>{{ __('dashboard.Completed_Orders') }}</strong></small>
                                    <small class="text-50 lh-24pt">due in 30 days</small>
                                </p>
                                <div class="progress"
                                     style="height: 4px;">
                                    <div class="progress-bar bg-accent"
                                         role="progressbar"
                                         style="width: 100%;"
                                         aria-valuenow="100"
                                         aria-valuemin="0"
                                         aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>


                <div class="col-lg-6 card-group-row__col">

                    <div class="card card-group-row__card">
                        <div class="card-header p-0 nav border-0">
                            <div class="row no-gutters flex"
                                 role="tablist">
                                <div class="col-auto">
                                    <div class="p-card-header pr-0">
                                        <div class="pr-12pt">
                                            <div class="h2 mb-0">{{ $orders->sum('cash_on_delivery') }} {{ __('content.EGP') }}</div>
                                            <div class="d-flex flex-column">
                                                <p class="mb-0"><strong>{{ __('dashboard.Earnings') }}</strong></p>
                                                <small class="text-50">This billing cycle</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto flex">
                                    <div class="p-card-header d-flex flex-column align-items-end">
                                        <a href="#"><i class="material-icons text-50">more_horiz</i></a>
                                        <div class="flex d-flex align-items-center align-self-start">
                                            <div class="position-relative mr-12pt">
                                                <div class="text-center fullbleed d-flex align-items-center justify-content-center flex-column z-0">
                                                    <small>60%</small>
                                                </div>
                                                <canvas width="48"
                                                        height="48"
                                                        class="chart-canvas position-relative z-1 js-update-chart-progress-accent"
                                                        id="invoicesProgressChart"
                                                        data-chart-line-background-color="accent;gray"
                                                        data-chart-disable-tooltips="true"></canvas>
                                            </div>
                                            <small class="text-50">4 of 12 bells</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body position-relative o-hidden p-0">
                            <div class="chart z-0"
                                 style="height: 98px;">
                                <canvas id="earningsChart"
                                        class="chart-canvas js-update-chart-line"
                                        data-chart-line-border-color="primary,gray"
                                        data-chart-hide-axes="true"></canvas>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="page-separator">
                <div class="page-separator__text">{{ __('dashboard.Orders') }}</div>
            </div>

            <div class="card dashboard-area-tabs p-relative o-hidden mb-32pt">
                <div class="card-header p-0 nav">
                    <div class="row no-gutters"
                         role="tablist">
                        <div class="col-auto">
                            <a href="#"
                               data-toggle="tab"
                               role="tab"
                               aria-selected="true"
                               class="dashboard-area-tabs__tab card-body d-flex flex-row align-items-center justify-content-start active">
                                {{--<span class="h2 mb-0 mr-3">{{ $category->id }}</span>--}}
                                <div class="avatar avatar-sm mr-8pt">
                                    <span class="avatar-title rounded bg-transparent text-black-100">
                                        <img src="{{ asset('backend/images/icon/all.png') }}"
                                             alt="Avatar"
                                             class="avatar-img ">
                                        </span>
                                </div>
                                <span class="flex d-flex flex-column">
                                        <strong>{{ __('dashboard.All_orders') }}</strong>
                                        <small class=" text-50">{{ __("dashboard.active")  }}</small>
                                        <span class="indicator-line rounded bg-success"></span>
                                    </span>
                            </a>
                        </div>
                        @foreach($types as $type)
                            <div class="col-auto border-left border-right">
                                <a href="#"
                                   data-toggle="tab"
                                   role="tab"
                                   data-name="{{ $type['name'] }}"
                                   aria-selected="false"
                                   class="dashboard-area-tabs__tab card-body d-flex flex-row align-items-center justify-content-start ">
                                    {{--<span class="h2 mb-0 mr-3">{{ $category->id }}</span>--}}
                                    <div class="avatar avatar-sm mr-8pt">
                                        <span class="avatar-title rounded bg-primary text-black-100">
                                           <img src="{{ asset('backend/images/icon/'.$type['image']) }}"
                                                alt="Avatar"
                                                class="avatar-img ">
                                        </span>
                                    </div>
                                    <span class="flex d-flex flex-column">
                                        <strong>{{ __("dashboard.{$type['name']}")  }}</strong>
                                        <small class="text-20" >{{ __("dashboard.{$type['description']}")  }}</small>
                                        <span class="indicator-line rounded bg-{{ $type['color'] }}"></span>
                                    </span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="table-responsive">
                    <div class="card-header">
                        <form class="form-inline">
                            <label class="mr-sm-2 form-label"
                                   for="myInputTextField">{{ __('dashboard.Filter_by') }}:</label>
                            <input type="text"
                                   class="form-control search mb-2 mr-sm-2 mb-sm-0"
                                   id="myInputTextField"
                                   placeholder="{{ __('dashboard.Search') }} ...">

                            <div class="col-lg d-flex flex-wrap buttons-datatable-add">
                                <div class="ml-lg-auto dropdown select-datatable-add">

                                </div>
                            </div>
                        </form>

                    </div>

                    <table
                        class="datatable-func display table mb-0 thead-border-top-0 table-nowrap"
                        style="width:100%">
                        <thead>
                        <tr>

                            <th style="width: 18px;"
                                class="pr-0 select-checkbox">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox"
                                           class="custom-control-input js-toggle-check-all"
                                           data-target="#projects"
                                           id="customCheckAll">
                                    <label class="custom-control-label"
                                           for="customCheckAll"><span class="text-hide">Toggle all</span></label>
                                </div>
                            </th>

                            <th>#</th>

                            <th>{{ __('dashboard.Tracking_No') }}</th>

                            <th>{{ __('dashboard.Type') }}</th>

                            <th>{{ __('dashboard.COD') }}</th>

                            <th>{{ __('dashboard.Status') }}</th>

                            <th>{{ __('dashboard.Created_At') }}</th>

                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="projects">
                        @foreach($orders as $order)
                            <tr class="">

                                <td class="pr-0">
                                    {{--<div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="checkItem" class="checkItem " name="checkItem"  />
                                        <label class=""
                                               for="checkItem"><span class="text-hide">Check</span></label>
                                    </div>--}}

                                    <div class="custom-control custom-checkbox">
                                        {{--<input type="checkbox"
                                               class="custom-control-input "
                                               checked=""
                                               id="customCheck1_5">
                                        <label class="custom-control-label"
                                               for="customCheck1_5"><span class="text-hide">Check</span></label>--}}
                                    </div>
                                </td>

                                <td></td>

                                <td>
                                    <a href="{{ route('dashboard.orders.show',$order->id) }}"
                                       class="chip text-underline">{{ $order->tracking_no }}</a>
                                </td>

                                <td>
                                    <div class="media flex-nowrap align-items-center"
                                         style="white-space: nowrap;">
                                        <div class="avatar avatar-sm mr-8pt">
                                                <span class="avatar-title rounded bg-primary text-black-100">
                                                     <img src="{{ asset('backend/images/icon/'.$types[$order->type]['image']) }}"
                                                          alt="Avatar"
                                                          class="avatar-img ">
                                                </span>
                                        </div>
                                        <div class="media-body">
                                            <div class="d-flex flex-column">
                                                <small class=""><strong>{{ __("dashboard.{$order->type}")  }}</strong></small>
                                                <span class="indicator-line rounded bg-{{ $types[$order->type]['color'] }}"></span>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div href="#"
                                         class="chip chip-outline-secondary ">{{ $order->cash_on_delivery }} {{ __('dashboard.EGP')}}</div>
                                </td>

                                <td>
                                    <div class="d-flex flex-column">
                                        <small class="badge {{ $order->status_color }}" >{{ __("dashboard.{$order->status}")  }}</small>
                                    </div>
                                </td>

                                <td data-sort="{{ $order->created_at }}">
                                    <div class="d-flex flex-column">
                                        <small class=""><strong>{{ date("F j, Y", strtotime($order->created_at)) }}</strong></small>
                                        <small class="text-50">{{ $order->created_at->diffForHumans() }}</small>
                                    </div>
                                </td>

                                <td class="text-right">
                                    <a href="#" data-toggle="dropdown"
                                       class="btn text-50  text-70"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('dashboard.orders.create.airwaybell',$order->id) }}" class="dropdown-item active"><i class="material-icons ">receipt</i> {{ __('dashboard.Airwaybell') }}</a>
                                        @can('show orders')
                                            <a href="{{ route('dashboard.orders.show',$order->id) }}" class="dropdown-item"><i class="material-icons ">visibility</i> {{ __('dashboard.View') }}</a>
                                        @endcan
                                        @can('edit orders')
                                            <a href="{{ route('dashboard.orders.edit',$order->id) }}" class="dropdown-item"><i class="material-icons ">edit</i> {{ __('dashboard.Edit') }}</a>
                                        @endcan
                                        @can('delete orders')
                                            <div class="dropdown-divider"></div>
                                            <a onclick="event.preventDefault(); document.getElementById('delete-form{{ $order->id }}').submit();" class="dropdown-item"><i class="material-icons ">delete</i> {{ __('dashboard.Delete') }}</a>
                                            <form id="delete-form{{ $order->id }}" action="{{ route('dashboard.orders.destroy',$order->id) }}" method="POST" class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th style="width: 18px;"
                                class="pr-0 select-checkbox">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox"
                                           class="custom-control-input js-toggle-check-all"
                                           data-target="#projects"
                                           id="customCheckAll1">
                                    <label class="custom-control-label"
                                           for="customCheckAll1"><span class="text-hide">Toggle all</span></label>
                                </div>
                            </th>

                            <th>#</th>

                            <th>{{ __('dashboard.Tracking_No') }}</th>

                            <th>{{ __('dashboard.Type') }}</th>

                            <th>{{ __('dashboard.COD') }}</th>

                            <th>{{ __('dashboard.Status') }}</th>

                            <th>{{ __('dashboard.Created_At') }}</th>

                            <th></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="card-footer p-8pt">

                    <ul class="pagination justify-content-start pagination-xsm m-0">
                        <li class="text-right info-pagination"></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <!-- // END Page Content -->
@endsection

@section('extra-scripts')
    <script>
        !function(t){var r={};function n(e){if(r[e])return r[e].exports;var o=r[e]={i:e,l:!1,exports:{}};return t[e].call(o.exports,o,o.exports,n),o.l=!0,o.exports}n.m=t,n.c=r,n.d=function(t,r,e){n.o(t,r)||Object.defineProperty(t,r,{enumerable:!0,get:e})},n.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},n.t=function(t,r){if(1&r&&(t=n(t)),8&r)return t;if(4&r&&"object"==typeof t&&t&&t.__esModule)return t;var e=Object.create(null);if(n.r(e),Object.defineProperty(e,"default",{enumerable:!0,value:t}),2&r&&"string"!=typeof t)for(var o in t)n.d(e,o,function(r){return t[r]}.bind(null,o));return e},n.n=function(t){var r=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(r,"a",r),r},n.o=function(t,r){return Object.prototype.hasOwnProperty.call(t,r)},n.p="/",n(n.s=564)}({0:function(t,r,n){(function(r){var n=function(t){return t&&t.Math==Math&&t};t.exports=n("object"==typeof globalThis&&globalThis)||n("object"==typeof window&&window)||n("object"==typeof self&&self)||n("object"==typeof r&&r)||Function("return this")()}).call(this,n(49))},1:function(t,r){t.exports=function(t){try{return!!t()}catch(t){return!0}}},10:function(t,r,n){var e=n(33),o=n(12);t.exports=function(t){return e(o(t))}},103:function(t,r,n){var e=n(3);r.f=e},104:function(t,r,n){"use strict";var e,o,i,u=n(94),c=n(9),f=n(2),a=n(3),s=n(36),l=a("iterator"),p=!1;[].keys&&("next"in(i=[].keys())?(o=u(u(i)))!==Object.prototype&&(e=o):p=!0),null==e&&(e={}),s||f(e,l)||c(e,l,(function(){return this})),t.exports={IteratorPrototype:e,BUGGY_SAFARI_ITERATORS:p}},105:function(t,r,n){var e=n(8),o=n(125);t.exports=Object.setPrototypeOf||("__proto__"in{}?function(){var t,r=!1,n={};try{(t=Object.getOwnPropertyDescriptor(Object.prototype,"__proto__").set).call(n,[]),r=n instanceof Array}catch(t){}return function(n,i){return e(n),o(i),r?t.call(n,i):n.__proto__=i,n}}():void 0)},11:function(t,r,n){var e=n(16),o=Math.min;t.exports=function(t){return t>0?o(e(t),9007199254740991):0}},110:function(t,r,n){var e=n(71),o=n(13),i=n(126);e||o(Object.prototype,"toString",i,{unsafe:!0})},119:function(t,r,n){"use strict";var e=n(13),o=n(8),i=n(1),u=n(77),c=RegExp.prototype,f=c.toString,a=i((function(){return"/a/b"!=f.call({source:"a",flags:"b"})})),s="toString"!=f.name;(a||s)&&e(RegExp.prototype,"toString",(function(){var t=o(this),r=String(t.source),n=t.flags;return"/"+r+"/"+String(void 0===n&&t instanceof RegExp&&!("flags"in c)?u.call(t):n)}),{unsafe:!0})},12:function(t,r){t.exports=function(t){if(null==t)throw TypeError("Can't call method on "+t);return t}},125:function(t,r,n){var e=n(4);t.exports=function(t){if(!e(t)&&null!==t)throw TypeError("Can't set "+String(t)+" as a prototype");return t}},126:function(t,r,n){"use strict";var e=n(71),o=n(92);t.exports=e?{}.toString:function(){return"[object "+o(this)+"]"}},13:function(t,r,n){var e=n(0),o=n(9),i=n(2),u=n(21),c=n(39),f=n(28),a=f.get,s=f.enforce,l=String(String).split("String");(t.exports=function(t,r,n,c){var f=!!c&&!!c.unsafe,a=!!c&&!!c.enumerable,p=!!c&&!!c.noTargetGet;"function"==typeof n&&("string"!=typeof r||i(n,"name")||o(n,"name",r),s(n).source=l.join("string"==typeof r?r:"")),t!==e?(f?!p&&t[r]&&(a=!0):delete t[r],a?t[r]=n:o(t,r,n)):a?t[r]=n:u(r,n)})(Function.prototype,"toString",(function(){return"function"==typeof this&&a(this).source||c(this)}))},132:function(t,r,n){var e=n(10),o=n(37).f,i={}.toString,u="object"==typeof window&&window&&Object.getOwnPropertyNames?Object.getOwnPropertyNames(window):[];t.exports.f=function(t){return u&&"[object Window]"==i.call(t)?function(t){try{return o(t)}catch(t){return u.slice()}}(t):o(e(t))}},134:function(t,r,n){"use strict";var e=n(6),o=n(0),i=n(20),u=n(36),c=n(5),f=n(31),a=n(58),s=n(1),l=n(2),p=n(35),y=n(4),v=n(8),d=n(17),g=n(10),h=n(18),b=n(14),m=n(53),S=n(66),x=n(37),O=n(132),w=n(48),j=n(25),A=n(7),P=n(47),T=n(9),M=n(13),_=n(30),E=n(27),L=n(19),C=n(26),I=n(3),k=n(103),R=n(97),F=n(72),D=n(28),N=n(44).forEach,G=E("hidden"),Y=I("toPrimitive"),V=D.set,z=D.getterFor("Symbol"),W=Object.prototype,B=o.Symbol,H=i("JSON","stringify"),U=j.f,$=A.f,q=O.f,J=P.f,K=_("symbols"),Q=_("op-symbols"),X=_("string-to-symbol-registry"),Z=_("symbol-to-string-registry"),tt=_("wks"),rt=o.QObject,nt=!rt||!rt.prototype||!rt.prototype.findChild,et=c&&s((function(){return 7!=m($({},"a",{get:function(){return $(this,"a",{value:7}).a}})).a}))?function(t,r,n){var e=U(W,r);e&&delete W[r],$(t,r,n),e&&t!==W&&$(W,r,e)}:$,ot=function(t,r){var n=K[t]=m(B.prototype);return V(n,{type:"Symbol",tag:t,description:r}),c||(n.description=r),n},it=a?function(t){return"symbol"==typeof t}:function(t){return Object(t)instanceof B},ut=function(t,r,n){t===W&&ut(Q,r,n),v(t);var e=h(r,!0);return v(n),l(K,e)?(n.enumerable?(l(t,G)&&t[G][e]&&(t[G][e]=!1),n=m(n,{enumerable:b(0,!1)})):(l(t,G)||$(t,G,b(1,{})),t[G][e]=!0),et(t,e,n)):$(t,e,n)},ct=function(t,r){v(t);var n=g(r),e=S(n).concat(lt(n));return N(e,(function(r){c&&!ft.call(n,r)||ut(t,r,n[r])})),t},ft=function(t){var r=h(t,!0),n=J.call(this,r);return!(this===W&&l(K,r)&&!l(Q,r))&&(!(n||!l(this,r)||!l(K,r)||l(this,G)&&this[G][r])||n)},at=function(t,r){var n=g(t),e=h(r,!0);if(n!==W||!l(K,e)||l(Q,e)){var o=U(n,e);return!o||!l(K,e)||l(n,G)&&n[G][e]||(o.enumerable=!0),o}},st=function(t){var r=q(g(t)),n=[];return N(r,(function(t){l(K,t)||l(L,t)||n.push(t)})),n},lt=function(t){var r=t===W,n=q(r?Q:g(t)),e=[];return N(n,(function(t){!l(K,t)||r&&!l(W,t)||e.push(K[t])})),e};(f||(M((B=function(){if(this instanceof B)throw TypeError("Symbol is not a constructor");var t=arguments.length&&void 0!==arguments[0]?String(arguments[0]):void 0,r=C(t),n=function(t){this===W&&n.call(Q,t),l(this,G)&&l(this[G],r)&&(this[G][r]=!1),et(this,r,b(1,t))};return c&&nt&&et(W,r,{configurable:!0,set:n}),ot(r,t)}).prototype,"toString",(function(){return z(this).tag})),M(B,"withoutSetter",(function(t){return ot(C(t),t)})),P.f=ft,A.f=ut,j.f=at,x.f=O.f=st,w.f=lt,k.f=function(t){return ot(I(t),t)},c&&($(B.prototype,"description",{configurable:!0,get:function(){return z(this).description}}),u||M(W,"propertyIsEnumerable",ft,{unsafe:!0}))),e({global:!0,wrap:!0,forced:!f,sham:!f},{Symbol:B}),N(S(tt),(function(t){R(t)})),e({target:"Symbol",stat:!0,forced:!f},{for:function(t){var r=String(t);if(l(X,r))return X[r];var n=B(r);return X[r]=n,Z[n]=r,n},keyFor:function(t){if(!it(t))throw TypeError(t+" is not a symbol");if(l(Z,t))return Z[t]},useSetter:function(){nt=!0},useSimple:function(){nt=!1}}),e({target:"Object",stat:!0,forced:!f,sham:!c},{create:function(t,r){return void 0===r?m(t):ct(m(t),r)},defineProperty:ut,defineProperties:ct,getOwnPropertyDescriptor:at}),e({target:"Object",stat:!0,forced:!f},{getOwnPropertyNames:st,getOwnPropertySymbols:lt}),e({target:"Object",stat:!0,forced:s((function(){w.f(1)}))},{getOwnPropertySymbols:function(t){return w.f(d(t))}}),H)&&e({target:"JSON",stat:!0,forced:!f||s((function(){var t=B();return"[null]"!=H([t])||"{}"!=H({a:t})||"{}"!=H(Object(t))}))},{stringify:function(t,r,n){for(var e,o=[t],i=1;arguments.length>i;)o.push(arguments[i++]);if(e=r,(y(r)||void 0!==t)&&!it(t))return p(r)||(r=function(t,r){if("function"==typeof e&&(r=e.call(this,t,r)),!it(r))return r}),o[1]=r,H.apply(null,o)}});B.prototype[Y]||T(B.prototype,Y,B.prototype.valueOf),F(B,"Symbol"),L[G]=!0},135:function(t,r,n){"use strict";var e=n(6),o=n(5),i=n(0),u=n(2),c=n(4),f=n(7).f,a=n(56),s=i.Symbol;if(o&&"function"==typeof s&&(!("description"in s.prototype)||void 0!==s().description)){var l={},p=function(){var t=arguments.length<1||void 0===arguments[0]?void 0:String(arguments[0]),r=this instanceof p?new s(t):void 0===t?s():s(t);return""===t&&(l[r]=!0),r};a(p,s);var y=p.prototype=s.prototype;y.constructor=p;var v=y.toString,d="Symbol(test)"==String(s("test")),g=/^Symbol\((.*)\)[^)]+$/;f(y,"description",{configurable:!0,get:function(){var t=c(this)?this.valueOf():this,r=v.call(t);if(u(l,t))return"";var n=d?r.slice(7,-1):r.replace(g,"$1");return""===n?void 0:n}}),e({global:!0,forced:!0},{Symbol:p})}},136:function(t,r,n){var e=n(1);t.exports=!e((function(){function t(){}return t.prototype.constructor=null,Object.getPrototypeOf(new t)!==t.prototype}))},137:function(t,r,n){var e=n(0),o=n(81),i=n(93),u=n(9),c=n(3),f=c("iterator"),a=c("toStringTag"),s=i.values;for(var l in o){var p=e[l],y=p&&p.prototype;if(y){if(y[f]!==s)try{u(y,f,s)}catch(t){y[f]=s}if(y[a]||u(y,a,l),o[l])for(var v in i)if(y[v]!==i[v])try{u(y,v,i[v])}catch(t){y[v]=i[v]}}}},14:function(t,r){t.exports=function(t,r){return{enumerable:!(1&t),configurable:!(2&t),writable:!(4&t),value:r}}},146:function(t,r,n){n(97)("iterator")},147:function(t,r,n){var e=n(6),o=n(173);e({target:"Array",stat:!0,forced:!n(151)((function(t){Array.from(t)}))},{from:o})},148:function(t,r,n){var e=n(8);t.exports=function(t,r,n,o){try{return o?r(e(n)[0],n[1]):r(n)}catch(r){var i=t.return;throw void 0!==i&&e(i.call(t)),r}}},149:function(t,r,n){var e=n(3),o=n(61),i=e("iterator"),u=Array.prototype;t.exports=function(t){return void 0!==t&&(o.Array===t||u[i]===t)}},15:function(t,r){var n={}.toString;t.exports=function(t){return n.call(t).slice(8,-1)}},150:function(t,r,n){var e=n(92),o=n(61),i=n(3)("iterator");t.exports=function(t){if(null!=t)return t[i]||t["@@iterator"]||o[e(t)]}},151:function(t,r,n){var e=n(3)("iterator"),o=!1;try{var i=0,u={next:function(){return{done:!!i++}},return:function(){o=!0}};u[e]=function(){return this},Array.from(u,(function(){throw 2}))}catch(t){}t.exports=function(t,r){if(!r&&!o)return!1;var n=!1;try{var i={};i[e]=function(){return{next:function(){return{done:n=!0}}}},t(i)}catch(t){}return n}},152:function(t,r,n){"use strict";var e=n(104).IteratorPrototype,o=n(53),i=n(14),u=n(72),c=n(61),f=function(){return this};t.exports=function(t,r,n){var a=r+" Iterator";return t.prototype=o(e,{next:i(1,n)}),u(t,a,!1,!0),c[a]=f,t}},153:function(t,r,n){"use strict";var e=n(95).charAt,o=n(28),i=n(98),u=o.set,c=o.getterFor("String Iterator");i(String,"String",(function(t){u(this,{type:"String Iterator",string:String(t),index:0})}),(function(){var t,r=c(this),n=r.string,o=r.index;return o>=n.length?{value:void 0,done:!0}:(t=e(n,o),r.index+=t.length,{value:t,done:!1})}))},16:function(t,r){var n=Math.ceil,e=Math.floor;t.exports=function(t){return isNaN(t=+t)?0:(t>0?e:n)(t)}},17:function(t,r,n){var e=n(12);t.exports=function(t){return Object(e(t))}},173:function(t,r,n){"use strict";var e=n(67),o=n(17),i=n(148),u=n(149),c=n(11),f=n(59),a=n(150);t.exports=function(t){var r,n,s,l,p,y,v=o(t),d="function"==typeof this?this:Array,g=arguments.length,h=g>1?arguments[1]:void 0,b=void 0!==h,m=a(v),S=0;if(b&&(h=e(h,g>2?arguments[2]:void 0,2)),null==m||d==Array&&u(m))for(n=new d(r=c(v.length));r>S;S++)y=b?h(v[S],S):v[S],f(n,S,y);else for(p=(l=m.call(v)).next,n=new d;!(s=p.call(l)).done;S++)y=b?i(l,h,[s.value,S],!0):s.value,f(n,S,y);return n.length=S,n}},18:function(t,r,n){var e=n(4);t.exports=function(t,r){if(!e(t))return t;var n,o;if(r&&"function"==typeof(n=t.toString)&&!e(o=n.call(t)))return o;if("function"==typeof(n=t.valueOf)&&!e(o=n.call(t)))return o;if(!r&&"function"==typeof(n=t.toString)&&!e(o=n.call(t)))return o;throw TypeError("Can't convert object to primitive value")}},19:function(t,r){t.exports={}},2:function(t,r){var n={}.hasOwnProperty;t.exports=function(t,r){return n.call(t,r)}},20:function(t,r,n){var e=n(57),o=n(0),i=function(t){return"function"==typeof t?t:void 0};t.exports=function(t,r){return arguments.length<2?i(e[t])||i(o[t]):e[t]&&e[t][r]||o[t]&&o[t][r]}},21:function(t,r,n){var e=n(0),o=n(9);t.exports=function(t,r){try{o(e,t,r)}catch(n){e[t]=r}return r}},24:function(t,r,n){var e=n(5),o=n(1),i=n(2),u=Object.defineProperty,c={},f=function(t){throw t};t.exports=function(t,r){if(i(c,t))return c[t];r||(r={});var n=[][t],a=!!i(r,"ACCESSORS")&&r.ACCESSORS,s=i(r,0)?r[0]:f,l=i(r,1)?r[1]:void 0;return c[t]=!!n&&!o((function(){if(a&&!e)return!0;var t={length:-1};a?u(t,1,{enumerable:!0,get:f}):t[1]=1,n.call(t,s,l)}))}},25:function(t,r,n){var e=n(5),o=n(47),i=n(14),u=n(10),c=n(18),f=n(2),a=n(38),s=Object.getOwnPropertyDescriptor;r.f=e?s:function(t,r){if(t=u(t),r=c(r,!0),a)try{return s(t,r)}catch(t){}if(f(t,r))return i(!o.f.call(t,r),t[r])}},26:function(t,r){var n=0,e=Math.random();t.exports=function(t){return"Symbol("+String(void 0===t?"":t)+")_"+(++n+e).toString(36)}},27:function(t,r,n){var e=n(30),o=n(26),i=e("keys");t.exports=function(t){return i[t]||(i[t]=o(t))}},28:function(t,r,n){var e,o,i,u=n(69),c=n(0),f=n(4),a=n(9),s=n(2),l=n(27),p=n(19),y=c.WeakMap;if(u){var v=new y,d=v.get,g=v.has,h=v.set;e=function(t,r){return h.call(v,t,r),r},o=function(t){return d.call(v,t)||{}},i=function(t){return g.call(v,t)}}else{var b=l("state");p[b]=!0,e=function(t,r){return a(t,b,r),r},o=function(t){return s(t,b)?t[b]:{}},i=function(t){return s(t,b)}}t.exports={set:e,get:o,has:i,enforce:function(t){return i(t)?o(t):e(t,{})},getterFor:function(t){return function(r){var n;if(!f(r)||(n=o(r)).type!==t)throw TypeError("Incompatible receiver, "+t+" required");return n}}}},29:function(t,r){t.exports=["constructor","hasOwnProperty","isPrototypeOf","propertyIsEnumerable","toLocaleString","toString","valueOf"]},3:function(t,r,n){var e=n(0),o=n(30),i=n(2),u=n(26),c=n(31),f=n(58),a=o("wks"),s=e.Symbol,l=f?s:s&&s.withoutSetter||u;t.exports=function(t){return i(a,t)||(c&&i(s,t)?a[t]=s[t]:a[t]=l("Symbol."+t)),a[t]}},30:function(t,r,n){var e=n(36),o=n(40);(t.exports=function(t,r){return o[t]||(o[t]=void 0!==r?r:{})})("versions",[]).push({version:"3.6.5",mode:e?"pure":"global",copyright:"© 2020 Denis Pushkarev (zloirock.ru)"})},31:function(t,r,n){var e=n(1);t.exports=!!Object.getOwnPropertySymbols&&!e((function(){return!String(Symbol())}))},33:function(t,r,n){var e=n(1),o=n(15),i="".split;t.exports=e((function(){return!Object("z").propertyIsEnumerable(0)}))?function(t){return"String"==o(t)?i.call(t,""):Object(t)}:Object},35:function(t,r,n){var e=n(15);t.exports=Array.isArray||function(t){return"Array"==e(t)}},36:function(t,r){t.exports=!1},37:function(t,r,n){var e=n(42),o=n(29).concat("length","prototype");r.f=Object.getOwnPropertyNames||function(t){return e(t,o)}},38:function(t,r,n){var e=n(5),o=n(1),i=n(43);t.exports=!e&&!o((function(){return 7!=Object.defineProperty(i("div"),"a",{get:function(){return 7}}).a}))},39:function(t,r,n){var e=n(40),o=Function.toString;"function"!=typeof e.inspectSource&&(e.inspectSource=function(t){return o.call(t)}),t.exports=e.inspectSource},4:function(t,r){t.exports=function(t){return"object"==typeof t?null!==t:"function"==typeof t}},40:function(t,r,n){var e=n(0),o=n(21),i=e["__core-js_shared__"]||o("__core-js_shared__",{});t.exports=i},41:function(t,r,n){var e=n(16),o=Math.max,i=Math.min;t.exports=function(t,r){var n=e(t);return n<0?o(n+r,0):i(n,r)}},42:function(t,r,n){var e=n(2),o=n(10),i=n(60).indexOf,u=n(19);t.exports=function(t,r){var n,c=o(t),f=0,a=[];for(n in c)!e(u,n)&&e(c,n)&&a.push(n);for(;r.length>f;)e(c,n=r[f++])&&(~i(a,n)||a.push(n));return a}},43:function(t,r,n){var e=n(0),o=n(4),i=e.document,u=o(i)&&o(i.createElement);t.exports=function(t){return u?i.createElement(t):{}}},44:function(t,r,n){var e=n(67),o=n(33),i=n(17),u=n(11),c=n(65),f=[].push,a=function(t){var r=1==t,n=2==t,a=3==t,s=4==t,l=6==t,p=5==t||l;return function(y,v,d,g){for(var h,b,m=i(y),S=o(m),x=e(v,d,3),O=u(S.length),w=0,j=g||c,A=r?j(y,O):n?j(y,0):void 0;O>w;w++)if((p||w in S)&&(b=x(h=S[w],w,m),t))if(r)A[w]=b;else if(b)switch(t){case 3:return!0;case 5:return h;case 6:return w;case 2:f.call(A,h)}else if(s)return!1;return l?-1:a||s?s:A}};t.exports={forEach:a(0),map:a(1),filter:a(2),some:a(3),every:a(4),find:a(5),findIndex:a(6)}},45:function(t,r){function n(r){return"function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?t.exports=n=function(t){return typeof t}:t.exports=n=function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},n(r)}t.exports=n},47:function(t,r,n){"use strict";var e={}.propertyIsEnumerable,o=Object.getOwnPropertyDescriptor,i=o&&!e.call({1:2},1);r.f=i?function(t){var r=o(this,t);return!!r&&r.enumerable}:e},48:function(t,r){r.f=Object.getOwnPropertySymbols},49:function(t,r,n){var e,o=n(45);e=function(){return this}();try{e=e||new Function("return this")()}catch(t){"object"===("undefined"==typeof window?"undefined":o(window))&&(e=window)}t.exports=e},5:function(t,r,n){var e=n(1);t.exports=!e((function(){return 7!=Object.defineProperty({},1,{get:function(){return 7}})[1]}))},53:function(t,r,n){var e,o=n(8),i=n(90),u=n(29),c=n(19),f=n(91),a=n(43),s=n(27),l=s("IE_PROTO"),p=function(){},y=function(t){return"<script>"+t+"<\/script>"},v=function(){try{e=document.domain&&new ActiveXObject("htmlfile")}catch(t){}var t,r;v=e?function(t){t.write(y("")),t.close();var r=t.parentWindow.Object;return t=null,r}(e):((r=a("iframe")).style.display="none",f.appendChild(r),r.src=String("javascript:"),(t=r.contentWindow.document).open(),t.write(y("document.F=Object")),t.close(),t.F);for(var n=u.length;n--;)delete v.prototype[u[n]];return v()};c[l]=!0,t.exports=Object.create||function(t,r){var n;return null!==t?(p.prototype=o(t),n=new p,p.prototype=null,n[l]=t):n=v(),void 0===r?n:i(n,r)}},54:function(t,r,n){var e=n(1),o=n(3),i=n(74),u=o("species");t.exports=function(t){return i>=51||!e((function(){var r=[];return(r.constructor={})[u]=function(){return{foo:1}},1!==r[t](Boolean).foo}))}},55:function(t,r,n){var e=n(1),o=/#|\.prototype\./,i=function(t,r){var n=c[u(t)];return n==a||n!=f&&("function"==typeof r?e(r):!!r)},u=i.normalize=function(t){return String(t).replace(o,".").toLowerCase()},c=i.data={},f=i.NATIVE="N",a=i.POLYFILL="P";t.exports=i},56:function(t,r,n){var e=n(2),o=n(70),i=n(25),u=n(7);t.exports=function(t,r){for(var n=o(r),c=u.f,f=i.f,a=0;a<n.length;a++){var s=n[a];e(t,s)||c(t,s,f(r,s))}}},564:function(t,r,n){t.exports=n(565)},565:function(t,r,n){"use strict";n.r(r);n(566)},566:function(t,r,n){function e(t,r){var n;if("undefined"==typeof Symbol||null==t[Symbol.iterator]){if(Array.isArray(t)||(n=function(t,r){if(!t)return;if("string"==typeof t)return o(t,r);var n=Object.prototype.toString.call(t).slice(8,-1);"Object"===n&&t.constructor&&(n=t.constructor.name);if("Map"===n||"Set"===n)return Array.from(t);if("Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))return o(t,r)}(t))||r&&t&&"number"==typeof t.length){n&&(t=n);var e=0,i=function(){};return{s:i,n:function(){return e>=t.length?{done:!0}:{done:!1,value:t[e++]}},e:function(t){throw t},f:i}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var u,c=!0,f=!1;return{s:function(){n=t[Symbol.iterator]()},n:function(){var t=n.next();return c=t.done,t},e:function(t){f=!0,u=t},f:function(){try{c||null==n.return||n.return()}finally{if(f)throw u}}}}function o(t,r){(null==r||r>t.length)&&(r=t.length);for(var n=0,e=new Array(r);n<r;n++)e[n]=t[n];return e}n(134),n(135),n(146),n(147),n(93),n(80),n(99),n(110),n(119),n(153),n(137),function(){"use strict";window["moment-range"].extendMoment(moment);!function(t){var r=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"line",n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};n=Chart.helpers.merge({scales:{xAxes:[{display:!1,gridLines:{display:!1},type:"time",time:{unit:"day"}}]}},n);var o,i=[],u=[],c=moment().subtract(7,"days").format("YYYY-MM-DD"),f=moment().format("YYYY-MM-DD"),a=moment.range(c,f),s=e(a.by("days"));try{for(s.s();!(o=s.n()).done;){var l=o.value,p=Math.round(Math.floor(300*Math.random())+10);i.push({y:p,x:l.toDate()}),u.push({y:Math.round(.5*p),x:l.toDate()})}}catch(t){s.e(t)}finally{s.f()}i={datasets:[{label:"Conversion",data:u},{label:"Views",data:i}]};Charts.create(t,r,n,i)}("#viewsChart")}()},57:function(t,r,n){var e=n(0);t.exports=e},58:function(t,r,n){var e=n(31);t.exports=e&&!Symbol.sham&&"symbol"==typeof Symbol.iterator},59:function(t,r,n){"use strict";var e=n(18),o=n(7),i=n(14);t.exports=function(t,r,n){var u=e(r);u in t?o.f(t,u,i(0,n)):t[u]=n}},6:function(t,r,n){var e=n(0),o=n(25).f,i=n(9),u=n(13),c=n(21),f=n(56),a=n(55);t.exports=function(t,r){var n,s,l,p,y,v=t.target,d=t.global,g=t.stat;if(n=d?e:g?e[v]||c(v,{}):(e[v]||{}).prototype)for(s in r){if(p=r[s],l=t.noTargetGet?(y=o(n,s))&&y.value:n[s],!a(d?s:v+(g?".":"#")+s,t.forced)&&void 0!==l){if(typeof p==typeof l)continue;f(p,l)}(t.sham||l&&l.sham)&&i(p,"sham",!0),u(n,s,p,t)}}},60:function(t,r,n){var e=n(10),o=n(11),i=n(41),u=function(t){return function(r,n,u){var c,f=e(r),a=o(f.length),s=i(u,a);if(t&&n!=n){for(;a>s;)if((c=f[s++])!=c)return!0}else for(;a>s;s++)if((t||s in f)&&f[s]===n)return t||s||0;return!t&&-1}};t.exports={includes:u(!0),indexOf:u(!1)}},61:function(t,r){t.exports={}},65:function(t,r,n){var e=n(4),o=n(35),i=n(3)("species");t.exports=function(t,r){var n;return o(t)&&("function"!=typeof(n=t.constructor)||n!==Array&&!o(n.prototype)?e(n)&&null===(n=n[i])&&(n=void 0):n=void 0),new(void 0===n?Array:n)(0===r?0:r)}},66:function(t,r,n){var e=n(42),o=n(29);t.exports=Object.keys||function(t){return e(t,o)}},67:function(t,r,n){var e=n(68);t.exports=function(t,r,n){if(e(t),void 0===r)return t;switch(n){case 0:return function(){return t.call(r)};case 1:return function(n){return t.call(r,n)};case 2:return function(n,e){return t.call(r,n,e)};case 3:return function(n,e,o){return t.call(r,n,e,o)}}return function(){return t.apply(r,arguments)}}},68:function(t,r){t.exports=function(t){if("function"!=typeof t)throw TypeError(String(t)+" is not a function");return t}},69:function(t,r,n){var e=n(0),o=n(39),i=e.WeakMap;t.exports="function"==typeof i&&/native code/.test(o(i))},7:function(t,r,n){var e=n(5),o=n(38),i=n(8),u=n(18),c=Object.defineProperty;r.f=e?c:function(t,r,n){if(i(t),r=u(r,!0),i(n),o)try{return c(t,r,n)}catch(t){}if("get"in n||"set"in n)throw TypeError("Accessors not supported");return"value"in n&&(t[r]=n.value),t}},70:function(t,r,n){var e=n(20),o=n(37),i=n(48),u=n(8);t.exports=e("Reflect","ownKeys")||function(t){var r=o.f(u(t)),n=i.f;return n?r.concat(n(t)):r}},71:function(t,r,n){var e={};e[n(3)("toStringTag")]="z",t.exports="[object z]"===String(e)},72:function(t,r,n){var e=n(7).f,o=n(2),i=n(3)("toStringTag");t.exports=function(t,r,n){t&&!o(t=n?t:t.prototype,i)&&e(t,i,{configurable:!0,value:r})}},74:function(t,r,n){var e,o,i=n(0),u=n(85),c=i.process,f=c&&c.versions,a=f&&f.v8;a?o=(e=a.split("."))[0]+e[1]:u&&(!(e=u.match(/Edge\/(\d+)/))||e[1]>=74)&&(e=u.match(/Chrome\/(\d+)/))&&(o=e[1]),t.exports=o&&+o},77:function(t,r,n){"use strict";var e=n(8);t.exports=function(){var t=e(this),r="";return t.global&&(r+="g"),t.ignoreCase&&(r+="i"),t.multiline&&(r+="m"),t.dotAll&&(r+="s"),t.unicode&&(r+="u"),t.sticky&&(r+="y"),r}},79:function(t,r,n){var e=n(3),o=n(53),i=n(7),u=e("unscopables"),c=Array.prototype;null==c[u]&&i.f(c,u,{configurable:!0,value:o(null)}),t.exports=function(t){c[u][t]=!0}},8:function(t,r,n){var e=n(4);t.exports=function(t){if(!e(t))throw TypeError(String(t)+" is not an object");return t}},80:function(t,r,n){"use strict";var e=n(6),o=n(4),i=n(35),u=n(41),c=n(11),f=n(10),a=n(59),s=n(3),l=n(54),p=n(24),y=l("slice"),v=p("slice",{ACCESSORS:!0,0:0,1:2}),d=s("species"),g=[].slice,h=Math.max;e({target:"Array",proto:!0,forced:!y||!v},{slice:function(t,r){var n,e,s,l=f(this),p=c(l.length),y=u(t,p),v=u(void 0===r?p:r,p);if(i(l)&&("function"!=typeof(n=l.constructor)||n!==Array&&!i(n.prototype)?o(n)&&null===(n=n[d])&&(n=void 0):n=void 0,n===Array||void 0===n))return g.call(l,y,v);for(e=new(void 0===n?Array:n)(h(v-y,0)),s=0;y<v;y++,s++)y in l&&a(e,s,l[y]);return e.length=s,e}})},81:function(t,r){t.exports={CSSRuleList:0,CSSStyleDeclaration:0,CSSValueList:0,ClientRectList:0,DOMRectList:0,DOMStringList:0,DOMTokenList:1,DataTransferItemList:0,FileList:0,HTMLAllCollection:0,HTMLCollection:0,HTMLFormElement:0,HTMLSelectElement:0,MediaList:0,MimeTypeArray:0,NamedNodeMap:0,NodeList:1,PaintRequestList:0,Plugin:0,PluginArray:0,SVGLengthList:0,SVGNumberList:0,SVGPathSegList:0,SVGPointList:0,SVGStringList:0,SVGTransformList:0,SourceBufferList:0,StyleSheetList:0,TextTrackCueList:0,TextTrackList:0,TouchList:0}},85:function(t,r,n){var e=n(20);t.exports=e("navigator","userAgent")||""},9:function(t,r,n){var e=n(5),o=n(7),i=n(14);t.exports=e?function(t,r,n){return o.f(t,r,i(1,n))}:function(t,r,n){return t[r]=n,t}},90:function(t,r,n){var e=n(5),o=n(7),i=n(8),u=n(66);t.exports=e?Object.defineProperties:function(t,r){i(t);for(var n,e=u(r),c=e.length,f=0;c>f;)o.f(t,n=e[f++],r[n]);return t}},91:function(t,r,n){var e=n(20);t.exports=e("document","documentElement")},92:function(t,r,n){var e=n(71),o=n(15),i=n(3)("toStringTag"),u="Arguments"==o(function(){return arguments}());t.exports=e?o:function(t){var r,n,e;return void 0===t?"Undefined":null===t?"Null":"string"==typeof(n=function(t,r){try{return t[r]}catch(t){}}(r=Object(t),i))?n:u?o(r):"Object"==(e=o(r))&&"function"==typeof r.callee?"Arguments":e}},93:function(t,r,n){"use strict";var e=n(10),o=n(79),i=n(61),u=n(28),c=n(98),f=u.set,a=u.getterFor("Array Iterator");t.exports=c(Array,"Array",(function(t,r){f(this,{type:"Array Iterator",target:e(t),index:0,kind:r})}),(function(){var t=a(this),r=t.target,n=t.kind,e=t.index++;return!r||e>=r.length?(t.target=void 0,{value:void 0,done:!0}):"keys"==n?{value:e,done:!1}:"values"==n?{value:r[e],done:!1}:{value:[e,r[e]],done:!1}}),"values"),i.Arguments=i.Array,o("keys"),o("values"),o("entries")},94:function(t,r,n){var e=n(2),o=n(17),i=n(27),u=n(136),c=i("IE_PROTO"),f=Object.prototype;t.exports=u?Object.getPrototypeOf:function(t){return t=o(t),e(t,c)?t[c]:"function"==typeof t.constructor&&t instanceof t.constructor?t.constructor.prototype:t instanceof Object?f:null}},95:function(t,r,n){var e=n(16),o=n(12),i=function(t){return function(r,n){var i,u,c=String(o(r)),f=e(n),a=c.length;return f<0||f>=a?t?"":void 0:(i=c.charCodeAt(f))<55296||i>56319||f+1===a||(u=c.charCodeAt(f+1))<56320||u>57343?t?c.charAt(f):i:t?c.slice(f,f+2):u-56320+(i-55296<<10)+65536}};t.exports={codeAt:i(!1),charAt:i(!0)}},97:function(t,r,n){var e=n(57),o=n(2),i=n(103),u=n(7).f;t.exports=function(t){var r=e.Symbol||(e.Symbol={});o(r,t)||u(r,t,{value:i.f(t)})}},98:function(t,r,n){"use strict";var e=n(6),o=n(152),i=n(94),u=n(105),c=n(72),f=n(9),a=n(13),s=n(3),l=n(36),p=n(61),y=n(104),v=y.IteratorPrototype,d=y.BUGGY_SAFARI_ITERATORS,g=s("iterator"),h=function(){return this};t.exports=function(t,r,n,s,y,b,m){o(n,r,s);var S,x,O,w=function(t){if(t===y&&M)return M;if(!d&&t in P)return P[t];switch(t){case"keys":case"values":case"entries":return function(){return new n(this,t)}}return function(){return new n(this)}},j=r+" Iterator",A=!1,P=t.prototype,T=P[g]||P["@@iterator"]||y&&P[y],M=!d&&T||w(y),_="Array"==r&&P.entries||T;if(_&&(S=i(_.call(new t)),v!==Object.prototype&&S.next&&(l||i(S)===v||(u?u(S,v):"function"!=typeof S[g]&&f(S,g,h)),c(S,j,!0,!0),l&&(p[j]=h))),"values"==y&&T&&"values"!==T.name&&(A=!0,M=function(){return T.call(this)}),l&&!m||P[g]===M||f(P,g,M),p[r]=M,y)if(x={values:w("values"),keys:b?M:w("keys"),entries:w("entries")},m)for(O in x)(d||A||!(O in P))&&a(P,O,x[O]);else e({target:r,proto:!0,forced:d||A},x);return x}},99:function(t,r,n){var e=n(5),o=n(7).f,i=Function.prototype,u=i.toString,c=/^\s*function ([^ (]*)/;e&&!("name"in i)&&o(i,"name",{configurable:!0,get:function(){try{return u.call(this).match(c)[1]}catch(t){return""}}})}});
    </script>
    @endsection
