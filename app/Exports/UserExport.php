<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $users = DB::table('users')->select('name', 'email', 'role_name')->get();
        // return User::where('name', 'email', 'role_name');
        return $users;
    }

    public function headings():array
    {
        return ['Nama', 'Email', 'Role'];
    }
}
