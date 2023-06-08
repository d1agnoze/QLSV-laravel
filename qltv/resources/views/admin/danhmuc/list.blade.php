@extends('admin.main')
@section('content')
    <div class="functionalBTN d-flex gap-3 align-items-center w-100 justify-content-start my-2" style="gap:.5rem" >
        <button type="button" class="btn btn-warning text-white ml-1" data-toggle="modal" data-target="#modal-warning">
            Cài đặt phân trang
        </button>
        <a href="{{ request()->fullUrlWithQuery(['order' => 'asc']) }}" class="btn btn-info">Order by TenDM (ASC)</a>
        <a href="{{ request()->fullUrlWithQuery(['order' => 'desc']) }}" class="btn btn-info">Order by TenDM (DESC)</a>

        <form action="/admin/danhmuc/list" class="form-group d-flex align-items-center justify-center m-0 ml-auto" method="GET" style="gap:.5rem">
            <a href="/admin/danhmuc/list" class="btn bg-blue">Reset</a>
            <input type="text" name="search" class="form-control">
            <button type="submit" class="btn btn-success"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                {{-- <th>ID</th> --}}
                <th class="pl-4">Mã danh mục</th>
                <th>Tên danh mục</th>
                <th class="w-50">Mô tả</th>
                <th>Vị trí</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($danhmucs as $danhmuc)
                <tr>
                    {{-- <td>{{ $danhmuc->id }}</td> --}}
                    <td class="pl-4">{{ $danhmuc->MaDM }}</td>
                    <td>{{ $danhmuc->TenDM }}</td>
                    <td class="w-50">{!! $danhmuc->MoTa !!}</td>
                    <td>{{$danhmuc->Vitri}}</td>
                    <td><a class="btn btn-primary mr-3" href="/admin/danhmuc/edit/{{$danhmuc->id}}"><i class="fa fa-edit "></i></a>
                        <a class="btn btn-danger" href="#" onclick="Delete({{$danhmuc->id}},'/admin/danhmuc/delete')"><i class = "fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $danhmucs->appends($_GET)->links() }}
    <div class="modal fade show" id="modal-warning" style="display: none; padding-right: 15px;" aria-modal="true"
        role="dialog">
        <div class="modal-dialog">
            <form action="/admin/danhmuc/list/setpage" method="post" id="quickForm">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h4 class="modal-title">Cài đặt phân trang</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="setLimit  inline-block">Số dòng trên mỗi trang:</label>
                            <input type="number" class="form-control  inline-block" id="setLimit" name="setLimit"
                                min="1" step="1"
                                onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                                placeholder="số nguyên và lớn hơn 0" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger text-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-dark"> Save </button>
                    </div>
                </div>
                @csrf
            </form>
        </div>
    </div>
@endsection
