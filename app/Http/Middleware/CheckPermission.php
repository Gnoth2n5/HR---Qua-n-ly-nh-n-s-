<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\tbl_hopdong;
use App\Models\tbl_phuluc;
use App\Models\tbl_chitietphuluc;
use App\Models\tbl_chucvu_permission;
use App\Models\tbl_permissions;


class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $permission = null)
    {   
                $hopdong=tbl_hopdong::where([['id_nhanvien',Auth::user()->id_nhanvien],['trang_thai','1']])->first();
                // if(tbl_phuluc::where('id_hopdong',$hopdong->id_hopdong)){
                    $phuluc=tbl_phuluc::where([['id_hopdong',$hopdong->id_hopdong],['id_loaiphuluc','2']])->first();
                    
                    if($phuluc!=null){
                    $chitiet=tbl_chitietphuluc::where('id',$phuluc->id_chitiet)->first();
                    $congviec=tbl_chucvu_permission::where('id_chucvu',$chitiet->id_chucvu_moi)->get()->pluck('id_permission');
                    }
                    else{
                        $congviec=tbl_chucvu_permission::where('id_chucvu',Auth::user()->tbl_hosonhanvien->tbl_chucvu->id_chucvu)->get()->pluck('id_permission');
                        }
                
               
                
                
                $check=tbl_permissions::where('ten',$permission)->value('id');
               
                
                if($congviec->contains($check)){
                    return $next($request);
                }
                
        return abort(401);
    }
}
