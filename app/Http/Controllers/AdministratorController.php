<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdministratorController extends Controller
{
    //
      public function panel ()
      {
        return view ('administrator/panel');
      }

      public function access ()
      {
        return view ('administrator/access');
      }

      public function reports ()
      {
        return view ('administrator/reports');
      }

}
