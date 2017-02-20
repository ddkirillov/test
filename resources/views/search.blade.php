@extends('layout')

@section('content')

<?php $edit = isset($person); ?>
<h4>Поиск</h4>
<form method='POST' action='/search'>
<?=csrf_field()?>
<input type='text' id='search_string' name='search_string' required>

<button type='submit'>Найти</button>
</form>
<sub>*поиск заданной фразы по всем полям</sub>

@endsection

