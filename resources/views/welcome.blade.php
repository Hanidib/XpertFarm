
<body>

<ul>
    @foreach($users as $user)
        <li>
            <p><b>full-name:</b>{{$user['full-name']}}</p>
            <p><b>email:</b><a href="/tasks/{{$user['id']}}">{{$user['email']}}</a></p>
            <p><b>phone:</b>{{$user['phone']}}</p>
            <a href="/task/{{$user['id']}}">
            </a>
        </li>
    @endforeach

</ul>

</body>

