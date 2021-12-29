<script src="{{ asset('front/libs/jquery-3.1.0.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="{{ asset('front/libs/fontawesome-pro-5.14.0-web/js/all.min.js') }}"></script>
<script src="{{ asset('front/libs/WOW-master/WOW-master/dist/wow.min.js') }}"></script>
<script src="{{ asset('front/js/script.js') }}"></script>
<script src="{{ asset('front/js/ServicesDetails.js') }}"></script>
<script>
    $("#send_letter").click(function() {
        var email = $('#emailletter').val();


        $.ajax({
            url: '{{ route('subscribe') }}',
            type: 'post',
            dataType: 'html',
            data: {
                "_token": "{{ csrf_token() }}",
                email: email
            },
            success: function(data) {
                if (data=='true') {
                    toastr.options.closeButton = true;
                    toastr.options.closeMethod = 'fadeOut';
                    toastr.options.closeDuration = 100;
                    toastr.success('{{ __('Done successfully') }}');
                    $('#emailletter').val("");

                } else {
                    toastr.options.closeButton = true;
                    toastr.options.closeMethod = 'fadeOut';
                    toastr.options.closeDuration = 100;
                    toastr.error('{{ __('Already registeredsubscribe') }}');
                }
            }


        });

    });
</script>

</body>

</html>
