<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admitted</title>
    <style>

        h2{
            /* font-weight: bold; */
            padding:10px;
            text-align: center;
            border-radius: 2em;
            width: max-content;
        }

        .container{
            display: table;
            margin: 0 auto;
        }

        .content{
            width: 90%;
            background-color: white;
            text-align: center;
            font-size: 20px;
            padding: 20px
        }
        table {
            border-collapse: collapse;
            width: 100%;
            }

    td {
        text-align: left;
        padding: 8px;
        border-bottom: 2px solid #ddd;
    }
    tr:nth-child(even) {
    background-color: #f5f5f5;
    }


    </style>
</head>
<body>
    <div class="container">
    <h2>Hi <strong>{{ ucwords($user->title. " ". $user->first_name ." " .$user->last_name) }}</strong></h2>
        <h1>Your account has been created successfully</h1>
      
        <h4>Here are your login details</h4>
        <p>Email: {{ $user->email }}</p>
        <p>Password: {{ $user->raw_password }}</p>
        
        <h4>You can reset your password here</h4>
        <h5>You can reset your password <a href="{{ URL::to('/password/reset') }}">here</a>.</h5>        
        <h2 style="float:right; margin-right:20px"><i>Thanks You!</i></h2>

</div>
</body>
</html>
