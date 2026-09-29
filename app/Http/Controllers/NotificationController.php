<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class NotificationController extends Controller {
 public function readAll(Request $request){
  auth()->user()->unreadNotifications->markAsRead();
  return back()->with('success','Notifikasi ditandai sudah dibaca.');
 }
}