<h1>Jenis Sosis</h1>
<ul>
    @foreach ($sosis as $item)
    <li>{{$item}} </li>
    @endforeach
</ul>

<hr>
Nama saya :{{$nama}}
<br>
Usia saya :{{$umur}} 
<hr>

@if ($jadwal == 'Libur Kerja')
    Istirahat dan liburan
@elseif($jadwal == 'Masuk Kerja')
    masuk kerja dari senin sampai sabtu
@else
    ngambil kursus atau les
@endif