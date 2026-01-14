<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class MailController extends Controller
{
    public function sendContact(Request $request)
    {
//        dd($request->all());
//        $request->validate([
//            'name'    => 'required',
//            'subject' => 'required',
//            'message' => 'required'
//        ]);

        $data = "
        Name: {$request->name}
        Subject: {$request->subject}
        Message: {$request->message}
    ";

        try {
            Mail::raw($data, function ($mail) use ($request) {
                $mail->to('contact@mre.co')
                    ->subject($request->subject)
                    ->replyTo($request->email ?? 'no-reply@mre.co');
            });

            return response()->json(['success' => true, 'msg' => 'Message sent successfully'], 200);
        } catch (\Exception $e) {
            \Log::error('Contact email failed: ' . $e->getMessage());
            return response()->json(['success' => false, 'msg' => 'Failed to send message'], 500);
        }
    }

    public function sendCareer(Request $request)
    {
//        dd($request->all());
//        $path = $request->file('careerCV')->getRealPath();
        $path = $request->file('careerCV')->store('careers', 'public');
        $fullPath = storage_path('app/public/' . $path);
        $fileName = $request->file('careerCV')->getClientOriginalName();

//        Storage::disk('public')->put($fileName, file_get_contents($path));
//        $fileURL = Storage::disk('public')->url($fileName);
//        dd( Storage::disk('public')->url($fileName), $path, $fileName);

        $data = "
        Name: {$request->careerName}
        Email: {$request->careerEmail}
        Phone: {$request->careerPhone}
        Department: {$request->careerDepartment}
        Message: {$request->careerMessage}
    ";

        try {
            Mail::raw($data, function ($mail) use ($request, $fullPath, $fileName) {
                $mail->to('contact@mre.co')
                    ->subject("Career Application - {$request->careerDepartment}")
                    ->replyTo($request->careerEmail ?? 'no-reply@mre.co')
                    ->attach($fullPath, [
                        'as' => $fileName,
                        'mime' => $request->file('careerCV')->getMimeType()
                    ]);
            });

            return response()->json(['success' => true, 'status' => 'Message sent successfully'], 200);
        } catch (\Exception $e) {
            \Log::error('Career email failed: ' . $e->getMessage());
            return response()->json(['success' => false, 'status' => 'Failed to send message'], 500);
        }
    }
}
