<div class="app-wrapper-footer">
    <div class="app-footer">
        <div class="app-footer__inner justify-content-center">
            <div>
                <em>{{ env('APP_NAME', 'Davina\'s CMS') }} &copy; {{ env('APP_AUTHOR', 'Davina\'s CMS') }},
                    {{ now()->format('Y') > 2022 ? '2022 - ' . now()->format('Y') : now()->format('Y') }}</em>
            </div>
        </div>
    </div>
</div>
