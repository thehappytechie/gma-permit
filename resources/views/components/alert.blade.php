<link rel="stylesheet" href="{{ asset('css/notyf.min.css') }}">
<script src="{{ asset('js/notyf.min.js') }}"></script>

@if (session('success'))
    <script>
        let notyf = new Notyf({
            dismissible: true,
            duration: 0,
            ripple: true,
            position: {
                x: 'right',
                y: 'top'
            },
        })
        notyf.success('{{ session('success') }}')
    </script>
@endif

@if (session('error'))
    <script>
        let notyf = new Notyf({
            dismissible: true,
            duration: 0,
            ripple: true,
            position: {
                x: 'right',
                y: 'top'
            },
        })
        notyf.error('{{ session('error') }}')
    </script>
@endif

@if (session('status') == 'two-factor-authentication-enabled')
    <script>
        let notyf = new Notyf({
            dismissible: true,
            duration: 0,
            ripple: true,
            position: {
                x: 'right',
                y: 'top'
            },
        })
        notyf.success('Two factor authentication has been enabled.')
    </script>
@endif

@if (session('status') == 'two-factor-authentication-disabled')
    <script>
        let notyf = new Notyf({
            dismissible: true,
            duration: 0,
            ripple: true,
            position: {
                x: 'right',
                y: 'top'
            },
        })
        notyf.error('Two factor authentication has been disabled.')
    </script>
@endif

@if (session('status') == 'recovery-codes-generated')
    <script>
        let notyf = new Notyf({
            dismissible: true,
            duration: 0,
            ripple: true,
            position: {
                x: 'right',
                y: 'top'
            },
        })
        notyf.success('Recovery codes have been regenerated.')
    </script>
@endif

@if (session('status'))
    <script>
        let notyf = new Notyf({
            dismissible: true,
            duration: 0,
            ripple: true,
            position: {
                x: 'right',
                y: 'top'
            },
        })
        notyf.success('{{ session('status') }}')
    </script>
@endif

@if (session('message'))
    <script>
        let notyf = new Notyf({
            dismissible: true,
            duration: 0,
            ripple: true,
            position: {
                x: 'right',
                y: 'top'
            },
        })
        notyf.error('{{ session('message') }}')
    </script>
@endif

@if (session('status') == 'verification-link-sent')
    <script>
        let notyf = new Notyf({
            dismissible: true,
            duration: 0,
            ripple: true,
            position: {
                x: 'right',
                y: 'top'
            },
        })
        notyf.success('A new email verification link has been emailed to you!')
    </script>
@endif
