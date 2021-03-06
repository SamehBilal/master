@if (session('status'))
    <div class="toaster"
         data-toggle="toastr"
         data-toastr-type="success"
         data-toastr-title="Great!"
         data-toastr-message="{{ session('status') }}"
         data-toastr-show-method="slideDown"
         data-toastr-hide-method="slideUp"
         data-toastr-close-method="slideUp"
         data-toastr-progress-bar="true"
         data-toastr-close-button="true">
    </div>
@section('extra-scripts-alerts')

    <!-- Toastr -->
    <script src="{{ asset('backend/vendor/toastr.min.js') }}"></script>
    <script>
        !(function (t) {
            var a = {};
            function o(e) {
                if (a[e]) return a[e].exports;
                var r = (a[e] = { i: e, l: !1, exports: {} });
                return t[e].call(r.exports, r, r.exports, o), (r.l = !0), r.exports;
            }
            (o.m = t),
                (o.c = a),
                (o.d = function (t, a, e) {
                    o.o(t, a) || Object.defineProperty(t, a, { enumerable: !0, get: e });
                }),
                (o.r = function (t) {
                    "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(t, Symbol.toStringTag, { value: "Module" }), Object.defineProperty(t, "__esModule", { value: !0 });
                }),
                (o.t = function (t, a) {
                    if ((1 & a && (t = o(t)), 8 & a)) return t;
                    if (4 & a && "object" == typeof t && t && t.__esModule) return t;
                    var e = Object.create(null);
                    if ((o.r(e), Object.defineProperty(e, "default", { enumerable: !0, value: t }), 2 & a && "string" != typeof t))
                        for (var r in t)
                            o.d(
                                e,
                                r,
                                function (a) {
                                    return t[a];
                                }.bind(null, r)
                            );
                    return e;
                }),
                (o.n = function (t) {
                    var a =
                        t && t.__esModule
                            ? function () {
                                return t.default;
                            }
                            : function () {
                                return t;
                            };
                    return o.d(a, "a", a), a;
                }),
                (o.o = function (t, a) {
                    return Object.prototype.hasOwnProperty.call(t, a);
                }),
                (o.p = "/"),
                o((o.s = 646));
        })({
            2259: function (t, a, o) {
                "use strict";
                o.r(a);
                o(647);
            },
            646: function (t, a, o) {
                t.exports = o(2259);
            },
            647: function (t, a) {
                !(function () {
                    "use strict";
                    (toastr.primary = function (t, a, o) {
                        return this.success(t, a, $.extend({ iconClass: "toast-primary" }, o));
                    }),
                        $('.page__container').ready( function () {
                            var a = $('.toaster'),
                                o = a.data("toastr-type") || "success",
                                e = a.data("toastr-message"),
                                r = a.data("toastr-title"),
                                s = {
                                    closeButton: void 0 !== a.data("toastr-close-button") && a.data("toastr-close-button"),
                                    debug: !1,
                                    newestOnTop: void 0 === a.data("toastr-newest-on-top") || a.data("toastr-newest-on-top"),
                                    progressBar: void 0 === a.data("toastr-progress-bar") || a.data("toastr-progress-bar"),
                                    positionClass: void 0 !== a.data("toastr-position-class") ? a.data("toastr-position-class") : "toast-top-right",
                                    preventDuplicates: void 0 !== a.data("toastr-prevent-duplicates") && a.data("toastr-prevent-duplicates"),
                                    onclick: null,
                                    showDuration: void 0 !== a.data("toastr-show-duration") ? a.data("toastr-show-duration") : 300,
                                    hideDuration: void 0 !== a.data("toastr-hide-duration") ? a.data("toastr-hide-duration") : 1e3,
                                    timeOut: void 0 !== a.data("toastr-time-out") ? a.data("toastr-time-out") : 5e3,
                                    extendedTimeOut: void 0 !== a.data("toastr-extended-time-out") ? a.data("toastr-extended-time-out") : 1e3,
                                    showEasing: void 0 !== a.data("toastr-show-easing") ? a.data("toastr-show-easing") : "swing",
                                    hideEasing: void 0 !== a.data("toastr-hide-easing") ? a.data("toastr-hide-easing") : "linear",
                                    showMethod: void 0 !== a.data("toastr-show-method") ? a.data("toastr-show-method") : "fadeIn",
                                    hideMethod: void 0 !== a.data("toastr-hide-method") ? a.data("toastr-hide-method") : "fadeOut",
                                };
                            toastr[o](e, r, s);
                        });
                })();
            },
        });

    </script>
@endsection
@endif

