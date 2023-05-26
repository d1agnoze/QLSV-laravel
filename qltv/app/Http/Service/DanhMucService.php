<?php

namespace App\Http\Service;

use App\Models\Danhmuc;
use PHPUnit\Exception;
use DB;

class DanhMucService
{
    public function create($request){
        try {
            Danhmuc::create([
                'TenDM'=>(string)$request->input('TenDM'),
                'MaDM'=>(string)$request->input('MaDM'),
                'MoTa'=>(string)$request->input('MoTa'),
                'Vitri'=>(string)$request->input('ViTri')
            ]);
            Session()->flash('success','Thêm mới danh mục thành công');
        }
        catch (Exception $ex){
            Session()->flash('error',$ex->getMessage());
            return false;
        }
        return true;
    }
     public function getAll(){
        return Danhmuc::paginate(2);
     }
      public function edit($request,$danhmuc)
      {
          try {
              $danhmuc->MaDM = $request->input('MaDM');
              $danhmuc->TenDM = $request->input('TenDM');
              $danhmuc->MoTa = $request->input('MoTa');
              $danhmuc->Vitri = $request->input('ViTri');
              $danhmuc->save();
              Session()->flash('success','Sửa thông tin danh mục thành công');

          }
          catch (Exception $ex){
              Session()->flash('error',$ex->getMessage());
              return false;
          }
          return true;
      }

}
