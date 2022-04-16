<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPasswordRequest;
use App\Models\Certificate;
use App\Models\Country;
use App\Models\Education;
use App\Models\Experience;
use App\Models\File;
use App\Models\Languague;
use App\Models\Langue;
use App\Models\Link;
use App\Models\Role;
use App\Models\Skill;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->with('wallet')->get();
        $roles = Role::all();
        return view('livewire.backend.roles.role',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $id)
    {

        //dd($request->all());

        $user = User::findOrfail($id);

        $user->nom = Str::upper(addslashes($request->nom));

        $user->prenom = Str::ucfirst(addslashes($request->prenom));

        $user->address = Str::ucfirst(addslashes($request->address));

        $user->state = Str::ucfirst(addslashes($request->state));

        $user->zipcode = Str::ucfirst(addslashes($request->zipcode));

        $user->pseudo = Str::ucfirst(addslashes($request->pseudo));

        $user->profil_description = Str::ucfirst(addslashes($request->profil_description));

        $user->profil = Str::ucfirst(addslashes($request->profil));

        $user->telephone = $request->telephone;

        $user->gender = $request->gender;

        $user->price_type = $request->price_type;

        $user->hire_price = $request->hire_price;

        $user->experience = $request->experience ?? 0;

        $user->email = $request->email;

        $user->save();

        if($request->profil_link){

            if($user->personal_link){

                $user->personal_link->url = $request->profil_link;

                $user->personal_link->save();
            }
            else{

                $profil_link = new Link([
                    'name' => "personal_link",
                    'url' => $request->profil_link,
                ]);

                $user->personal_link()->save($profil_link);
            }

        }

        if($request->behance_link){

            if($user->be_link){

                $user->be_link->url = $request->behance_link;

                $user->be_link->save();
            }
            else{

                $behance_link = new Link([
                    'name' => "be_link",
                    'url' => $request->behance_link,
                ]);

                $user->be_link()->save($behance_link);
            }

        }

        if($request->dribble_link){

            if($user->dribble_link){

                $user->dribble_link->url = $request->dribble_link;

                $user->dribble_link->save();
            }
            else{

                $dribble_link = new Link([
                    'name' => "dribble_link",
                    'url' => $request->dribble_link,
                ]);

                $user->dribble_link()->save($dribble_link);
            }

        }

        if($request->linkedin_link){

            if($user->linkedin_link){

                $user->linkedin_link->url = $request->linkedin_link;

                $user->linkedin_link->save();
            }
            else{

                $linkedin_link = new Link([
                    'name' => "linkedin_link",
                    'url' => $request->linkedin_link,
                ]);

                $user->linkedin_link()->save($linkedin_link);
            }

        }

        if($request->tw_link){

            if($user->tw_link){

                $user->tw_link->url = $request->tw_link;

                $user->tw_link->save();
            }
            else{

                $tw_link = new Link([
                    'name' => "tw_link",
                    'url' => $request->tw_link,
                ]);

                $user->tw_link()->save($tw_link);
            }

        }

        if($request->fb_link){

            if($user->fb_link){

                $user->fb_link->url = $request->fb_link;

                $user->fb_link->save();
            }
            else{

                $fb_link = new Link([
                    'name' => "fb_link",
                    'url' => $request->fb_link,
                ]);

                $user->fb_link()->save($fb_link);
            }

        }

        if($request->skills){

            $skills = $request->skills;

            foreach ($skills as $expertise) {

                if(!in_array($expertise,$user->skills->pluck('name')->toArray())){
                    $skill = new Skill([
                        'name' => Str::ucfirst(addslashes($expertise)),
                    ]);

                    $user->skills()->save($skill);
                }

            }

        }

        if($request->certificates){

            for ($i=0; $i < count($request->certificates) ; $i++) {

                $certificate = $request->certificates[$i];

                $date = $request->dates[$i];

                if(!in_array($certificate,$user->user_certificates->pluck('certificate')->toArray())){


                    $certificate = new Certificate([
                        'certificate' => Str::ucfirst(addslashes($certificate)),
                        'date' => $date,
                        'user_id' =>$user->id,
                    ]);

                    $user->user_certificates()->save($certificate);
                }
            }

        }

        if($request->langues){

            $langues = $request->langues;

            for ($i=0; $i < count($langues) ; $i++) {

                if(!in_array($langues[$i],$user->user_langues->pluck('langue')->toArray())){


                    $langue = new Langue([
                        'langue' => Str::ucfirst(addslashes($langues[$i])),
                        'level' => $request->levels[$i],
                        'user_id' =>$user->id,
                    ]);

                    $user->user_langues()->save($langue);
                }
            }

        }


        if($request->experiences){


            for ($i=0; $i < count($request->experiences) ; $i++) {

                if(!in_array($request->experiences[$i],$user->user_experiences->pluck('name')->toArray())){


                    $experience = new Experience([
                        'name' => Str::ucfirst(addslashes($request->experiences[$i])),
                        'description' => Str::ucfirst(addslashes(preg_replace("/\r|\n/", "",$request->experience_descriptions[$i]))),
                        'compagny' => Str::ucfirst(addslashes($request->compagnies[$i])),
                        'start-at' => $request->experience_starts[$i],
                        'end-at' => $request->experience_ends[$i],
                        'user_id' =>$user->id,
                    ]);

                    $user->user_experiences()->save($experience);
                }
            }

        }


        if($request->educations){

            for ($i=0; $i < count($request->educations) ; $i++) {

                if(!in_array($request->educations[$i],$user->user_educations->pluck('degree')->toArray())){

                    $education = new Education([
                        'degree' => Str::ucfirst(addslashes($request->educations[$i])),
                        'description' => Str::ucfirst(addslashes(preg_replace("/\r|\n/", "",$request->education_descriptions[$i]))),
                        'school' => Str::ucfirst(addslashes($request->schools[$i])),
                        'start-at' => $request->education_starts[$i],
                        'end-at' => $request->education_ends[$i],
                        'user_id' =>$user->id,
                    ]);

                    $user->user_educations()->save($education);
                }
            }

        }


        if (isset($request->files) && $request->file('profile')) {
            //$user = User::findOrfail($id);
            $photoProfile = $request->file('profile');

                $file =  $user->profile;



                $filename = uniqid('profile_', true) . Str::random(10) . '.' . time() . $user->id . $photoProfile->getClientOriginalName();
                $path = $photoProfile->move('users_profils/', $filename);
                $fichier = new File([
                    'name' => $filename,
                    'url' => $path,
                ]);

                $user->profile()->save($fichier);

                $user->save();

                $path = public_path().'/'.optional($file)->url;

                if(\File::exists($path)){
                    \File::delete($path);
                }

                optional($file)->delete();
        }

        if ($request->ajax()) {
            return response()->json([
                'status' => "success",
                'message' => "Utilisateur mis à jour avec succès.",
            ]);
        }

        return back()->with('success', 'Profil updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function account_settings(){
        $countries = Country::all();
        return view('livewire.backend.user-account.account-setting',compact('countries'));
    }

    public function verify_account(){
        return view('livewire.backend.user-account.verify-account');
    }

    public function reset_password(){
        return view('livewire.backend.user-account.reset-account');
    }

    public function delete_account(){
        return view('livewire.backend.user-account.delete-account');
    }



    public function resetPassword(ResetPasswordRequest $request){
        //
        $user = Auth::user();

        if (!(Hash::check($request->current_password, $user->password))) {
            //return back()->with(['current_password'=>'Mot de passe actuel incorrect']);
            return back()->withErrors('Mot de passe actuel incorrect');
        }

        if ((Hash::check($request->password, $user->password))) {
            //return back()->with(['password'=>'Veuillez utiliser un mot de passe autre que le mot de passe actuel']);
            return back()->withErrors('Veuillez utiliser un mot de passe autre que le mot de passe actuel');
        }

        $user->password = Hash::make($request['password']);

        $user->save();

        return back()->withSuccess('Mise à jour éffectué');


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteSkill($id)
    {
        $skill = Skill::findOrfail($id);
        $skill->delete();

        return response()->json([
            'message'=>'Skill was deleted',
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteEducation($id)
    {
        $skill = Education::findOrfail($id);
        $skill->delete();

        return response()->json([
            'message'=>'Education was deleted',
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCertificate($id)
    {
        $certificate = Certificate::findOrfail($id);
        $certificate->delete();

        return response()->json([
            'message'=>'Certificate was deleted',
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteExperience($id)
    {
        $experience = Experience::findOrfail($id);
        $experience->delete();

        return response()->json([
            'message'=>'Experience was deleted',
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteLanguague($id)
    {
        $langue = Langue::findOrfail($id);
        $langue->delete();

        return response()->json([
            'message'=>'Languague was deleted',
        ],200);
    }
}
