<?php

namespace App\Http\Livewire\Formateur\Formation;

use App\Models\Categorie;
use App\Models\Formation;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public Formation $formation;
    public $formationId;

    public $nom;
    public $image;
    public $modules = [];
    public $modulesCollapsed = [];

    public $selectedOption;
    public $prix_original, $prix_promotion;
    public $niveau, $categorie_id, $video_presentation, $date_creation;
    public $description, $large_description;

    public $options = [
        'Oui' => 'text',
        'Non' => 'text',
    ];

    protected $rules = [
        'nom' => 'required|string|max:255',
        'niveau' => 'required|string',
        'categorie_id' => 'required|exists:categories,id',
        'video_presentation' => 'nullable|string',
        'date_creation' => 'nullable|date',
        'description' => 'nullable|string',
        'large_description' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
    ];

    public function mount($formationId)
    {
        $id = decrypt($formationId);
        $this->formation = Formation::with('modules.chapitres')->findOrFail($id);
        $this->formationId = $id;

        // Pré-remplissage des champs
        $this->nom = $this->formation->nom;
        $this->selectedOption = $this->formation->payante ? 'Oui' : 'Non';
        $this->prix_original = $this->formation->prix_original;
        $this->prix_promotion = $this->formation->prix_promotion;
        $this->niveau = $this->formation->niveau;
        $this->categorie_id = $this->formation->categorie_id;
        $this->video_presentation = $this->formation->video_presentation;
        $this->date_creation = $this->formation->date_creation;
        $this->description = $this->formation->description;
        $this->large_description = $this->formation->large_description;

        $this->loadFormation();
    }

    public function loadFormation()
    {
        $this->modules = $this->formation->modules->map(function ($module) {
            return [
                'id' => $module->id,
                'titre' => $module->titre,
                'chapitres' => $module->chapitres->map(function ($chapitre) {
                    return [
                        'id' => $chapitre->id,
                        'nom' => $chapitre->nom,
                        'url_video' => $chapitre->url_video,
                    ];
                })->toArray()
            ];
        })->toArray();
    }

    public function addModule()
    {
        $this->modules[] = [
            'titre' => '',
            'chapitres' => [],
        ];
        $this->modulesCollapsed[] = false;
    }

    public function removeModule($index)
    {
        unset($this->modules[$index]);
        unset($this->modulesCollapsed[$index]);
        $this->modules = array_values($this->modules);
        $this->modulesCollapsed = array_values($this->modulesCollapsed);
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

    public function toggleModule($index)
    {
        $this->modulesCollapsed[$index] = !($this->modulesCollapsed[$index] ?? false);
    }

    public function update()
    {
        $this->validate();

        $this->formation->nom = $this->nom;
        $this->formation->payante = $this->selectedOption === 'Oui';
        $this->formation->prix_original = $this->selectedOption === 'Oui' ? $this->prix_original : null;
        $this->formation->prix_promotion = $this->selectedOption === 'Oui' ? $this->prix_promotion : null;
        $this->formation->niveau = $this->niveau;
        $this->formation->categorie_id = $this->categorie_id;
        $this->formation->video_presentation = $this->video_presentation;
        $this->formation->date_creation = $this->date_creation;
        $this->formation->description = $this->description;
        $this->formation->large_description = $this->large_description;

        // Upload de l'image si changée
        if ($this->image) {
            $path = $this->image->store('formations', 'public');
            $this->formation->image = $path;
        }

        $this->formation->save();

        // Recréer modules et chapitres
        foreach ($this->modules as $moduleData) {
            $module = $this->formation->modules()->create([
                'titre' => $moduleData['titre'],
            ]);

            foreach ($moduleData['chapitres'] as $chapitreData) {
                $module->chapitres()->create([
                    'nom' => $chapitreData['nom'],
                    'url_video' => $chapitreData['url_video'] ?? null,
                ]);
            }
        }
        // toastr()->success("Formation mise à jour avec succès.");
        session()->flash('success', 'Formation mise à jour avec succès.');
        return redirect("formateur/formations");
    }

    public function render()
    {
        return view('livewire.formateur.formation.edit', [
            'categories' => Categorie::all(),
        ])->extends('layouts.formateur')->section('content');
    }
}
