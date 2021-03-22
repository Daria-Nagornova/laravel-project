<ul>
@foreach($users as $user)
<li>Имя: {{ $user['name'] }}<p>возраст: {{ $user['age'] }}</p></li>
@endforeach
</ul>
