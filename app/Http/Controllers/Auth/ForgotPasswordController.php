<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Mail\ResetPasswordMail;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{

    public function  getQuenmk()
    {
        return view('forgotpassword');
    }

    public function sendResetLink(ForgotPasswordRequest $request)
    {
        $email = $request->input('email');
        $token = Str::random(60);

        // Xóa token cũ nếu có
        DB::table('password_reset_tokens')->where('email', $email)->delete();

        // Lưu token mới vào DB
        DB::table('password_reset_tokens')->insert([
            'email' => $email,
            'token' => Hash::make($token),
            'created_at' => Carbon::now(),
        ]);

        // Gửi email đặt lại mật khẩu
        $resetUrl = route('reset', ['token' => $token, 'email' => $email]);
        Mail::to($email)->send(new ResetPasswordMail($resetUrl));

        return redirect()->back()->with(['thongbao' => 'Vui lòng kiểm tra email để đặt lại mật khẩu']);
    }

    public function showResetForm(Request $request)
    {
        return view('reset_password', [
            'token' => $request->query('token'),
            'email' => $request->query('email'),
        ]);
    }

    public function resetPassword(ResetPasswordRequest $request): JsonResponse
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $password_confirmation = $request->input('password_confirmation');
        $token = $request->input('token');

        if($password != $password_confirmation){
            return response()->json(['error' => 'Mật khẩu không khớp!'], 400);
        }

        // Kiểm tra token trong DB
        $record = DB::table('password_reset_tokens')->where('email', $email)->first();

        if (!$record || !Hash::check($token, $record->token)) {
            return response()->json(['error' => 'Token không hợp lệ!'], 400);
        }

        // Cập nhật mật khẩu
        $user = User::where('email', $email)->first();
        $user->password = Hash::make($password);
        $user->save();

        // Xóa token sau khi sử dụng
        DB::table('password_reset_tokens')->where('email', $email)->delete();

        return response()->json(['message' => 'Mật khẩu đã được cập nhật!']);
    }
}
