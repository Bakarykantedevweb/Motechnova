<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Droit;
use Yoeunes\Toastr\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index()
    {
        $autorisation = $this->autorisation(Auth::user()->role, 'role.index');
        if ($autorisation == 'false') {
            toastr()->info('Vous n\'avez pas le droit d\'acceder à ces ressources', 'Tentative échoué');
            return redirect()->route('admin.404');
        }
        $droits = Droit::all();
        $roles = Role::all();
        return view('admin.role.index',compact('droits','roles'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        DB::beginTransaction();
        try {
            $role =  Role::create(
                [
                    'nom' => $request->nom,
                    'type' => $request->type
                ]
            );
            $role->droits()->toggle($request->role_droits);

            DB::commit();
            toastr()->success('Role créer avec succes:-)', 'Felicitation');
            return redirect('admin/roles');
        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error('Une Erreur est survenue', $e->getMessage());
            return redirect('admin/roles')->with('error', $e->getMessage());
        }
    }


    public function getDroit(Request $request)
    {
        $id = $request->post('id');
        $role = Role::find($id);
        $droits = Droit::all();
        foreach ($droits as $droit) {
            $exist = '';
            foreach ($role->droits as $roleDroit) {
                if ($droit->id == $roleDroit->id) {
                    $exist = 'checked';
                }
            }

            $html = "
            <div class='col-md-4 mb-3'>
                <div class='card border-primary shadow-sm h-100'>
                    <div class='card-body'>
                        <div class='form-check'>
                            <input class='form-check-input' id='id.$droit->id' $exist name='droits[]' value='$droit->id '
                                type='checkbox' class='ml-1'>
                            <label class='form-check-label fw-bold text-primary'
                                for='id.$droit->id '> 
                                $droit->nom
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            ";
            echo $html;
        }
    }

    public function exceptDroit(Request $request)
    {
        $id = $request->post('id');
        $role = Role::find($id);
        $role_droit = $role->droits;
        $ids = [];
        foreach ($role_droit as $rd) {
            $ids[] = $rd->id;
        }
        $droits = Droit::all();
        foreach ($droits as $droit) {
            if (in_array($droit->id, $ids)) {
                continue;
            } else {
                $html = "<option value='$droit->id'>$droit->nom</option>";
                echo $html;
            }
        }
    }

    public function update(Request $request, Role $role)
    {
        //
        DB::beginTransaction();
        $role = Role::find($request->id);
        try {
            $role->update(
                [
                    'nom' => $request->nom,
                    'type' => $request->type
                ]
            );

            $role->droits()->detach();
            $role->droits()->attach($request->droits);

            DB::commit();
            toastr()->success('Role modifier avec succes:-)', 'Felicitation');
            return redirect('admin/roles');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('admin/roles')->with('error', $e->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        //
        DB::beginTransaction();
        $role = Role::find($request->id);
        try {
            $role->droits()->detach();
            $role->delete();
            DB::commit();
            toastr()->success('Role supprimer avec succes :-)', 'Felicitation');
            return redirect('admin/roles')->with('message', 'Role supprimer avec succes :-)');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('admin/roles')->with('error', 'Attention tu peux pas supprimer un role s\'il contient des Utilisateurs');
            return redirect()->back();
        }
    }
}
