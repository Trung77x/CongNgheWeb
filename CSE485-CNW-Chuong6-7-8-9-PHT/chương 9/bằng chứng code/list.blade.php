@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<h2>Quản lý sinh viên</h2>

<form action="{{ route('sinhvien.store') }}" method="POST">
    @csrf
    <p>
        Tên sinh viên:
        <input type="text" name="ten_sinh_vien" required>
    </p>
    <p>
        Email:
        <input type="email" name="email" required>
    </p>
    <button type="submit">Thêm</button>
</form>

<hr>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Tên sinh viên</th>
        <th>Email</th>
    </tr>
    @foreach($danhSachSV as $sv)
    <tr>
        <td>{{ $sv->id }}</td>
        <td>{{ $sv->ten_sinh_vien }}</td>
        <td>{{ $sv->email }}</td>
    </tr>
    @endforeach
</table>

@endsection
