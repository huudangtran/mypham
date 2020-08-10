<?php

namespace App\Http\Controllers;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Slide;
use App\Slide_MyPham;
use App\MyPham;
use App\DatHang;
use App\KhachHang;
use App\ChuDe;
use App\ChiTietChuDe;
use App\LoaiMyPham;
use App\ThuongHieu;
use App\Size_MyPham;
use App\Mau_MyPham;
use App\DatHang_ChiTiet;
use App\Cart;
use App\User;
use App\Comment;
use Hash;
use Auth;
use Session;
use DB;

class HomeController extends Controller
{
	public function __construct()
	{

	}

	public function getIndex()
	{
		
		$slide= Slide::all();

		$myphammoi= MyPham::where('sanphammoi',1)->paginate(8);
		$myphamkp= MyPham::where('giagiam','<>',0)->get();
		//$chude= ChuDe::all();
		$chude_trangdiem= ChuDe::where('tenchude_tat','trang-diem')->get();
		$chude_chamsocda= ChuDe::where('tenchude_tat','cham-soc-da')->get();
		$chude_chamsoctoanthan= ChuDe::where('tenchude_tat','cham-soc-toan-than')->get();
		$chude_chamsoctoc= ChuDe::where('tenchude_tat','cham-soc-toc')->get();
		$chude_nuochoa= ChuDe::where('tenchude_tat','nuoc-hoa')->get();
		$chude_phukien= ChuDe::where('tenchude_tat','phu-kien')->get();
		$chitietchude= ChiTietChuDe::all();
		$chitietchude_chamsoctoanthan= ChiTietChuDe::where('tenchitietchude_tat','cham-soc-toan-than')->get();
		$chitietchude_chamsoctoc= ChiTietChuDe::where('tenchitietchude_tat','cham-soc-toc')->get();
		$chitietchude_nuochoa= ChiTietChuDe::where('tenchitietchude_tat','nuoc-hoa')->get();
		$chitietchude_phukien= ChiTietChuDe::where('tenchitietchude_tat','phu-kien')->get();
		$loaimypham= LoaiMyPham::all();
		$thuonghieu= ThuongHieu::all();
		
		return view('page.trangchu',
		compact(
		'slide',
		'chude_trangdiem',
		'chude_chamsocda',
		'chude_chamsoctoanthan',
		'chude_chamsoctoc',
		'chude_nuochoa',
		'chude_phukien',
		'chitietchude',
		'chitietchude_chamsoctoanthan',
		'chitietchude_chamsoctoc',
		'chitietchude_nuochoa',
		'chitietchude_phukien',
		'loaimypham',
		'thuonghieu',
		'thuonghieu1',
		'myphammoi',
		'myphamkp')
		);
	}

