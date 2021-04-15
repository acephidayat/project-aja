hello form about page {{$name}}

<br>

<h1>Nama Buah</h1>
<ul>
    @foreach($buah as $temp)
    <li>{{$temp}}</li>
    @endforeach
</ul>   

@if($cuaca == 'hujan')
    cikarang hari ini hujan
    @elseif($cuaca == 'tidak hujan')
        cikarang hari ini cerah
     @elseif($cuaca == 'salju')
        dingin
    @else
    Cikarang hari ini berawan
@endif

<hr>
Nama Saya : {{$name}}
<br>
Umur saya : {{$age}}

<hr>

