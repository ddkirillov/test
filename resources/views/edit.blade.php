@extends('layout')

@section('content')

<?php $edit = isset($person); ?>
<h4><?=($edit ? 'Изменить запись': 'Добавить запись')?>:</h4>
<form method='POST' action='/edit'>
<table>
<tr><td>Имя:</td><td><input value='<?=($edit ? $person->name : '')?>' type='text' id='name' name='name' required></td></tr>
<tr><td>Фамилия:</td><td><input value='<?=($edit ? $person->surname : '')?>' type='text' id='surname' name='surname' required></td></tr>
<tr><td>Компания:</td><td><input value='<?=($edit ? $person->company : '')?>' type='text' id='company' name='company'></td></tr>
<tr><td>Должность:</td><td><input value='<?=($edit ? $person->position : '')?>' type='text' id='position' name='position'></td></tr>
<tr><td>E-mail:</td><td><input value='<?=($edit ? $person->email : '')?>' type='text' id='email' name='email'></td></tr>
<tr><td>Телефон:</td><td><input value='<?=($edit ? $person->phone : '')?>' type='text' id='phone' name='phone'></td></tr>
<tr><td colspan='2'><button type='submit'><?=$edit ? 'Изменить' : 'Добавить'?></button></td></tr>
</table>
<?=csrf_field()?>
<input value='<?=($edit ? $person->id : '')?>' type='hidden' id='id' name='id'>
</form>

@endsection

