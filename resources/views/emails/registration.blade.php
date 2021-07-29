<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME','smart school')}}</title>
    <style>
    .tables{
        border: 1px solid;
        border-collapse: collapse;
        width: 100%
    }
    .tables tr {
        border: 1px solid;
    }
    .tables tr td {
        border: 1px solid;
    }
    </style>
</head>
<body>
@component('mail::message')
<h1>{{$details['title']}}</h1>
<p>{{$details['body']}}</p>
<table class="tables">
    <tr>
        <td>Name</td>
        <td>School ID</td>
        <td>username</td>
        <td>password</td>
        <td>status</td>
    </tr>
    <tr>
        <td>{{$details['name']}}</td>
        <td>{{$details['school_id']}}</td>
        <td>{{$details['username']}}</td>
        <td>{{$details['password']}}</td>
        <td>{{$details['status']}}</td>
    </tr>
</table>
@component('mail::button',['url'=>$details['url']])
Go to link
@endcomponent
</p>
@endcomponent
<p>Thank you !</p>
</body>
</html>