	public function getLoaiSanPham(Request $request)
	{
		$slide= Slide::all();
		$myphammoi= MyPham::where('sanphammoi',1)->paginate(4);
		$myphamkp= MyPham::where('giagiam','<>',0)->paginate(4);
		$chude_trangdiem= ChuDe::where('tenchude_tat','trang-diem')->get();
		$chude_chamsocda= ChuDe::where('tenchude_tat','cham-soc-da')->get();
		$chude_chamsoctoanthan= ChuDe::where('tenchude_tat','cham-soc-toan-than')->get();
		$chude_chamsoctoc= ChuDe::where('tenchude_tat','cham-soc-toc')->get();
		$chude_nuochoa= ChuDe::where('tenchude_tat','nuoc-hoa')->get();
		$chude_phukien= ChuDe::where('tenchude_tat','phu-kien')->get();
		$chitietchude= ChiTietChuDe::all();
		$chitietchude_chamsoctoanthan= ChiTietChuDe::where('tenchitietchude_tat','cham-soc-toan-than')->get();
		$chitietchude_chamsoctoc= ChiTietChuDe::where('tenchitietchude_tat','cham-soc-toc')->get();
		$chitietchude_nuochoa= ChiTietChuDe::where('tenchitietchude_tat','nuoc-hoa')->get();
		$chitietchude_phukien= ChiTietChuDe::where('tenchitietchude_tat','phu-kien')->get();
		$loaimypham= LoaiMyPham::all();
		$thuonghieu= ThuongHieu::all();
		$mp_theoloai=MyPham::where('loaimypham_id',$request->loai)->paginate(8);
		//$mp_theothuonghieu=MyPham::where('thuonghieu_id',$request->th)->paginate(9);
		//$mp_theoloai=MyPham::where('loaimypham_id',21)->paginate(9);
		//dd($mp_theoloai);
		return view('page.mypham_theoloai',
		compact('chude_trangdiem',
		'chude_chamsocda',
		'chude_chamsoctoanthan',
		'chude_chamsoctoc',
		'chude_nuochoa',
		'chude_phukien',
		'chitietchude',
		'chitietchude_chamsoctoanthan',
		'chitietchude_chamsoctoc',
		'chitietchude_nuochoa',
		'chitietchude_phukien',
		'loaimypham',
		'thuonghieu',
		'mp_theoloai',
		'mp_theothuonghieu',
		'myphammoi',
		'myphamkp',
		'slide'));
	}
	public function getThuongHieu(Request $request)
	{
		$slide= Slide::all();
		$chude_trangdiem= ChuDe::where('tenchude_tat','trang-diem')->get();
		$chude_chamsocda= ChuDe::where('tenchude_tat','cham-soc-da')->get();
		$chude_chamsoctoanthan= ChuDe::where('tenchude_tat','cham-soc-toan-than')->get();
		$chude_chamsoctoc= ChuDe::where('tenchude_tat','cham-soc-toc')->get();
		$chude_nuochoa= ChuDe::where('tenchude_tat','nuoc-hoa')->get();
		$chude_phukien= ChuDe::where('tenchude_tat','phu-kien')->get();
		$chitietchude= ChiTietChuDe::all();
		$chitietchude_chamsoctoanthan= ChiTietChuDe::where('tenchitietchude_tat','cham-soc-toan-than')->get();
		$chitietchude_chamsoctoc= ChiTietChuDe::where('tenchitietchude_tat','cham-soc-toc')->get();
		$chitietchude_nuochoa= ChiTietChuDe::where('tenchitietchude_tat','nuoc-hoa')->get();
		$chitietchude_phukien= ChiTietChuDe::where('tenchitietchude_tat','phu-kien')->get();
		$loaimypham= LoaiMyPham::all();
		$thuonghieu= ThuongHieu::all();
		//$mp_theoloai=MyPham::where('loaimypham_id',$request->loai)->paginate(9);
		$mp_theothuonghieu=MyPham::where('thuonghieu_id',$request->th)->paginate(9);
		$mp_theoloai=MyPham::where('loaimypham_id',21)->paginate(9);
		//dd($mp_theoloai);
		return view('page.mypham_theothuonghieu',
		compact('chude_trangdiem',
		'chude_chamsocda',
		'chude_chamsoctoanthan',
		'chude_chamsoctoc',
		'chude_nuochoa',
		'chude_phukien',
		'chitietchude',
		'chitietchude_chamsoctoanthan',
		'chitietchude_chamsoctoc',
		'chitietchude_nuochoa',
		'chitietchude_phukien',
		'loaimypham',
		'thuonghieu',
		'mp_theoloai',
		'mp_theothuonghieu',
		'slide'));
	}

