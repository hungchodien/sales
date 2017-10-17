<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Model\Md_User;

class LoginController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('LoginAdmin');
//    }
    public function index(){
        return view('Admin.index');
    }
    public function login(Request $request){
        ///lấy model user -> add new
        $rules = [
            'email' =>'required|email',
            'password' => 'required|min:6'
        ];
        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            if (Auth::attempt(array('email' => $request->input('email'), 'password' => $request->input('password')) , true))
            {
                $request->session()->flash('success_login_admin', 'bạn vừa login thành công vào hệ thống');
                return redirect()->route("Dashboard_Home_Admin");
            }else {
                return redirect()->back()->with('error_login', 'đăng nhập thất bại!!! ');
            }
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('Login_Admin');
    }
    public function register_user(Request $request){
        ///lấy model user -> add new
        $rules = [
            'email' =>'required|email',
            'password' => 'required|min:6'
        ];
        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $user = new Md_User();
            $user->name = $request->input('username');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->idQuyen = 2;
            try{
                $create = $user->save();
                if($create){
                    return redirect()->back()->with('message_register', 'Đăng kí thành công! vui lòng login vào hệ thống');
                }else {
                    return redirect()->back()->with('error_register', 'Đăng kí thất bại, hệ thống đang phục hồi, vui lòng thử lại sau ít phút');
                }
            }catch (\Exception $e){
                return redirect()->back()->with('error_register', 'Đăng kí thất bại, đã có lỗi hệ thống, vui lòng thử lại sau ít phút');
            }


        }

    }
}
