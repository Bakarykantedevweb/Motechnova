<?php

namespace App\Http\Livewire\Frontend\Formation;

use Livewire\Component;
use Illuminate\Support\Str;

class DetailFree extends Component
{
    public $formation;
    public $videoUrl;

    public function mount($formation)
    {
        $this->formation = $formation;
        $this->videoUrl = 'https://www.youtube.com/embed/MUVKyLYWnfI'; // Valeur par défaut
    }

    public function changeVideo($url)
    {
        $this->videoUrl = null;

        if (Str::contains($url, ['youtube.com', 'youtu.be'])) {
            // Extraire l'ID YouTube
            preg_match('/(?:v=|\/)([0-9A-Za-z_-]{11})/', $url, $matches);
            $videoId = $matches[1] ?? null;

            if ($videoId) {
                $this->videoUrl = "https://www.youtube.com/embed/" . $videoId;
            }
        } elseif (Str::contains($url, 'vimeo.com')) {
            // Extraire l'ID Vimeo
            preg_match('/vimeo\.com\/(\d+)/', $url, $matches);
            $videoId = $matches[1] ?? null;

            if ($videoId) {
                $this->videoUrl = "https://player.vimeo.com/video/" . $videoId;
            }
        } elseif (Str::contains($url, 'bunnycdn.com')) {
            // Pour Bunny, on utilise l'URL directement
            $this->videoUrl = $url;
        }
    }


    public function render()
    {
        return view('livewire.frontend.formation.detail-free');
    }
}
