<body>

    <b>Name:</b>{{$tasks['task_name']}}
    <br>
    <br>
    <b>Description:</b>{{$tasks['description']}}
    <br>
    <br>
    <b>due_date:</b>{{$tasks['due_date']}}
    <br>
    <br>
    @if($tasks['status'])
        <b>Status:</b>done
    @else
        <b>Status:</b>Pending
    @endif
</body>