	public function getChiTietMyPham(Request $request)
	{
		$chude_trangdiem= ChuDe::where('tenchude_tat','trang-diem')->get();
		$chude_chamsocda= ChuDe::where('tenchude_tat','cham-soc-da')->get();
		$chude_chamsoctoanthan= ChuDe::where('tenchude_tat','cham-soc-toan-than')->get();
		$chude_chamsoctoc= ChuDe::where('tenchude_tat','cham-soc-toc')->get();
		$chude_nuochoa= ChuDe::where('tenchude_tat','nuoc-hoa')->get();
		$chude_phukien= ChuDe::where('tenchude_tat','phu-kien')->get();
		$chitietchude= ChiTietChuDe::all();
		$chitietchude_chamsoctoanthan= ChiTietChuDe::where('tenchitietchude_tat','cham-soc-toan-than')->get();
		$chitietchude_chamsoctoc= ChiTietChuDe::where('tenchitietchude_tat','cham-soc-toc')->get();
		$chitietchude_nuochoa= ChiTietChuDe::where('tenchitietchude_tat','nuoc-hoa')->get();
		$chitietchude_phukien= ChiTietChuDe::where('tenchitietchude_tat','phu-kien')->get();
		$loaimypham= LoaiMyPham::all();
		$thuonghieu= ThuongHieu::all();
		$mp_theoloai=MyPham::where('loaimypham_id',$request->loai)->paginate(9);
		$chitietmypham=MyPham::where('id',$request->id)->get();
		$chitietmypham1=MyPham::where('id',$request->id)->first();

		$size_mp=Size_MyPham::where('mypham_id',$request->id)->get();
		$mau_mp=Mau_MyPham::where('mypham_id',$request->id)->get();
		$slide_mp=Slide_MyPham::where('mypham_id',$request->id)->get();
		
		$comment=DB::table('comments')->join('users', 'users.id', '=', 'comments.users_id')
		->select(DB::raw('comments.*,users.name'))
		->orderBy('created_at', 'desc')
		->paginate(4);
		
		$comment1=Comment::where('mypham_id',$request->id)->get();
		
		return view('page.chitietmypham',
		compact('chude_trangdiem',
		'chude_chamsocda',
		'chude_chamsoctoanthan',
		'chude_chamsoctoc',
		'chude_nuochoa',
		'chude_phukien',
		'chitietchude',
		'chitietchude_chamsoctoanthan',
		'chitietchude_chamsoctoc',
		'chitietchude_nuochoa',
		'chitietchude_phukien',
		'loaimypham',
		'thuonghieu',
		'mp_theoloai',
		'chitietmypham',
		'chitietmypham1',
		'size_mp',
		'mau_mp',
		'slide_mp',
		'comment',
		'comment1'));
	}
	public function postChiTietMyPhamReview(Request $request)
	{	
		$c = new Comment();
		$c->users_id = $request->user_id;
		$c->mypham_id = $request->mypham_id;
		$c->comment_content = $request->comment_content;
		$c->save();
		return back();
	}
	
