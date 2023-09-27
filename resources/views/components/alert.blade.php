<link rel="stylesheet" href="{{ asset('css/notyf.min.css') }}">
<script src="{{ asset('js/notyf.min.js') }}"></script>
<script>
    let notyf = new Notyf({
        dismissible: true,
        duration: 5000,
        ripple: true,
        position: {
            x: 'right',
            y: 'top'
        },
    });

    @if (session('status'))
        notyf.success('{{ session('status') }}');
    @endif

    @if (session('success'))
        notyf.success('{{ session('success') }}');
    @endif

    @if (session('error'))
        notyf.error('{{ session('error') }}');
    @endif

    @if (session('custom'))
        notyf.error('{{ session('custom') }}');
    @endif

    @if (session('status') == 'two-factor-authentication-enabled')
        notyf.success('Two factor authentication has been enabled.');
    @endif

    @if (session('status') == 'two-factor-authentication-disabled')
        notyf.error('Two factor authentication has been disabled.');
    @endif

    @if (session('status') == 'recovery-codes-generated')
        notyf.success('Recovery codes have been regenerated.');
    @endif

    @if (session('message'))
        notyf.error('{{ session('message') }}');
    @endif

    @if (session('status') == 'verification-link-sent')
        notyf.success('A new email verification link has been emailed to you!');
    @endif
</script>
