<div class="editor dropdown" style="float: right;">
  <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown" style="font-size: 12px"></button>
    <div class="dropdown-menu dropdown-menu-right">
      <button class="dropdown-item" onclick="showForm('{{$id}}')">edit {{$id}}</button>
      <form method="post" action="{{route($del)}}">
        @csrf
        <button type="submit" class="dropdown-item">delete</button>
      </form>
  </div>
</div>

