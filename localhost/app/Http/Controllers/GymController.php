<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\EquipmentGym;
use App\Gym;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GymController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //для проверки выделенных полей надо заново открывать браузер
        // $g = Gym::orderBy('updated_at', 'desc')->first();
        // $arr = $g->equipments()->pluck('equipment_id')->toArray();

        //$arr = Gym::has('equipments')->get();
        //все связ записи из gyms
       // $arr = $gym->pluck('equipment_id')->toArray();

        $e = Equipment::has('gyms')->get();//все связ записи из equipments
        $arr = $e->pluck('id')->toArray();//все id из equipments

        //все id в таблице
        $equipment = Equipment::all(['id', 'equip_name']);


        return view('gym.input', [
            'arr' =>$arr,
            'equipment' => $equipment
        ]);
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
    public function store(Request $request)
    {
        $reg= $request->equipments;
        $gym = Gym::orderBy('updated_at', 'desc')->first();

        //уже что-то записывали
       if($request->has('id')){

           $e = Equipment::has('gyms')->get();
           //все связ записи из equipments
           $arr = $e->pluck('id')->toArray();

            if(array_diff($reg , $arr)>0)
            {
                $gym->equipments()->attach(array_diff($reg , $arr));
            }
//           $gym = Gym::create([
//               'gym_name' => "",
//               'gym_num' => ""
//           ]);
//           $gym = new Gym;
//           $gym->gym_name = '';
//           $gym->gym_num = '';
//           $gym->save();
//
//           $equipment = new Equipment;
//           $equipment->equip_name = '';
//           $equipment->save();
//
//         $gym->fill($request->all())->save();//перезаписали и сохранили
       }
// первыйраз открыли ссылку
//       else {
//           //создать новыую запись в таблице
////           $equipment = Equipment::create([
////               'equip_name' => ''
////           ]);
//       }
//  $equipment->gyms()->sync($request->get('equipments')[0]);

        return redirect()->action('GymController@index', ['gym' => $gym->id]);
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
        return view('gym.input', ['equipment_gym' => $equipment_gym]);
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

        return redirect()->action("GymController@index", ['id' => $id]);
    }
}