@if($message = \Illuminate\Support\Facades\Session::get('success'))
    <div class="toaster"
         data-toggle="toastr"
         data-toastr-type="success"
         data-toastr-title="Great!"
         data-toastr-message="{{ $message }}"
         data-toastr-show-method="slideDown"
         data-toastr-hide-method="slideUp"
         data-toastr-close-method="slideUp"
         data-toastr-progress-bar="true"
         data-toastr-close-button="true">
    </div>
@section('extra-scripts-alerts')

    <!-- Toastr -->
    <script src="{{ asset('backend/vendor/toastr.min.js') }}"></script>
    <script>
        !(function (t) {
            var a = {};
            function o(e) {
                if (a[e]) return a[e].exports;
                var r = (a[e] = { i: e, l: !1, exports: {} });
                return t[e].call(r.exports, r, r.exports, o), (r.l = !0), r.exports;
            }
            (o.m = t),
                (o.c = a),
                (o.d = function (t, a, e) {
                    o.o(t, a) || Object.defineProperty(t, a, { enumerable: !0, get: e });
                }),
                (o.r = function (t) {
                    "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(t, Symbol.toStringTag, { value: "Module" }), Object.defineProperty(t, "__esModule", { value: !0 });
                }),
                (o.t = function (t, a) {
                    if ((1 & a && (t = o(t)), 8 & a)) return t;
                    if (4 & a && "object" == typeof t && t && t.__esModule) return t;
                    var e = Object.create(null);
                    if ((o.r(e), Object.defineProperty(e, "default", { enumerable: !0, value: t }), 2 & a && "string" != typeof t))
                        for (var r in t)
                            o.d(
                                e,
                                r,
                                function (a) {
                                    return t[a];
                                }.bind(null, r)
                            );
                    return e;
                }),
                (o.n = function (t) {
                    var a =
                        t && t.__esModule
                            ? function () {
                                return t.default;
                            }
                            : function () {
                                return t;
                            };
                    return o.d(a, "a", a), a;
                }),
                (o.o = function (t, a) {
                    return Object.prototype.hasOwnProperty.call(t, a);
                }),
                (o.p = "/"),
                o((o.s = 646));
        })({
            2259: function (t, a, o) {
                "use strict";
                o.r(a);
                o(647);
            },
            646: function (t, a, o) {
                t.exports = o(2259);
            },
            647: function (t, a) {
                !(function () {
                    "use strict";
                    (toastr.primary = function (t, a, o) {
                        return this.success(t, a, $.extend({ iconClass: "toast-primary" }, o));
                    }),
                        setTimeout(
                        $('.page__container').ready( function () {
                            var a = $('.toaster'),
                                o = a.data("toastr-type") || "success",
                                e = a.data("toastr-message"),
                                r = a.data("toastr-title"),
                                s = {
                                    closeButton: void 0 !== a.data("toastr-close-button") && a.data("toastr-close-button"),
                                    debug: !1,
                                    newestOnTop: void 0 === a.data("toastr-newest-on-top") || a.data("toastr-newest-on-top"),
                                    progressBar: void 0 === a.data("toastr-progress-bar") || a.data("toastr-progress-bar"),
                                    positionClass: void 0 !== a.data("toastr-position-class") ? a.data("toastr-position-class") : "toast-top-right",
                                    preventDuplicates: void 0 !== a.data("toastr-prevent-duplicates") && a.data("toastr-prevent-duplicates"),
                                    onclick: null,
                                    showDuration: void 0 !== a.data("toastr-show-duration") ? a.data("toastr-show-duration") : 300,
                                    hideDuration: void 0 !== a.data("toastr-hide-duration") ? a.data("toastr-hide-duration") : 1e3,
                                    timeOut: void 0 !== a.data("toastr-time-out") ? a.data("toastr-time-out") : 5e3,
                                    extendedTimeOut: void 0 !== a.data("toastr-extended-time-out") ? a.data("toastr-extended-time-out") : 1e3,
                                    showEasing: void 0 !== a.data("toastr-show-easing") ? a.data("toastr-show-easing") : "swing",
                                    hideEasing: void 0 !== a.data("toastr-hide-easing") ? a.data("toastr-hide-easing") : "linear",
                                    showMethod: void 0 !== a.data("toastr-show-method") ? a.data("toastr-show-method") : "fadeIn",
                                    hideMethod: void 0 !== a.data("toastr-hide-method") ? a.data("toastr-hide-method") : "fadeOut",
                                };
                            toastr[o](e, r, s);
                        })
                , 300000);
                })();
            },
        });

    </script>
@endsection
@endif

