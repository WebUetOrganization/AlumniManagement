<form class="form-inline" method="post" action="{{route('address', [$placeholder1, $placeholder2])}}" style="display: none; text-align: -webkit-center; border-radius: 5px; background-color: #a1cbef" id="{{$id}}">
    @csrf
    <div style="padding: 10px">
        <input type="text" class="form-control form-control-sm" name="{{$placeholder1}}" placeholder="{{$placeholder1}}" style="width: 200px">
    </div>
    <div style="padding: 10px">
        <input type="text" class="form-control form-control-sm" name="{{$placeholder2}}" placeholder="{{$placeholder2}}" style="width: 200px">
    </div>
    <button class="btn btn-sm btn-primary mb-2">Save</button>
    <a class="btn btn-sm btn-light mb-2" onclick="hideForm('{{$id}}')">Cancel</a>
</form>
