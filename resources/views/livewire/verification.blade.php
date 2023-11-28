<style>
    .my-img{
        position: relative;
        width: 100vw;
        height: 100vh;
    }
    .back{
        position: absolute;
        top: 50%;
        left: 2%;
        transform: translateX(-50%);
        transform: translateY(-50%);
    }
    .con-box{
        position: relative;
        padding: 1em;
        border: 1px solid rgba(17, 0, 255, 0.26);
        border-radius: 10px;
        width: 95vw;
        height: 400px;
        backdrop-filter: blur(4px);
    }
    .time{
        position: absolute;
        top: 0;   
        font-size: 20px;
        font-weight: bold; 
    }
    #verificationForm{
        position: absolute;
        top: 120px;
        padding: 1em;
        left: 50%;
        transform: translate(-50%);
        width: 30vw;
        background: rgba(255, 255, 255, 0.329);
        backdrop-filter: blur(5px);
    }
    #resendOtpVerification{
        position: absolute;
        bottom: 0;
    }
    #message_error,#message_success{
        position: absolute;
        right: 0;

    }
    .success-text{
        position: absolute;
        text-align: center;
        display: none;
    }
    @media screen only (max-width:420px){
        .my-img{
            width:420px;
            height:400px;
        }
        .con-box{
            width:90vw;
            height:50vh;
        }
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
<img class="my-img" src="https://cdn.pixabay.com/photo/2015/04/19/08/32/marguerite-729510_1280.jpg" alt="" srcset="">
<div class="back">
    <div class="con-box">
        <p id="message_error" class="me-2 mt-2 text-danger"></p>
        <p id="message_success" class="me-2 mt-2 text-success"></p>
        <p class="alert alert-success success-text">Mail has been verified</p>
        <form method="post" id="verificationForm">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">
            <input type="number" name="otp" class="form-control" placeholder="Enter OTP" required>
            <br><br>
            <input type="submit" class="btn btn-secondary" value="Verify">
        </form>
        <p class="time mt-2 ms-2"></p>
        
        <button id="resendOtpVerification" class="btn btn-secondary mb-2 ms-2">Resend Verification OTP</button>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>

    $(document).ready(function(){
        $('#verificationForm').submit(function(e){
            e.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url:"{{ route('verifiedOtp') }}",
                type:"POST",
                data: formData,
                success:function(res){
                    if(res.success){
                        // alert(res.msg);
                        $('.success-text').fadeIn();
                        setTimeout(() => {
                            $('.success-text').fadeOut(function(){
                                window.open("/login","_self"); //redirect to '/'
                            });
                        }, 4000);

                    }
                    else{
                        $('#message_error').text(res.msg);
                        setTimeout(() => {
                            $('#message_error').text('');
                        }, 3000);
                    }
                }
            });

        });

        $('#resendOtpVerification').click(function(){
            $(this).text('Wait...');
            var userMail = @json($email);

            $.ajax({
                url:"{{ route('resendOtp') }}",
                type:"GET",
                data: {email:userMail },
                success:function(res){
                    $('#resendOtpVerification').text('Resend Verification OTP');
                    if(res.success){
                        timer();
                        $('#message_success').text(res.msg);
                        setTimeout(() => {
                            $('#message_success').text('');
                        }, 3000);
                    }
                    else{
                        $('#message_error').text(res.msg);
                        setTimeout(() => {
                            $('#message_error').text('');
                        }, 3000);
                    }
                }
            });

        });
    });

    function timer()
    {
        var seconds = 30;
        var minutes = 1;

        var timer = setInterval(() => {

            if(minutes < 0){
                $('.time').text('');
                clearInterval(timer);
            }
            else{
                let tempMinutes = minutes.toString().length > 1? minutes:'0'+minutes;
                let tempSeconds = seconds.toString().length > 1? seconds:'0'+seconds;

                $('.time').text(tempMinutes+':'+tempSeconds);
            }

            if(seconds <= 0){
                minutes--;
                seconds = 59;
            }

            seconds--;

        }, 1000);
    }

    timer();

</script>
