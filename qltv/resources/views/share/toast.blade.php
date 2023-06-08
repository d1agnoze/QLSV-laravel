<script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error({{ $error }}, 'ERROR!')
        @endforeach
    @endif
    @if (Session::has('error'))

        toastr.error({{ Session::get('error') }}, 'ERROR!')
    @endif
    @if (Session::has('success'))
        toastr.success(`{{ Session::get('success') }}`, 'success!')
    @endif
</script>

