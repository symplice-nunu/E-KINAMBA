<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use Mail;
 
use App\Mail\NotifyMail;
 
 
class SendEmailController extends Controller
{
     
    public function index()
    {
 
    //   Mail::to('hirwajackson090@gmail.com', 'E-KINAMBA')->send(new NotifyMail());

      $data = array('name'=>"symplice");
      Mail::send(new NotifyMail(), $data, function($message) {
         $message->to('hirwajackson090@gmail.com', 'Hirwa jackson')->subject
            ('kinamba');
        //  $message->from('xyz@gmail.com','Virat Gandhi');
      });
      echo "HTML Email Sent. Check your inbox.";
     
     
    } 
}