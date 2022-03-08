<!DOCTYPE html>
       
<html lang="{{ $data_mail['language'] }}" >
    <head>
       
        <style>
            .t{
                color:#333;
                font-size: 17px;
            }
        </style>

</head>

    <body dir="{{  $data_mail['language']  === 'ar' ? 'rtl' : 'ltr' }}">

       <h5 class='t'> {{ __('Welcome')}} {{ $data_mail['first_name'] }},</h5>

       <p class='t'>{{ __($data_mail['content']) }} </p>
      
      <div class='t'>
        <a href="{{$data_mail['url']}}" class="t" style='color:dodgerblue'>
                {{$data_mail['url']}}
        </a>
      </div>

        <p class='t' style='margin-bottom:0;'>{{ __('Best Regards,')}} </p>
        <span class='t' style='font-weight:500;'> HITCOM ADMIN</span>
    </body>
</html>
