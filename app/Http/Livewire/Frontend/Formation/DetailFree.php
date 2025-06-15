<?php

namespace App\Http\Livewire\Frontend\Formation;

use Livewire\Component;

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
        // Extraire l'ID depuis l'URL (youtube.com/watch?v=xxx)
        preg_match('/[\\?&]v=([^&#]*)/', $url, $matches);
        $videoId = $matches[1] ?? null;

        if ($videoId) {
            $this->videoUrl = "https://www.youtube.com/embed/" . $videoId;
        }
    }

    public function render()
    {
        return view('livewire.frontend.formation.detail-free');
    }
}
