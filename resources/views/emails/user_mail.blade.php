<!DOCTYPE html>
<html>
<head>
    <title>{{ $details['title'] }}</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p>
        مرحبا بك . لقد قمت للتو بحجز عاملة جديد .
        يرجى الذهاب الى لوحة التحكم خاصتك والتواصل مع مكتب الخادمة في مدة اقصاها {{ get_general_value('allowed_days') }} ايام
      
      <br>
        حيث يبدأ بتاريخ :  {{$details['start_date']  }},<br>
       وينتهي بتاريخ:  {{ $details['end_date'] }}

    </p>
   
    <p>شكرا لك</p>
</body>
</html>