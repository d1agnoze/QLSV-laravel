@extends('admin.main')
@section('content')
    <div class="setLimitpagination">
        @include('share.error')
        <button type="button" class="btn btn-warning text-white" data-toggle="modal" data-target="#modal-warning">
            Cài đặt phân trang
        </button>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã danh mục</th>
                <th>Tên danh mục</th>
                <th>Mô tả</th>
                <th>Vị trí</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($danhmucs as $danhmuc)
                <tr>
                    <td>{{ $danhmuc->id }}</td>
                    <td>{{ $danhmuc->MaDM }}</td>
                    <td>{{ $danhmuc->TenDM }}</td>
                    <td>{!! $danhmuc->MoTa !!}</td>
                    <td>{{$danhmuc->Vitri}}</td>
                    <td><a class="btn btn-primary mr-3" href="/admin/danhmuc/edit/{{$danhmuc->id}}"><i class="fa fa-edit "></i></a>
                        <a class="btn btn-danger" href="#" onclick="Delete({{$danhmuc->id}},'/admin/danhmuc/delete')"><i class = "fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $danhmucs->links() }}
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
