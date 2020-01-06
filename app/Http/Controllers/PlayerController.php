<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Player_more_information;
use App\Player_statistics;
use App\Http\Requests\PlayerStore;
use App\Http\Requests\PlayerStatisticsStore;
use App\Http\Requests\PlayerInformationsStore;

class PlayerController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->only(['create','store','edit','update','destroy','edit_informations','update_informations','create_statistics','store_statistics', 'edit_statistics', 'update_statistics']);
    }


    public function index()
    {    
        $player = Player::all();
        
        return view('players.index', compact('player'));
    }


    public function create()
    {     
        return view('players.create');
    }


    public function store(PlayerStore $request)
    {  
        Player::create($request->all());

        return redirect('/players');
    }


    public function show(Request $request, $player_id)
    {    
            $player = Player::findorFail($player_id);
            $player_statistics = Player_statistics::where('player_id', $player_id)->latest('created_at')->first();
 
            return view('players.show', compact('player', 'player_statistics'));
    }


    public function show_statistics(Request $request, $player_id)
    {        
            $player = Player::findorFail($player_id);
            $competition_name = request('competition_name');
            $year = request('year');
                
            $player_statistics = Player_statistics::where('player_id', $player_id)->where('competition_name', $competition_name)->where('year', $year)->first();

            if(Player_statistics::all()->contains($player_statistics)){
                return view('players.show', compact('player', 'player_statistics'));
            }
            else{
                $player = Player::findorFail($player_id);
                $player_statistics = Player_statistics::where('player_id', $player_id)->latest('created_at')->first();
                $message = "Record dont exist ! ";

                return view('players.show', compact('player', 'player_statistics'),
                ['message'=>$message]);
                }  
    }


    public function edit(Player $player)
    {
        return view('players.edit', ['player'=>$player]);
    }


    public function update(PlayerStore $request, $id)
    {
        $player = Player::findorFail($id);
        $player->update($request->all());

        return redirect('/players');
    }


    public function destroy(Player $player)
    {    
        $player->delete();
        return redirect('/players');
    }


    public function edit_informations(Player $player_id)
    {
        $player_more_information = Player_more_information::all();

        return view('players.edit_informations', ['player'=>$player_id], compact('player_more_information'));
    }


    public function update_informations(PlayerInformationsStore $request, $player_id)
    {
        $player_more_information = Player_more_information::findorFail($player_id);
        $player_more_information->update($request->all());

        return redirect('players/'. $player_more_information->id);
    }


    public function create_statistics(Player $player_id)
    {
        return view('players.create_statistics', ['player'=>$player_id]);
    }


    public function store_statistics(PlayerStatisticsStore $request, $player_id)
    {
        $data = $request->all();
        $data['player_id'] = $player_id;
        try {
            Player_statistics::create($data);
            return redirect('/players/' . $player_id);
        } catch (\Exception $exception){
            return redirect('/players/' . $player_id . '/create_statistics')->with('message', 'Statistic already exist !');
        }
    }


    public function edit_statistics($player_id, $competition_name, $year)
    {
        $player_statistics = Player_statistics::where('player_id', $player_id)->where('competition_name', $competition_name)->where('year', $year)->first();

        return view('players.edit_statistics', compact('player_statistics'));
    }

    public function update_statistics(PlayerStatisticsStore $request, $player_id, $competition_name, $year)
    {
        $player_statistics = Player_statistics::where('player_id', $player_id)->where('competition_name', $competition_name)->where('year', $year)->first();
        $player_statistics->update($request->all());

        return redirect('/players/'. $player_id);
    }


}
