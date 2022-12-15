<div class="js-cookie-consent cookie-consent">
    <div class="alert alert-warning alert-dismissible fade show text-center text-red-500" role="alert" style="margin-bottom: 0rem !important;">
        <span class="cookie-consent__message">
            {!! trans('cookieConsent::texts.message') !!}
        </span>

        <button class="js-cookie-consent-agree cookie-consent__agree btn btn-sm btn-primary">
            {{ trans('cookieConsent::texts.agree') }}
        </button>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>