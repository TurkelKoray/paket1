<?php


namespace App\Core\Services;


use App\Core\Models\User;

class AdminService
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function create($data)
    {
        $createData = [
          "name" => $data["name"],
          "email" => $data["email"],
          "password" => bcrypt($data["password"]),
          "yetki" => $data["yetki"],
        ];

        $this->user->create($createData);
    }

    public function update($id,$data)
    {
        $user = $this->user->find($id);
        $user->name = $data["name"];
        $user->email = $data["email"];
        if (!empty($data["password"])){
            $user->password = bcrypt($data["password"]);
        }
        $user->yetki = $data["yetki"];

        $user->save();
    }

}

