<?php
 namespace App\ViewComposers;

use App\Models\User;
use App\Models\UserGroup;
use Illuminate\View\View;

 class viewComposer
 {
     public $movieList = [];
     /**
      * Create a movie composer.
      *
      * @return void
      */
     public function __construct()
     {
         $this->movieList = [
             'Shawshank redemption',
             'Forrest Gump',
             'The Matrix',
             'Pirates of the Carribean',
             'Back to the future',
         ];
     }

     /**
      * Bind data to the view.
      *
      * @param  View  $view
      * @return void
      */
     public function compose(View $view)
     {
         $users = User::all();
        //  dd($users);
         $userGroups = UserGroup::all();
         

         $view->with('users',$users);
         $view->with('userGroups',$userGroups);
         
         $view->with('latestMovie', end($this->movieList));
     }
 }
