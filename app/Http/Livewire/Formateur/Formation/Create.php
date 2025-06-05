<?php

namespace App\Http\Livewire\Formateur\Formation;

use App\Models\Categorie;
use App\Models\Formation;
use App\Models\Module;
use App\Models\Chapitre;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Create extends Component
{
    use WithFileUploads;

    public $categories;
    public $nom, $categorie_id, $prix_original, $prix_promotion, $date_creation;
    public $niveau, $image, $description;
    public $video_presentation;
    public $modules = [];

    public $selectedOption;
    public $options = [
        'Oui' => 'text',
        'Non' => 'text',
    ];

    protected function rules()
    {
        return [
            'nom' => 'required|string',
            'categorie_id' => 'nullable|exists:categories,id',
            'prix_original' => 'required|numeric|min:1',
            'prix_promotion' => 'nullable|numeric|min:0',
            'date_creation' => 'required|date',
            'niveau' => 'required|string',
            'image' => 'required|image|max:2048', // 2MB
            'description' => 'required|string',
            'selectedOption' => 'required|in:Oui,Non',
            'video_presentation' => $this->selectedOption === 'Oui' ? 'required|mimes:mp4,mov,avi|max:10240' : 'nullable', // 10MB
        ];
    }

    public function mount()
    {
        $this->categories = Categorie::all();
        $this->modules = [];
    }

    public function addModule()
    {
        $this->modules[] = [
            'titre' => '',
            'chapitres' => [],
        ];
    }

    public function removeModule($index)
    {
        unset($this->modules[$index]);
        $this->modules = array_values($this->modules); // Réindexer
    }

    public function addChapitre($moduleIndex)
    {
        $this->modules[$moduleIndex]['chapitres'][] = [
            'nom' => '',
            'url_video' => '',
        ];
    }

    public function removeChapitre($moduleIndex, $chapitreIndex)
    {
        unset($this->modules[$moduleIndex]['chapitres'][$chapitreIndex]);
        $this->modules[$moduleIndex]['chapitres'] = array_values($this->modules[$moduleIndex]['chapitres']);
    }

    public function saveFormation()
    {
        $this->validate();

        $imagePath = null;
        $videoPath = null;

        // Upload image dans public/formations/images
        if ($this->image) {
            $imageName = uniqid() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('uploads/formations/images', $imageName, ['disk' => 'public_root']);
            $imagePath = 'uploads/formations/images/' . $imageName;
        }

        // Création de la formation
        $formation = Formation::create([
            'nom' => $this->nom,
            'categorie_id' => $this->categorie_id,
            'prix_original' => $this->prix_original,
            'prix_promotion' => $this->prix_promotion,
            'date_creation' => $this->date_creation,
            'niveau' => $this->niveau,
            'image' => $imagePath,
            'video_presentation' => $videoPath,
            'payante' => $this->selectedOption,
            'description' => $this->description,
            'formateur_id' => auth('formateur')->id(),
        ]);

        // Création des modules et chapitres
        foreach ($this->modules as $moduleData) {
            $module = Module::create([
                'formation_id' => $formation->id,
                'titre' => $moduleData['titre'],
            ]);

            foreach ($moduleData['chapitres'] as $chapitre) {
                Chapitre::create([
                    'module_id' => $module->id,
                    'nom' => $chapitre['nom'],
                    'url_video' => $chapitre['url_video'],
                ]);
            }
        }

        toastr()->success('Formation créée avec succès :-)', 'Félicitations');
        return redirect('formateur/formations');
    }


    public function render()
    {
        return view('livewire.formateur.formation.create');
    }
}
