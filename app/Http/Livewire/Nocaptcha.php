<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;

class Nocaptcha extends Component
{
    public function NoCaptca(Request $request)
    {
        $this->validate($request, [
            'g-recaptcha-response' => 'required|captcha',
        ]);
   
        print('done');
    }
}
