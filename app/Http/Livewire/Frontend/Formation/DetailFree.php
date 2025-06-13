<?php

namespace App\Http\Livewire\Frontend\Formation;

use Livewire\Component;

class DetailFree extends Component
{
    public $formation;
    public $videoEmbedUrl;

    public function mount()
    {
        // Initialisation avec la première vidéo du premier chapitre si possible
        $firstChapitre = $this->formation->modules->first()?->chapitres->first();
        if ($firstChapitre) {
            $this->videoEmbedUrl = $this->makeEmbedUrl($firstChapitre->url_video);
        } else {
            $this->videoEmbedUrl = "https://www.youtube.com/embed/jmfK0qWdMkY"; // fallback
        }
    }

    public function setVideo($url)
    {
        $this->videoEmbedUrl = $this->makeEmbedUrl($url);
    }

    private function makeEmbedUrl($url)
    {
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|embed)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
        $id = $match[1] ?? null;
        return $id ? "https://www.youtube.com/embed/" . $id : "";
    }

    public function render()
    {
        return view('livewire.frontend.formation.detail-free');
    }
}
