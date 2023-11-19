<?php

namespace App\View\Components;

use App\Services\Tailwind;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use App\Settings\GeneralSettings;

class App extends Component
{
    public string $brandColors;
    public ?string $logo;
    public array $fontFamily;
    public bool $blockRobots = false;
    public bool $userNeedsToVerify = false;

    public function __construct(public array $breadcrumbs = [])
    {
        $this->blockRobots = app(GeneralSettings::class)->block_robots;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $tw = new Tailwind('brand', app(\App\Settings\ColorSettings::class)->primary);

        $this->brandColors = $tw->getCssFormat();

        $fontFamily = app(\App\Settings\ColorSettings::class)->fontFamily ?? "Nunito";
        $this->fontFamily = [
            'cssValue' => $fontFamily,
            'urlValue' => Str::snake($fontFamily, '-')
        ];

        $this->logo = app(\App\Settings\ColorSettings::class)->logo;

        $this->userNeedsToVerify = app(GeneralSettings::class)->users_must_verify_email &&
            auth()->check() &&
            !auth()->user()->hasVerifiedEmail();

        return view('components.app');
    }
}