	public function getThemGioHang(Request $request,$id)
	{
		$mypham=MyPham::find($id);
		//dd($mypham);
		$oldCart=Session('cart') ? Session::get('cart') : null;
		$cart=new Cart($oldCart);
		//dd($cart);
		$cart->add($mypham,$id);
		$request->session()->put('cart',$cart);
		return redirect()->back();
	}
	public function postCapnhatsoluong(Request $request)
    {
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        $cart->totalPrice=0;
        $cart->totalQty=0;
        $product_cart=$cart->items;
        foreach($request->so_luong_san_pham as $id=>$so_luong)
        {
            $mypham=MyPham::find($id);
            $cart->update($mypham,$id,$so_luong);
            $request->Session()->put('cart',$cart);
        }
		
       return redirect()->back();
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
	public function getXoaGioHang1($id)
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
		return view('page.dathang');
	}
	public function getTimKiem(Request $request)
	{
		$chude_trangdiem= ChuDe::where('tenchude_tat','trang-diem')->get();
		$chude_chamsocda= ChuDe::where('tenchude_tat','cham-soc-da')->get();
		$chude_chamsoctoanthan= ChuDe::where('tenchude_tat','cham-soc-toan-than')->get();
		$chude_chamsoctoc= ChuDe::where('tenchude_tat','cham-soc-toc')->get();
		$chude_nuochoa= ChuDe::where('tenchude_tat','nuoc-hoa')->get();
		$chude_phukien= ChuDe::where('tenchude_tat','phu-kien')->get();
		$chitietchude= ChiTietChuDe::all();
		$chitietchude_chamsoctoanthan= ChiTietChuDe::where('tenchitietchude_tat','cham-soc-toan-than')->get();
		$chitietchude_chamsoctoc= ChiTietChuDe::where('tenchitietchude_tat','cham-soc-toc')->get();
		$chitietchude_nuochoa= ChiTietChuDe::where('tenchitietchude_tat','nuoc-hoa')->get();
		$chitietchude_phukien= ChiTietChuDe::where('tenchitietchude_tat','phu-kien')->get();
		$loaimypham= LoaiMyPham::all();
		$thuonghieu= ThuongHieu::all();

		$timkiem_mypham=MyPham::where('tenmypham','like','%'.$request->key.'%')
								->orwhere('dongia',$request->key)
								->paginate(8);
		/*$timkiem_loaimypham=LoaiMyPham::where('tenloaimypham','like','%'.$request->key.'%')->get();
		$timkiem_thuonghieu=ThuongHieu::where('tenthuonghieu','like','%'.$request->key.'%')->get();*/

		return view('page.timkiem',
		compact('timkiem_mypham',/*'timkiem_loaimypham','timkiem_loaimypham',*/
		'chude_trangdiem',
		'chude_chamsocda',
		'chude_chamsoctoanthan',
		'chude_chamsoctoc',
		'chude_nuochoa',
		'chude_phukien',
		'chitietchude',
		'chitietchude_chamsoctoanthan',
		'chitietchude_chamsoctoc',
		'chitietchude_nuochoa',
		'chitietchude_phukien',
		'loaimypham',
		'thuonghieu'));
	}
	public function getCheckout(Request $request)
	{
		$chude_trangdiem= ChuDe::where('tenchude_tat','trang-diem')->get();
		$chude_chamsocda= ChuDe::where('tenchude_tat','cham-soc-da')->get();
		$chude_chamsoctoanthan= ChuDe::where('tenchude_tat','cham-soc-toan-than')->get();
		$chude_chamsoctoc= ChuDe::where('tenchude_tat','cham-soc-toc')->get();
		$chude_nuochoa= ChuDe::where('tenchude_tat','nuoc-hoa')->get();
		$chude_phukien= ChuDe::where('tenchude_tat','phu-kien')->get();
		$chitietchude= ChiTietChuDe::all();
		$chitietchude_chamsoctoanthan= ChiTietChuDe::where('tenchitietchude_tat','cham-soc-toan-than')->get();
		$chitietchude_chamsoctoc= ChiTietChuDe::where('tenchitietchude_tat','cham-soc-toc')->get();
		$chitietchude_nuochoa= ChiTietChuDe::where('tenchitietchude_tat','nuoc-hoa')->get();
		$chitietchude_phukien= ChiTietChuDe::where('tenchitietchude_tat','phu-kien')->get();
		$loaimypham= LoaiMyPham::all();
		$thuonghieu= ThuongHieu::all();
		$dathang=DatHang::all();
		$timkiem_mypham=MyPham::where('tenmypham','like','%'.$request->key.'%')
								->orwhere('dongia',$request->key)
								->paginate(4);
		$size_mp=Size_MyPham::where('mypham_id',$request->id)->get();
		$mau_mp=Mau_MyPham::where('mypham_id',$request->id)->get();
		return view('page.dathang',
		compact('timkiem_mypham',
		'chude_trangdiem',
		'chude_chamsocda',
		'chude_chamsoctoanthan',
		'chude_chamsoctoc',
		'chude_nuochoa',
		'chude_phukien',
		'chitietchude',
		'chitietchude_chamsoctoanthan',
		'chitietchude_chamsoctoc',
		'chitietchude_nuochoa',
		'chitietchude_phukien',
		'loaimypham',
		'thuonghieu',
		'dathang',
		'size_mp',
		'mau_mp'));
	}
	public function getXemGioHang(Request $request)
	{
		$chude_trangdiem= ChuDe::where('tenchude_tat','trang-diem')->get();
		$chude_chamsocda= ChuDe::where('tenchude_tat','cham-soc-da')->get();
		$chude_chamsoctoanthan= ChuDe::where('tenchude_tat','cham-soc-toan-than')->get();
		$chude_chamsoctoc= ChuDe::where('tenchude_tat','cham-soc-toc')->get();
		$chude_nuochoa= ChuDe::where('tenchude_tat','nuoc-hoa')->get();
		$chude_phukien= ChuDe::where('tenchude_tat','phu-kien')->get();
		$chitietchude= ChiTietChuDe::all();
		$chitietchude_chamsoctoanthan= ChiTietChuDe::where('tenchitietchude_tat','cham-soc-toan-than')->get();
		$chitietchude_chamsoctoc= ChiTietChuDe::where('tenchitietchude_tat','cham-soc-toc')->get();
		$chitietchude_nuochoa= ChiTietChuDe::where('tenchitietchude_tat','nuoc-hoa')->get();
		$chitietchude_phukien= ChiTietChuDe::where('tenchitietchude_tat','phu-kien')->get();
		$loaimypham= LoaiMyPham::all();
		$thuonghieu= ThuongHieu::all();
		$dathang=DatHang::all();
		$timkiem_mypham=MyPham::where('tenmypham','like','%'.$request->key.'%')
								->orwhere('dongia',$request->key)
								->paginate(4);
		$size_mp=Size_MyPham::where('mypham_id',$request->id)->get();
		$mau_mp=Mau_MyPham::where('mypham_id',$request->id)->get();
		return view('page.giohang',
		compact('timkiem_mypham',
		'chude_trangdiem',
		'chude_chamsocda',
		'chude_chamsoctoanthan',
		'chude_chamsoctoc',
		'chude_nuochoa',
		'chude_phukien',
		'chitietchude',
		'chitietchude_chamsoctoanthan',
		'chitietchude_chamsoctoc',
		'chitietchude_nuochoa',
		'chitietchude_phukien',
		'loaimypham',
		'thuonghieu',
		'dathang',
		'size_mp',
		'mau_mp'));
	}
	public function postCheckout(Request $request)
	{
		$cart=Session::get('cart');
		//dd($cart);
		$this->validate($request,
		[			
			'email' => 'required|string|email|max:255',
			
			'name'	=>'required',
			'address'=>'required',
			'phone'=>'required',
		],
		[
			'name.required'=>'Vui lòng nhập tên của bạn',
			'address.required'=>'Vui lòng nhập địa chỉ của bạn',
			'phone.required'=>'Vui lòng nhập địa chỉ của bạn',
			'email.required'=>'Vui lòng nhập email',
			'email.email'=>'Không đúng định dạng email',
			
			
		]);
		//dd($cart);
		
		$khachhang = new KhachHang;
		$khachhang->user_id = Auth::id();
		$khachhang->tenkhachhang=$request->name;
		$khachhang->gioitinh=$request->gender;
		$khachhang->email=$request->email;
		$khachhang->diachi=$request->address;
		$khachhang->dienthoai=$request->phone;
		$khachhang->ghichu=$request->note;
		$khachhang->save();
		
		$dathang= new DatHang;
		$dathang->khachhang_id=$khachhang->id;
		$dathang->diachi_giaohang=$request->address;
		$dathang->method_vanchuyen=$request->shipping;
		$dathang->method_thanhtoan=$request->payments;
		$dathang->tinhtrang= (isset($request->tinhtrang)) ? 1 : 0;
		if(($cart->totalPrice>300000)&&($cart->totalPrice<500000))
			$dathang->tongtien=$cart->totalPrice+20000;
		else
			$dathang->tongtien=$cart->totalPrice+40000;
		$dathang->save();
		
		foreach($cart->items as $key=>$value)
		{
			$dathang_chitiet= new DatHang_ChiTiet;
			$dathang_chitiet->dathang_id=$dathang->id;
			$dathang_chitiet->mypham_id=$key;
			$dathang_chitiet->soluong=$value['qty'];
			$dathang_chitiet->dongia=$value['price']/$value['qty'];
			
			$dathang_chitiet->save();
		}
		
		Session::forget('cart');
		return redirect('donhang');		
		
	}
	
	
	public function getDangNhap()
	{
		$chude_trangdiem= ChuDe::where('tenchude_tat','trang-diem')->get();
		$chude_chamsocda= ChuDe::where('tenchude_tat','cham-soc-da')->get();
		$chude_chamsoctoanthan= ChuDe::where('tenchude_tat','cham-soc-toan-than')->get();
		$chude_chamsoctoc= ChuDe::where('tenchude_tat','cham-soc-toc')->get();
		$chude_nuochoa= ChuDe::where('tenchude_tat','nuoc-hoa')->get();
		$chude_phukien= ChuDe::where('tenchude_tat','phu-kien')->get();
		$chitietchude= ChiTietChuDe::all();
		$chitietchude_chamsoctoanthan= ChiTietChuDe::where('tenchitietchude_tat','cham-soc-toan-than')->get();
		$chitietchude_chamsoctoc= ChiTietChuDe::where('tenchitietchude_tat','cham-soc-toc')->get();
		$chitietchude_nuochoa= ChiTietChuDe::where('tenchitietchude_tat','nuoc-hoa')->get();
		$chitietchude_phukien= ChiTietChuDe::where('tenchitietchude_tat','phu-kien')->get();
		$loaimypham= LoaiMyPham::all();
		$thuonghieu= ThuongHieu::all();
		
		return view('page.dangnhap',
		compact('chude_trangdiem',
		'chude_chamsocda',
		'chude_chamsoctoanthan',
		'chude_chamsoctoc',
		'chude_nuochoa',
		'chude_phukien',
		'chitietchude',
		'chitietchude_chamsoctoanthan',
		'chitietchude_chamsoctoc',
		'chitietchude_nuochoa',
		'chitietchude_phukien',
		'loaimypham',
		'thuonghieu'));
	}
	public function postDangNhap(Request $request)
	{
		$this->validate($request,
		[			
			'email' => 'required|string|email|max:255',
			'password' => 'required',					
		],
		[
			
			'email.required'=>'Vui lòng nhập email',
			'email.email'=>'Không đúng định dạng email',
			'password.required'=>'Vui lòng nhập password',
			
			
		]);
		/*$nguoidung = array('email'=>$request->email, 
		'password'=>$request->password);
		if(Auth::attempt($nguoidung)){
			return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
		}
		else
			return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập thất bại']);
		*/
		$arr=['email'=>$request->email,'password'=>$request->password];
		if($request->selector='remember')
		{
			$remember=true;
		}
		else{
			$remember=false;
		}
		if(Auth::attempt($arr,$remember))
		{
			return redirect()->intended('home');
		}
		else
		{
			return back()->withInput()->with('error','Tài khoản hoặc mật khẩu không chính xác');
		}
	}

