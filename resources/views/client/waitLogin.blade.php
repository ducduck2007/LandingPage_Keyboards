<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    Signing in for you.................
    {{-- <img src="{{ asset('assets\images\howToOpenBrower1.png') }}" id="howToOpenBrower1" width="100%" height="auto" alt=""> --}}
    <img src="{{ asset('assets\images\howToOpenBrower3.png') }}" id="howToOpenBrower2" width="100%" height="auto"
        alt="">

    <script>
       // isInTelegramWebView();
        const referrer = document.referrer.toLowerCase();
        //alert(referrer);
        if (referrer.includes('http'))
        {
            console.log('Đang mở trong Telegram WebView.');
        }
        else
        {
            console.log('Đang mở trên Google Chorme');
            document.getElementById("howToOpenBrower2").style.display = "none";
            var array = @json($array);
            array.forEach(function(value, index) {
                sessionStorage.setItem(index, value);
            });

            array.forEach(function(value, index) {
                console.log('Saved session' + index + ':', sessionStorage.getItem(index));
            });

            setTimeout(function() {
                window.location.href = "{{ route('client.home') }}";
            }, 5000);
        }
    </script>
    
    {{-- <script>
        var array = @json($array);
        array.forEach(function(value, index) {
            sessionStorage.setItem(index, value);
        });

        array.forEach(function(value, index) {
            console.log('Saved session' + index + ':', sessionStorage.getItem(index));
        });

        setTimeout(function() {
            window.location.href = "{{ route('client.home') }}";
        }, 5000);
    </script> --}}
</body>

</html>
