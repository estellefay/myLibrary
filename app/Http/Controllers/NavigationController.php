<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigationController extends Controller
{
   public function showPage(Request $request)
   {
       if($request->path() !== "/") { // si ma route est différente de /
           try {
                return view($request->path()); // j'essaie d'afficher la page qui corespond à la caleur de l'url
           } catch (\Exception $e) { // si j'essaye de passer une valeur qui n'existe pas dans l'URL
                return abort('404');
           }
       } else {
        return view('welcome'); // Sinon j'affiche la page d'aceuil
       }
   }

   public function testPage() 
   {
           return view('test');
   }
}
