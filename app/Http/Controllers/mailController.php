<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class mailController extends Controller
{
        public function sendBasicMail(){
        $subject = 'Greetings from PAW';
        $from = 'josemaria.terrazas@gmail.com';
        $sender = 'PAW 2018 at DI';
        $advertising='PAW 2018 by Laravel 5.5';   
        $data = array('advertising'=>$advertising);
        
        Mail::send('sending', $data, function($message) use ($advertising){
            $message->to('josemaria.terrazas@gmail.com', 'cliente')->subject('¡Reservaste una cancha con 5inco!');
            $message->from('josemaria.terrazas@gmail.com','PAW by Laravel');
        });
        echo "Basic email sent successfully. Please check your mail.";
    }
    
    
    
    public function sendAttachmentMail(){
        $data = array('name'=>'XXX');
        Mail::send('sending', $data, function($message) {
            $message->to('josemaria.terrazas@gmail.com', 'Sr. Nocera')->subject ($subject);
            $message->attach('...\image.png');
            $message->attach('..\test.txt');
            $message->from($subject,$sender);
            });
        echo "Email sent with attachment. Please check your mail.";
    }
}
