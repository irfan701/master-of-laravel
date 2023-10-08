<!DOCTYPE html>
<html>
<head>
    <title>MIH</title>
</head>
<body>

<h1>Dear Admin ,</h1>
<p>Latest User List</p>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="table">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                </thead>
                <tbody>
                @foreach($mailData as $row)
                    <tr>
                        <td>{{$row['name']}}</td>
                        <td>{{$row['email']}}</td>
                    </tr>
                @endforeach

                </tbody>
            </div>
        </div>
    </div>
</div>

<p>Thank you</p>
</body>
</html>
