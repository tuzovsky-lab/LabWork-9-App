@extends('link/layout')

@section('content')

<style>
  .push-top {
    margin-top: 50px;
  }
</style>

<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table">
    <thead>
      <tr class="table-warning">
        <td>Номер</td>
        <td>Заголовок</td>
        <td>URL-адрес</td>
        <td>Описание</td>
        <td class="text-center">Действия</td>
      </tr>
    </thead>
    <tbody>
      @foreach($link as $lnk)
        <tr>
          <td>{{$lnk->id}}</td>
          <td>{{$lnk->title}}</td>
          <td>{{$lnk->url}}</td>
          <td>{{$lnk->description}}</td>
          <td class="text-center">
            <a href="{{ route('links.edit', $lnk->id)}}" class="btn btn-primary btn-sm"">Изменение</a>
            
            <form 
               action="{{ route('links.destroy', $lnk->id)}}" 
               method="post" style="display: inline-block">
              @csrf
              @method('DELETE')
 <button class="btn btn-danger btn-sm" type="submit">Удаление</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
<div>
@endsection
