<ul>
@foreach($users as $user)
<li>Имя: {{ $user[name] }}<span>возраст: {{ $user[age] }}</span></li>
@endforeach
</ul>
