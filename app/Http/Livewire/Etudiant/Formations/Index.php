<?php

namespace App\Http\Livewire\Etudiant\Formations;

use Livewire\Component;
use Illuminate\Support\Str;

class Index extends Component
{
    public $formation;
    public $videoUrl = '';
    public $currentChapterName = '';
    public $activeModuleIndex = 0;


    public function mount($formation)
    {
        $this->formation = $formation;

        // Charger automatiquement la première vidéo s'il y en a une
        $firstChapter = $formation->formation->modules->first()?->chapitres->first();

        if ($firstChapter) {
            $this->changeVideo($firstChapter->url_video, $firstChapter->nom, 0);
        }
    }

    public function changeVideo($url, $chapterName = '', $moduleIndex = 0)
    {
        $url = trim($url);
        $newUrl = '';
        $isBunny = false;

        // 🔵 Lien YouTube (ex : youtube.com/watch?v=... ou youtu.be/...)
        if (Str::contains($url, ['youtube.com', 'youtu.be'])) {
            preg_match('/(?:v=|\/|embed\/|youtu\.be\/)([0-9A-Za-z_-]{11})/', $url, $matches);
            if (!empty($matches[1])) {
                $newUrl = "https://www.youtube.com/embed/{$matches[1]}";
            }
        }

        // 🟣 Lien Vimeo
        elseif (Str::contains($url, 'vimeo.com')) {
            preg_match('/(?:video\/|vimeo\.com\/)(\d+)/', $url, $matches);
            if (!empty($matches[1])) {
                $newUrl = "https://player.vimeo.com/video/{$matches[1]}";
            }
        }

        // 🟢 Lien Bunny ou lien direct .m3u8
        elseif (Str::contains($url, ['.m3u8', 'bunnycdn.net', 'b-cdn.net'])) {
            $newUrl = $url;
            $isBunny = true;
        }

        // ✅ Si on a réussi à générer une URL valide
        if ($newUrl) {
            $this->videoUrl = $newUrl;
            $this->currentChapterName = $chapterName;

            $this->dispatchBrowserEvent('videoChanged', [
                'url' => $newUrl,
                'isBunny' => $isBunny
            ]);
        }
        $this->activeModuleIndex = $moduleIndex;
    }

    public function render()
    {
        return view('livewire.etudiant.formations.index');
    }
}