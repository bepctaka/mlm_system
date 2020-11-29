<?php

namespace App\Http\Livewire;

use Livewire\Component;
use BaconQrCode\Renderer\Color\Rgb;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\Fill;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use App\Models\User;

class Referral extends Component
{
    public $referral_url = '';
    public $referral_qr = '';
    
    public function mount()
    {
        $this->referral_url = auth()->user()->getReferralLink();
        $svg = (new Writer(
            new ImageRenderer(
                new RendererStyle(192, 0, null, null, Fill::uniformColor(new Rgb(255, 255, 255), new Rgb(45, 55, 72))),
                new SvgImageBackEnd
            )
        ))->writeString(auth()->user()->getReferralLink());
        $this->referral_qr = trim(substr($svg, strpos($svg, "\n") + 1));

    }
}
