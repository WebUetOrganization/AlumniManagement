{{--cần file html hoàn chỉnh (Tien, Quan)--}}
@foreach($alumni as $al)
    <p style="color: red">{{$al->name}}</p>
    <p>{{$al->birthday}}</p>
    <p>{{$al->phone}}</p>
    <p>{{$al->mail}}</p>
    {{--vì alumni liên kết 1-n với bảng course, province, district nên mỗi sinh viên (biến $al)
    có thể truy cập đến các thuộc tính của bảng đã liên kết--}}
    <p>{{$al->course->name}}</p>
    <p>{{$al->province->name}}</p>
    <p>{{$al->district->name}}</p>
@endforeach
