<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        .d-inline {
            display: inline-block;
        }

        input[type='radio']:checked:after {
            background-color: #0C445C;
        }
    </style>
</head>

<body class="antialiased">
    <h1>form !!!</h1>
    <br><br><br>
    <form name="myform" onsubmit="return OnSubmitForm();">
        name: <input type="text" name="name"><br>
        email: <input type="text" name="email"><br>
        <input type="radio" name="search" value="1" checked>insert
        <input type="radio" name="search" value="2">update
        <br><br>

        <button type="submit" value="send">send</button>
    </form>

    <script type="text/javascript">
        function OnSubmitForm() {
            if (document.myform.search[0].checked == true) {
                document.myform.action = "{{url ('test1')}}";
            } else
            if (document.myform.search[1].checked == true) {
                document.myform.action = "update.html";
            }
            return true;
        }
    </script>
</body>

</html>
