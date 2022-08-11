<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
</head>
<body>
    <table>
        <tr>
            <td>Dear {{ $name }} !</td><br>
        </tr>
        <tr>
            <td>
                You have requested to recover your password , New password details are as below : <br> <br>
            </td>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Password  : {{ $password }}</td>
            </tr>

            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Thanks with Regards ,</td>
            </tr>
            <tr>
                <td>V-shop website</td>
            </tr>

        </tr>
    </table>
</body>
</html>
