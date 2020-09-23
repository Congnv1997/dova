@extends('layout.index')

@section('content')
    <section>
        

        <div class="project-list">
            <div class="project-page-title">
                <h1 style="color:#3578E5; font-weight:700;text-align: center">DANH SÁCH DỰ ÁN</h1>
            </div>
            <div class="project-search-bar">
                <input type="text" class="project-search-input" placeholder="Search">
                <button class="btn btn-sm btn-search"><i class="fas fa-search"></i></button>
                <select name="status" class="project-status">
                    <option value="1">Đang tiến hành</option>
                    <option value="1">Hoàn thành</option>
                </select>
            </div>
            <hr>
            <div style="position: relative">
                @foreach($project as $pr)
                <div class="project-item col-sm-3" style="border: 1px solid #ccc;border-radius: 20px;margin: 5px; position: flex; justify-content: space-between">
                    <h5 class="project-name">Tên dự án: {{ $pr -> name }}</h5>
                    <p>Bắt đầu: {{ $pr -> time_start }}</p>
                    <p>Dự kiến kết thúc: {{ $pr -> deadline }}</p>
                    <p>Nội dung dự án: {{ $pr -> content }}</p>
                    <p>Trạng thái: {{ $pr -> status }}</p>
                    <p>Bộ phận: {{ $pr -> department_id }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection