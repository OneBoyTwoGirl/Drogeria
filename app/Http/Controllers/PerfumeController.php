<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfumeController extends Controller
{
    public function getPerfumes() {

        $perfumes = Perfume::all();

        return view( "/perfumes" );
    }

    public function newPerfume() {

        return view( "new_perfume" );
    }

    public function storePerfume( Request $request ) {

        $perfume = new Perfume;

        $perfume->name = $request->name;
        $perfume->type = $request->type;
        $perfume->price = (int)$request->price;

        $perfume->save();

        return redirect( "/new-perfume" );
    }

    public function editPerfume( $id ) {

        $perfume = Perfume::find( $id );

        return view( "edit_perfume", [
            "perfume" => $perfume
        ]);
    }

    public function updatePerfume( Request $request ) {

    }

    public function deletePerfume( $id ) {

        $perfume = Perfume::find( $id );
        $perfume->delete();

        return redirect( "/perfumes" );
    }
    public function insertPerfumes(){
        DB::table("perfumes")->insert([
            ["name"=> "PLAYBOY VIP", "type" => "parfum", "price"=>234],
            ["name"=> "Dior savage", "type" => "parfum", "price"=>2300],
            ["name"=> "hajlakk", "type" => "hajlakk", "price"=>1200],
            ["name"=> "AXE CLEAN+FRESH", "type" => "parfum/hidratalo", "price"=>5000]
        ]);
    }
}

