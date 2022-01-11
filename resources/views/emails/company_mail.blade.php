<!DOCTYPE html>
<html>
<head>
    <title>{{ $details['title'] }}</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p>
        مرحبا بك . لقد قام مستخدم بحجز خادمة من مكتبك      .
        يرجى الذهاب الى لوحة التحكم خاصتك والتواصل مع المستخدم في مدة اقصاها  {{ get_general_value('allowed_days') }} أيام
        <br>
        حيث يبدأ بتاريخ :  {{$details['start_date']  }},
        <br>
       وينتهي بتاريخ:  {{ $details['end_date'] }}

    </p>
   
    <p>شكرا لك</p>
</body>
</html>