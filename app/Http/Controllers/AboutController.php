<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use App\Http\Requests;
use App\Http\Post;
use Mail;
use Session;

class AboutController extends Controller
{
    public function getAbout(){
      return view('about.about');
    }

    public function getCreate(){
      return view('about.contact');
    }

    public function getStore(Request $request){
      $this->validate($request,
      ['name' => 'required|min:3', 'email' => 'required|email', 'message' => 'required|min:50', 'captcha' => 'required']);

      $data = array(
        'name' => $request->name,
        'email' => $request->email,
        'bodyMessage' => $request->message);
        if($request->captcha == 4)
        {
          Mail::send('emails.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('kontakt@okiemgracza.pl');
            $message->subject($data['name'] . '| Formularz kontaktowy');
          });
          Session::Flash('success', 'Dziękujemy za wysłanie nam wiadomości, pozdrawiamy!');
          return redirect('/');
        } else {
          Session::flash('error', 'Wpisz wynik działania!');
          return redirect('contact');
        }
     }

     public function getPrivacy(){
       return view('about.privacy');
     }
}
