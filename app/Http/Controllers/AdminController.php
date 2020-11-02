<?php

namespace App\Http\Controllers;

use App\Core\Repositories\AdminRepository\AdminRepository;
use App\Core\Services\AdminService;
use App\Http\FormRequest\UserPostFormRequest;
use App\Http\FormRequest\UserPutFormRequest;
use App\User;
use League\Flysystem\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function welcome(){
        return view("welcome");
    }

    public function index(){
        return view("admin.index");
    }

    public function siteSettings(){
        return view("admin.settings.index");
    }

    public function userindex(){

        $users = User::all();
        return view("admin.users.index",compact('users'));
    }

    public function usercreate(AdminRepository $adminRepository){

        $users = $adminRepository->getUserAll();
        return view("admin.users.create",compact('users'));
    }

    public function store(UserPostFormRequest $userPostFormRequest,AdminService $adminService)
    {
        $inputData = $userPostFormRequest->toArray();
        $adminService->create($inputData);
        return redirect("admin/users/userindex");

    }

    public function edit($id,AdminRepository $adminRepository)
    {
        $user = $adminRepository->getByFindId($id);
        return view("admin.users.edit",compact('user'));
    }

    public function update($id,UserPutFormRequest $userPutFormRequest,AdminService $adminService)
    {
        $inputData = $userPutFormRequest->toArray();
        $adminService->update($id,$inputData);

        return redirect("admin/users/userindex");
    }

    public function destroy($id){

        $user      = User::find($id);

        if ($user->img!="") {
            unlink(public_path()."/uploads/images/".$user->img);
        }

        User::where("id",$id)->delete();

    }

}
