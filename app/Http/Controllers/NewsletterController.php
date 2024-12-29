<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use App\Mail\ThankYouForSubscribing;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        try{
            $request->validate([
                'email' => 'required|email',
            ]);
            Newsletter::create(['email' => $request->email]);
            Mail::to($request->email)->send(new ThankYouForSubscribing());
            return response()->json([
                'success' => true,
                'message' => 'Cảm ơn bạn đã đăng ký với email: ' . $request->email
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Nếu validation lỗi (email đã tồn tại)
            return response()->json([
                'success' => false,
                'message' => $e->errors()['email'][0] // Lấy thông báo lỗi cho email
            ], 422); // Mã lỗi 422: Unprocessable Entity
        }

    }
}
