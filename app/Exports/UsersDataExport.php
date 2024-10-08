<?php

namespace App\Exports;



use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsersDataExport implements FromView, ShouldAutoSize
{
    use Exportable;

    private $users;

    public function __construct() {
         $this->users = User::all();
    }



    public function view(): view
    {
        return view('users.index');
    }
}