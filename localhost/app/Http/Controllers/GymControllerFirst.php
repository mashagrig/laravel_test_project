<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\EquipmentGym;
use App\Gym;
use App\Http\Requests\GymFirstRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GymControllerFirst extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gym.index');

    }

    public $PageTitle = "Заголовок из контроллера GymController";


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GymFirstRequest $request)
    {
        $equipment_gym = EquipmentGym::findOrNew($request->id, ['gym_id', 'equipment_id']);

        $gym = Gym::findOrNew( $equipment_gym->gym_id, ['id', 'gym_name', 'gym_num']);//текущая запись в gym
        $gym_id = $gym->id;
        $gym_name = $gym->gym_name;
        $gym_num = $gym->gym_num;


        $equipment = Equipment::findOrNew( $equipment_gym->equipment_id, ['id', 'equip_name']);//текущая запись в gym
        $equip_id = $equipment->id;
        $equip_name = $equipment->equip_name;

        if ($request->has("id")){

            if(($gym_name != $request->gym_name) ||
                ($gym_num != $request->gym_num) ||
                ($equip_name != $request->equip_name)
            )
            {
                //не совпало - надо добавить

                $gym = new Gym;
                $gym->gym_name = $request->gym_name;
                $gym->gym_num = $request->gym_num;
                $gym->save();

                $equipment = new Equipment;
                $equipment->equip_name = $request->equip_name;
                $equipment->save();

                $equipment_gym = new EquipmentGym;
                $equipment_gym->gym_id = $gym->id;
                $equipment_gym->equipment_id = $equipment->id;
                $equipment_gym->save();
            }
        }
        else {
            $gym = Gym::create([
                'gym_name' => $request->gym_name,
                'gym_num' => $request->gym_num
            ]);
            $equipment = Equipment::create([
                'equip_name' => $request->equip_name
            ]);
            $equipment_gym = EquipmentGym::create([
                'gym_id' => $gym->id,
                'equipment_id' => $equipment->id
            ]);
        }
        return redirect()->action('GymControllerFirst@index', [$gym, $equipment, $equipment_gym]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Gym $gym)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    public function input($id = null)
    {
        if($id){
            $equipment_gym = EquipmentGym::findOrFail($id);
        } else {
            $equipment_gym = new EquipmentGym;
        }
        return view('gym.index', ['equipment_gym' => $equipment_gym]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //более краткий и оптимальный вариант
        $e_id = EquipmentGym::find($id, ['gym_id', 'equipment_id']);
        $gym_id = Gym::find( $e_id->gym_id );
        try {
            $gym_id->delete();
        } catch (\Exception $e) {
        }

        $equipment_id = Equipment::find( $e_id->equipment_id );
        try {
            $equipment_id->delete();
        } catch (\Exception $e) {
        }

        return redirect()->action("GymControllerFirst@index", ['id' => $id]);
    }
}
