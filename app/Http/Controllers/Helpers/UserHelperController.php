<?php

namespace App\Http\Controllers\Helpers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserHelperController extends Controller
{
    public function createuser($data)
    {

        $user = User::create([
            'first_name'    => $data['first_name'],
            'last_name'     => $data['last_name'],
            'full_name'     => $data['full_name'],
            'email'         => $data['email'],
            'other_email'   => $data['other_email'],
            'username'      => $data['username'],
            'password'      => $data['password'],
            'phone'         => $data['phone'],
            'other_phone'   => $data['other_phone'],
            'gender'        => $data['gender'],
            'religion'      => $data['religion'],
            'date_of_birth' => $data['date_of_birth'],
            'bio'           => $data['bio'],
        ]);

        if(request()->hasFile('avatar'))
        {
            $this->addNewAvatar($user);
        }

        return $user;
    }

    public function updateuser($data, $id)
    {
        $user = User::where('id', $id)->first();
        $user->update($data);

        if(request()->hasFile('avatar'))
        {

            if(!empty($user->avatar))
            {
                $this->deleteOldAvatar($user);
            }

            $this->addNewAvatar($user);
        }

        return $user;
    }

   /* public function restore($id)
    {


        $user = User::where('id',$id)->withTrashed()->first();
        $user->restore();
        return redirect()->back()->with('success','User restored successfully');
    }

    public function forcedelete($id)
    {


        $user = User::where('id',$id)->withTrashed()->first();
        if($user->hasRole('admin'))
        {


        }elseif ($user->hasRole('parent')) {

            IsParent::where('parent_id',$id)->delete();

        }elseif ($user->hasRole('staff') || $user->hasRole('teacher')) {
            if($user->hasRole('staff')){
                $member = Staff::where('user_id',$id)->first();
            }else{
                $member = Teacher::where('user_id',$id)->first();
            }
            if($member->cv){
                $cv = "/storage/users/{$member->user_id}/{$member->cv}";
                $path = str_replace('\\','/',public_path());

                if(file_exists($path . $cv))
                {
                    unlink($path . $cv);
                }
            }

            $member->delete();

        }elseif ($user->hasRole('student')) {
            $student = Student::where('user_id',$id)->first();
            if(!empty($student->document))
            {
                $document = "/storage/users/{$student->user_id}/{$student->document}";
                $path = str_replace('\\','/',public_path());

                if(file_exists($path . $document))
                {
                    unlink($path . $document);
                }
            }

            $student->delete();
        }
        if(!empty($user->avatar))
        {
            $this->deleteOldAvatar($user);
        }


        $user->syncPermissions();
        $user->syncRoles();
        User::where('id',$id)->forceDelete();

        return back()->with('success','User deleted successfully');;
    }*/

    public function addNewAvatar($user)
    {
        $avatar = request()->file('avatar')->getClientOriginalName();
        request()->file('avatar')->storeAs('/',"/users/{$user->id}/{$avatar}", '');
        $user->update(['avatar' =>  $avatar]);

        return true;
    }

    public function deleteOldAvatar($user)
    {
        $image = "/storage/users/{$user->id}/{$user->avatar}";
        $path = str_replace('\\','/',public_path());

        if(file_exists($path . $image))
        {
            unlink($path . $image);
        }
        return true;
    }

    public function updatepermissions(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->except('_token');
        $user->givePermissionTo($data);

        return redirect()->back()->with('success','Permissions updated successfully');
    }
}
