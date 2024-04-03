<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Step Form</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    @livewireStyles
</head>
<body>

   <div class="container">
       <div class="row" style="margin-top:50px">
             <div class="col-md-6 offset-md-3">
                 @livewire('step-form')
             </div>
       </div>
   </div>

    @livewireScripts
</body>
</html>
