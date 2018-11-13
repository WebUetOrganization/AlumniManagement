<form class="form-inline" method="post" action="{{route($placeholder, $placeholder)}}" style="display: none; text-align: -webkit-center; border-radius: 5px; background-color: #a1cbef" id="{{$id}}">
    @csrf
    <div style="padding: 10px">
        <label for="dob" class="sr-only"> {{$id}}</label>
        <input type="text" class="form-control" name="{{$placeholder}}" placeholder="{{$placeholder}}" style="width: 200px">
    </div>
    <button type="submit" class="btn btn-sm btn-primary mb-2">Save</button>
    <a class="btn btn-sm btn-light mb-2" onclick="hideForm('{{$id}}')">Cancel</a>
</form>