@if($errors->any())
    <div class="toaster"
         data-toggle="toastr"
         data-toastr-type="error"
         data-toastr-title="Opps!"
         data-toastr-message="@foreach($errors->all() as $error)
         {{$error}} <br>
         @endforeach"
         data-toastr-show-method="slideDown"
         data-toastr-hide-method="slideUp"
         data-toastr-close-method="slideUp"
         data-toastr-progress-bar="true"
         data-toastr-close-button="true">
    </div>
    {{--data-toastr-time-out="0"
    data-toastr-extended-time-out="0"
    data-toastr-progress-bar="false"--}}
@section('extra-scripts-alerts')

    <!-- Toastr -->
    <script src="{{ asset('backend/vendor/toastr.min.js') }}"></script>
    <script>
        !(function (t) {
            var a = {};
            function o(e) {
                if (a[e]) return a[e].exports;
                var r = (a[e] = { i: e, l: !1, exports: {} });
                return t[e].call(r.exports, r, r.exports, o), (r.l = !0), r.exports;
            }
            (o.m = t),
                (o.c = a),
                (o.d = function (t, a, e) {
                    o.o(t, a) || Object.defineProperty(t, a, { enumerable: !0, get: e });
                }),
                (o.r = function (t) {
                    "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(t, Symbol.toStringTag, { value: "Module" }), Object.defineProperty(t, "__esModule", { value: !0 });
                }),
                (o.t = function (t, a) {
                    if ((1 & a && (t = o(t)), 8 & a)) return t;
                    if (4 & a && "object" == typeof t && t && t.__esModule) return t;
                    var e = Object.create(null);
                    if ((o.r(e), Object.defineProperty(e, "default", { enumerable: !0, value: t }), 2 & a && "string" != typeof t))
                        for (var r in t)
                            o.d(
                                e,
                                r,
                                function (a) {
                                    return t[a];
                                }.bind(null, r)
                            );
                    return e;
                }),
                (o.n = function (t) {
                    var a =
                        t && t.__esModule
                            ? function () {
                                return t.default;
                            }
                            : function () {
                                return t;
                            };
                    return o.d(a, "a", a), a;
                }),
                (o.o = function (t, a) {
                    return Object.prototype.hasOwnProperty.call(t, a);
                }),
                (o.p = "/"),
                o((o.s = 646));
        })({
            2259: function (t, a, o) {
                "use strict";
                o.r(a);
                o(647);
            },
            646: function (t, a, o) {
                t.exports = o(2259);
            },
            647: function (t, a) {
                !(function () {
                    "use strict";
                    (toastr.primary = function (t, a, o) {
                        return this.success(t, a, $.extend({ iconClass: "toast-primary" }, o));
                    }),
                        $('.page__container').ready( function () {
                            var a = $('.toaster'),
                                o = a.data("toastr-type") || "success",
                                e = a.data("toastr-message"),
                                r = a.data("toastr-title"),
                                s = {
                                    closeButton: void 0 !== a.data("toastr-close-button") && a.data("toastr-close-button"),
                                    debug: !1,
                                    newestOnTop: void 0 === a.data("toastr-newest-on-top") || a.data("toastr-newest-on-top"),
                                    progressBar: void 0 === a.data("toastr-progress-bar") || a.data("toastr-progress-bar"),
                                    positionClass: void 0 !== a.data("toastr-position-class") ? a.data("toastr-position-class") : "toast-top-right",
                                    preventDuplicates: void 0 !== a.data("toastr-prevent-duplicates") && a.data("toastr-prevent-duplicates"),
                                    onclick: null,
                                    showDuration: void 0 !== a.data("toastr-show-duration") ? a.data("toastr-show-duration") : 300,
                                    hideDuration: void 0 !== a.data("toastr-hide-duration") ? a.data("toastr-hide-duration") : 1e3,
                                    timeOut: void 0 !== a.data("toastr-time-out") ? a.data("toastr-time-out") : 5e3,
                                    extendedTimeOut: void 0 !== a.data("toastr-extended-time-out") ? a.data("toastr-extended-time-out") : 1e3,
                                    showEasing: void 0 !== a.data("toastr-show-easing") ? a.data("toastr-show-easing") : "swing",
                                    hideEasing: void 0 !== a.data("toastr-hide-easing") ? a.data("toastr-hide-easing") : "linear",
                                    showMethod: void 0 !== a.data("toastr-show-method") ? a.data("toastr-show-method") : "fadeIn",
                                    hideMethod: void 0 !== a.data("toastr-hide-method") ? a.data("toastr-hide-method") : "fadeOut",
                                };
                            toastr[o](e, r, s);
                        });
                })();
            },
        });

    </script>
@endsection
@endif