	public function getDangKy()
	{
		$chude_trangdiem= ChuDe::where('tenchude_tat','trang-diem')->get();
		$chude_chamsocda= ChuDe::where('tenchude_tat','cham-soc-da')->get();
		$chude_chamsoctoanthan= ChuDe::where('tenchude_tat','cham-soc-toan-than')->get();
		$chude_chamsoctoc= ChuDe::where('tenchude_tat','cham-soc-toc')->get();
		$chude_nuochoa= ChuDe::where('tenchude_tat','nuoc-hoa')->get();
		$chude_phukien= ChuDe::where('tenchude_tat','phu-kien')->get();
		$chitietchude= ChiTietChuDe::all();
		$chitietchude_chamsoctoanthan= ChiTietChuDe::where('tenchitietchude_tat','cham-soc-toan-than')->get();
		$chitietchude_chamsoctoc= ChiTietChuDe::where('tenchitietchude_tat','cham-soc-toc')->get();
		$chitietchude_nuochoa= ChiTietChuDe::where('tenchitietchude_tat','nuoc-hoa')->get();
		$chitietchude_phukien= ChiTietChuDe::where('tenchitietchude_tat','phu-kien')->get();
		$loaimypham= LoaiMyPham::all();
		$thuonghieu= ThuongHieu::all();
		
		return view('page.dangky',
		compact('chude_trangdiem',
		'chude_chamsocda',
		'chude_chamsoctoanthan',
		'chude_chamsoctoc',
		'chude_nuochoa',
		'chude_phukien',
		'chitietchude',
		'chitietchude_chamsoctoanthan',
		'chitietchude_chamsoctoc',
		'chitietchude_nuochoa',
		'chitietchude_phukien',
		'loaimypham',
		'thuonghieu'));
	}
	public function postDangKy(Request $request)
	{
		$this->validate($request,
		[
			'name' => 'required|string|max:100',
			'username' => 'required|string|max:100|unique:users',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|min:8',
			'pass'=>'required|same:password',
			
					
		],
		[
			'username.required'=>'Vui lòng nhập tên đăng nhập',
			'email.required'=>'Vui lòng nhập email',
			'email.email'=>'Không đúng định dạng email',
			'email.unique'=>'Email đã sử dụng đăng ký',
			'password.required'=>'Vui lòng nhập password',
			'password.min'=>'Mật khẩu ít nhất 8 ký tự',
			'pass.same'=>'Mật khẩu không trùng khớp',
		]);
		
		$user = new User();
		$user->name = $request->name;
		$user->username = $request->username;
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
		
		$user->save();
		
		return redirect('dangnhap');
	}
	
	public function postDangXuat()
	{
		Auth::logout();
		return redirect()->intended('dangnhap');
	}
	
}
