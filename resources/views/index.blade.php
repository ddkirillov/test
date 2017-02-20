@extends('layout')

@section('content')

<h4><?=(isset($search_string) ? "Результат поиска \"$search_string\"": 'Адресная книга')?></h4>
<?php if (count($people)): ?>
<table border='1'>
<tr>
<td></td>
<td>Имя</td>
<td>Фамилия</td>
<td>Компания</td>
<td>Должность</td>
<td>E-mail</td>
<td>Телефон</td>
<td colspan='2'></td>
</tr>
<?php
$i = 1;
foreach ($people as $person):
?>
<tr>
<td><?=$i?></td>
<td><?= $person->name ?></td>
<td><?= $person->surname ?></td>
<td><?= $person->company ?></td>
<td><?= $person->position ?></td>
<td><?= $person->email ?></td>
<td><?= $person->phone ?></td>
<td><a title='Изменить' href='/edit/<?= $person->id?>'>Изм.</a></td>
<td><a title='Удалить' href='/delete/<?= $person->id?>'>X</a></td>
</tr>
<?php
$i++;
endforeach; 
?>
</table>
<?php else: ?>
<i>Нет ни одной записи...</i>
<?php endif; ?>

@endsection
