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

        // Vidéo par défaut (YouTube embed)
        $this->videoUrl = 'https://www.youtube.com/embed/MUVKyLYWnfI';
    }

    public function changeVideo($url)
    {
        $this->videoUrl = null;

        // ✅ YouTube
        if (Str::contains($url, ['youtube.com', 'youtu.be'])) {
            preg_match('/(?:v=|\/)([0-9A-Za-z_-]{11})/', $url, $matches);
            $videoId = $matches[1] ?? null;
            if ($videoId) {
                $this->videoUrl = "https://www.youtube.com/embed/" . $videoId;
            }

        // ✅ Vimeo
        } elseif (Str::contains($url, 'vimeo.com')) {
            preg_match('/vimeo\.com\/(\d+)/', $url, $matches);
            $videoId = $matches[1] ?? null;
            if ($videoId) {
                $this->videoUrl = "https://player.vimeo.com/video/" . $videoId;
            }

        // ✅ Bunny.net (.m3u8 ou lien direct signé)
        } elseif (Str::contains($url, ['.m3u8', 'bunnycdn.net', 'b-cdn.net'])) {
            $this->videoUrl = $url;

        // ❌ Type non supporté
        } else {
            $this->videoUrl = null;
        }
    }


    public function render()
    {
        return view('livewire.frontend.formation.detail-free');
    }
}
