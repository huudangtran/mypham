<?php

namespace App\Http\Controllers;

use App\KhachHang;
use App\DatHang;
use App\MyPham;
use App\User;
use App\Cart;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;

class DatHangController extends Controller
{
	public function getIndex()
	{
		$dathang = DatHang::join('khachhang', 'khachhang.id', '=', 'dathang.khachhang_id')
		->orderBy('created_at', 'desc')
		->select(DB::raw('DatHang.*,khachhang.tenkhachhang,khachhang.user_id'))
		->paginate(10);
		return view('admin.dathang.index', ['dathang' => $dathang]);
	}
	
	public function getXoaGioHang($id)
	{
		$oldCart= Session::has('cart') ? Session::get('cart') : null;
		$cart=new Cart($oldCart);
		$cart->removeItem($id);
		if(count($cart->items)>0)
		{
			Session::put('cart',$cart);
		}
		else
		{
			Session::forget('cart');
		}
		return redirect()->back();
	}
	public function getIndexClient()
	{
		
		/*$khachhangclient = KhachHang::join('users', 'users.id', '=', 'khachhang.user_id')
		->orderBy('created_at', 'desc')
		->select(DB::raw('KhachHang.*,users.name'))
		->where('user_id','Auth::id()')->first();
		dd($khachhangclient);*/
		
		/*$dathangclient = DatHang::join('khachhang', 'khachhang.id', '=', 'dathang.khachhang_id')
		->orderBy('created_at', 'desc')
		->select(DB::raw('DatHang.*,khachhang.tenkhachhang,khachhang.user_id'))
		->where('dathang.khachhang_id','khachhang.id')->first();
		dd($dathangclient);*/
		$users = User::where('id','Auth::user()->id')->first();
		dd($users);
		//return view('page.dathang.index', ['dathangclient' => $dathangclient]);
	}
	public function getCreate()
	{
		$khachhang = User::all();
		return view('admin.dathang.create', ['khachhang' => $khachhang]);
	}

	public function postCreate(Request $request)
	{
		$request->validate([
			'khachhang_id' => 'required|numeric',
			'tendathang' => 'required|max:255',
		]);

		$dh = new DatHang();
		$dh->khachhang_id = $request->khachhang_id;
		$dh->diachi_giaohang = $request->diachi_giaohang;
		$dh->method_vanchuyen = $request->method_vanchuyen;
		$dh->method_thanhtoan = $request->method_thanhtoan;
		$dh->tinhtrang = $request->tinhtrang;
		$dh->save();

		return redirect('admin/dathang');
	}

	public function getDetails($id)
	{
		//
	}
	public function postCapnhatsoluong(Request $request)
    {
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        $cart->totalPrice=0;
        $cart->totalQty=0;
        $product_cart=$cart->items;
        foreach ($request->so_luong_san_pham as $id=>$so_luong)
        {
            $mypham=MyPham::Find($id);
            $cart->update($mypham,$id,$so_luong);
            $request->Session()->put('cart',$cart);
        }
       return redirect('giohang/index');
    }
	public function getEdit($id)
	{
		$dathang = DatHang::find($id);
		$khachhang = KhachHang::all();
		return view('admin.dathang.edit', ['dathang' => $dathang, 'khachhang' => $khachhang]);
	}

	public function postEdit(Request $request)
	{
		$request->validate([			
			'tinhtrang' => 'required',
		]);

		$dathang = DatHang::find($request->id);		
		
		$dathang->tinhtrang = $request->tinhtrang;
		$dathang->save();

		return redirect('admin/dathang');
	}

	public function getDelete($id)
	{
		$dathang = DatHang::find($id);
		return view('admin.dathang.delete', ['dathang' => $dathang]);
	}

	public function postDelete(Request $request)
	{
		$dathang = DatHang::find($request->id);
		$dathang->delete();

		return redirect('admin/dathang');
	}

}
