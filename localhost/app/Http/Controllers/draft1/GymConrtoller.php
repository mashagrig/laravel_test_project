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
        //$t = Gym::find([1, 2, 3]);//выводит строки из таблицы - массив строк, не 404 при отсутствии id=1!!!
        //$t = Gym::findOrFail([2, 3]);//выводит строки из таблицы - массив строк
        // $t = Gym::first(); echo $t;// выведет первую стрку в таблице
        //echo $t[0]->gym_name;//выводит значение из ячейки в первой строке столбца с указанным именем

        //$gym = Gym::where('gym_name', 'like', '%o%')->where(function($query){            $query->where([['id', '>', 1], ['gym_num', 'like', '%3%']]); })->get();

        // $gym = Gym::whereNotBetween('id', [1, 2])->get()[1]->id;
        // $gym = Gym::whereNull('created_at')->get()[0]->gym_name;
        // $gym = Gym::whereColumn('created_at', '=' , 'updated_at')->get();

        //$gym = Gym::whereDate('created_at', '>=', '2017-01-01')->get();
        //$gym = Gym::whereMonth('created_at', '<', '11')->get();
        // $gym = Gym::whereYear('created_at', '<', '2017')->get();

        // $gym = Gym::has('equipments')->get();

        /*
        $gym = Gym::find(2);
        $equip = $gym->equipments;//вызов обязательно отдельной строкой!!!
        //$t = $equip[0]->equip_name;
        foreach ($equip as $key)
            echo $key->equip_name . "<br />";
        */

        // $t = Gym::has('equipments', '=', 2)->get();//выводит строку, для которой соответсвует количество записей в др таблице
        /*
          $t = Gym::whereHas('equipments', function ($query){
              $query::whereYear('created_at', 2017);
          }, '>', 2)->get();

          $t = Gym::whereHas('equipments')
              ->whereDoesntHave('equipments', function ($q){$q->where("created_at", '<', 2017);})//не работает анонимная функция!!!
              ->get();
          */

        //$t = Gym::with('equipments')->get();
        // foreach ($t as $key)  echo $key->id . "<br />";


        // $t = Gym::orderBy('gym_name')->get();
        //foreach ($t as $key)  echo $key->gym_name . "<br />";

        //  $t = Gym::latest()->get();
        // foreach ($t as $key)  echo $key->gym_name . "<br />";

        //$t = Gym::select(["gym_name as name", "gym_num as num"])->orderBy('num', 'desc')->addSelect(["created_at as date"])->get();
        // foreach ($t as $key)  echo $key->name . " - " . $key->num .  " - " . $key->date . "<br />";


        /*
        $t = Gym::select(["gyms.gym_name as name", "gyms.gym_num as num", "equipments.equip_serial_number as serial"])->
            join('equipments', 'gyms.id', '=', 'equipments.id', 'inner')
            ->get();
        */

        //$t = Gym::withCount(['equipments' => function ($q){$q->where("created_at", '<', 2017);}])->get();
        //$t = Gym::withCount('equipments')->first()->equipments_count;
        //обязательно ->first() обращаемся к свойству имя-связи_count


        //$t = Gym::whereYear('created_at', '<' ,2017)->count();
        //$t = Gym::whereYear('created_at', '>' ,2011)->min('gym_num');
        // $t = Gym::whereYear('created_at', '>' ,2011)->max('gym_num');
        // $t = Gym::whereYear('created_at', '>' ,2011)->sum('gym_num');
        //$t = Gym::whereYear('created_at', '>' ,2011)->avg('gym_num');

        /*
        $t = Gym::select([
            "gyms.gym_name as name",
            "gyms.gym_num as num",
            "equipments.equip_serial_number as serial",
            DB::raw("count(equipments.id) as eq_id_count")
            ])
            ->join('equipments', 'gyms.id', '=', 'equipments.id', 'inner')
            ->groupBy('gyms.id')
            ->get();
        */

        /*
        $t = Gym::select([
            "gyms.gym_name as name",
            "gyms.gym_num as num",
            "equipments.equip_serial_number as serial",
            DB::raw("count(equipments.id) as eq_id_count")
        ])
            ->join('equipments', 'gyms.id', '=', 'equipments.id', 'inner')
            ->groupBy('gyms.id')
            ->havingRaw("count(equipments.id) = 1")
            ->orderByRaw('count(equipments.equip_name)', 'desc')
            ->limit(2)
            ->skip(1)
            ->get();

        */

        //метод offset можно использовать только в паре с методом limit
        /*
        $t = Gym::select('gym_num')
            ->offset(2)
            ->limit(1)
            ->get();
        */

        //значения => ключи - все наоборот)))
        //$t = Gym::pluck('gym_num', 'id');
        //$t = Gym::all()->implode('gym_num', ' | ');
        //$t = Gym::exists();//return 1 or 0


        //пагинатор предостаавляет возможность добраться до значений пагинации
        //номер страниц берет из строки запроса http://localhost:8000/gym/1?1
        //
        //$pag = Gym::latest('created_at')->simplePaginate();
        //$t = $pag->currentPage();

        // $pag = Gym::latest('created_at')->paginate();//+2 метода!
        // $t = $pag->lastItem();
        // $t = $pag->lastPage();
        // $t = $pag->total();
        // $t = $pag->url('3');



        //echo $t;


        //$t = Gym::all()->implode('gym_num', ' | ');
        //return view('gym', ['all_gym_num' => $t]);
        //return view('gym.index')->with( ['all_gym_num' => $t]);

        //$t = Gym::all();

//        $equip = EquipmentGym::select([
//            "equipments.equip_name"])
//            ->join('gyms', 'equipment_gym.gym_id', '=', 'gyms.id', 'inner')
//            ->join('equipments', 'equipment_gym.equipment_id', '=', 'equipments.id', 'inner')
//           // ->orderBy("equipments.id")
//            ->get();

//        $equip = Gym::select([
//            "equipments.equip_name"])
//            ->join('equipment_gym', 'gyms.id', '=', 'equipment_gym.gym_id', 'inner')
//            ->join('equipments', 'equipment_gym.equipment_id', '=', 'equipments.id', 'inner')
//            ->orderBy("equipments.id")
//            ->get();

        // return view('gym.index')->with( ['all' => $t]);
        // return view('gym.index', ['equip'=> $equip]);
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


    public function store(Request $request)
    {


//        $gym = EquipmentGym::select([
//                        "gyms.id as id",
//                        "gyms.gym_name as gym_name",
//                        "gyms.gym_num as gym_num"//,
//                       // "gyms.created_at",
//                       // "gyms.updated_at"
//                         ])
//        ->join('gyms', 'equipment_gym.gym_id', '=', 'gyms.id', 'inner')
//        ->join('equipments', 'equipment_gym.equipment_id', '=', 'equipments.id', 'inner')
//        ->where('equipment_gym.id', '=', $request->id)
//        ->get()[0];
//
//        $equipment = EquipmentGym::select([
//                        "equipments.id as id",
//                        "equipments.equip_name as equip_name",
//                        "equipments.equip_serial_number as equip_serial_number",
//                        "equipments.equip_count as  equip_count"//,
//                      //  "equipments.created_at",
//                      //  "equipments.updated_at"
//                    ])
//            ->join('gyms', 'equipment_gym.gym_id', '=', 'gyms.id', 'inner')
//            ->join('equipments', 'equipment_gym.equipment_id', '=', 'equipments.id', 'inner')
//            ->where('equipment_gym.id', '=', $request->id)
//            ->get()[0];

//        if ($request->has("id")){
//            $equipment_gym = EquipmentGym::find($request->id);
//
//            if(($gym->gym_name != $request->gym_name) ||
//                ($gym->gym_num != $request->gym_num) ||
//                ($equipment->equip_name != $request->equip_name)
//            ){
//               //не совпало - надо добавить
//
//                $gym = new Gym;
//                $gym->gym_name = $request->gym_name;
//                $gym->gym_num = $request->gym_num;
//                $gym->save();
//
//                $equipment = new Equipment;
//                $equipment->equip_name = $request->equip_name;
//                $equipment->save();
//
//                $equipment_gym = new EquipmentGym;
//                $equipment_gym->gym_id = $gym->id;
//                $equipment_gym->equipment_id = $equipment->id;
//                $equipment_gym->save();
//            }
//        }

        $eg_id = EquipmentGym::find($request->id, ['gym_id', 'equipment_id']);

        $g_nn = Gym::find( $eg_id->gym_id, ['id', 'gym_name', 'gym_num']);//текущая запись в gym
        $gym_id = $g_nn->id;
        $gym_name = $g_nn->gym_name;
        $gym_num = $g_nn->gym_num;


        $e_nn = Equipment::find( $eg_id->equipment_id, ['id', 'equip_name']);//текущая запись в gym
        $equip_id = $e_nn->id;
        $equip_name = $e_nn->equip_name;



        if ($request->has("id")){

            if(($gym_name != $request->gym_name) ||
                ($gym_num != $request->gym_num) ||
                ($equip_name != $request->equip_name)
            ){
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
                'gym_id' => $request->$gym_id,
                'equip_id' => $request->$equip_id
            ]);
        }
        return redirect()->action('GymController@index', [$gym, $equipment, $equipment_gym]);
    }


//  public function store(Request $request)
//    {
//        $eq_name = EquipmentGym::select([
//            "equipments.equip_name"])
//            ->join('gyms', 'equipment_gym.gym_id', '=', 'gyms.id', 'inner')
//            ->join('equipments', 'equipment_gym.equipment_id', '=', 'equipments.id', 'inner')
//            // ->orderBy("equipments.id")
//            ->where('gyms.id', '=', '$request->id')
//            ->get();
//
//
//        if ($request->has("id")){
//            $gym = Gym::find($request->id);
//            //$eq_name = $request->equip_name;
//
//            // $equip = $request->equip[0];
//            if((Gym::find($request->id)->gym_name !== $request->gym_name) &&                  (Gym::find($request->id)->gym_num !== $request->gym_num) &&
//                (Equipment::find($request->id)->equip_name !== $request->equip_name)
//            ){
//               //не совпало - надо добавить
//                // $gym = Gym::findOrFail($request->id);
//                $gym->fill([
//                'gym_name' => $request->gym_name,
//                'gym_num' => $request->gym_num
//                        ])
//                ->save();
//
//               // $eq_name = $request->equip_name;
////               // $equip = Equipment::findOrFail($request->id);
////                $equip->fill([
////                    'equip_name' => $request->equip_name
////                ])
////                    ->save();
//            }
////            else {
//////                $gym = new Gym;
//////                $gym->gym_name = $request->gym_name;
//////                $gym->gym_num = $request->gym_num;
//////                $gym->save();
////                // Gym::create($request->all());
//////                $gym = Gym::create([
//////                'gym_name' => $request->gym_name,
//////                'gym_num' => $request->gym_num
//////                ]);
//////                $equip = Equipment::create([
//////                    'equip_name' => $request->equip_name
//////                ]);
////            }
//        } else {
//            $gym = Gym::create([
//                'gym_name' => $request->gym_name,
//                'gym_num' => $request->gym_num
//                ]);
//            $eq_name = Equipment::create([
//                'equip_name' => $request->equip_name
//                ]);
//        }
//        return redirect()->action('GymController@index', [$gym, $eq_name]);
//// if ($request->has("id")){
////            $gym = Gym::all();
////            $equip = Equipment::all();
////            if((Gym::find($request->id)->gym_name === $request->gym_name) &&                  (Gym::find($request->id)->gym_num === $request->gym_num) &&
////                (Equipment::find($request->id)->equip_name === $request->equip_name)
////            ){
//////                $gym = Gym::findOrFail($request->id);
//////                $gym->fill([
//////                'gym_name' => $request->gym_name,
//////                'gym_num' => $request->gym_num
//////                        ])
//////                ->save();
//////
//////                $equip = Equipment::findOrFail($request->id);
//////                $equip->fill([
//////                    'equip_name' => $request->equip_name
//////                ])
//////                    ->save();
////            }
////            else {
//////                $gym = new Gym;
//////                $gym->gym_name = $request->gym_name;
//////                $gym->gym_num = $request->gym_num;
//////                $gym->save();
////                // Gym::create($request->all());
////                $gym = Gym::create([
////                'gym_name' => $request->gym_name,
////                'gym_num' => $request->gym_num
////                ]);
////                $equip = Equipment::create([
////                    'equip_name' => $request->equip_name
////                ]);
////            }
////        } else {
////            $gym = Gym::create([
////                'gym_name' => $request->gym_name,
////                'gym_num' => $request->gym_num
////                ]);
////            $equip = Equipment::create([
////                'equip_name' => $request->equip_name
////                ]);
////        }
////        return redirect()->action('GymController@index', [$gym, $equip]);
//    }

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

        // верное рабочее решение
//        $equipment_gym = EquipmentGym::select([
//                            'equipment_gym.id',//id
//                            'equipment_gym.gym_id as gym_id',
//                            'equipment_gym.equipment_id as equipment_id',
//                            //"gyms.id",
//                            "gyms.gym_name",
//                            "gyms.gym_num",
//                            // "gyms.created_at",
//                            //"gyms.updated_at",
//                            //"equipments.id",
//                            "equipments.equip_name",
//                            "equipments.equip_serial_number",
//                            "equipments.equip_count",
//                            // "equipments.created_at",
//                            // "equipments.updated_at"
//                        ])
//                            ->join('gyms', 'equipment_gym.gym_id', '=', 'gyms.id', 'inner')
//                            ->join('equipments', 'equipment_gym.equipment_id', '=', 'equipments.id', 'inner')
//                            // ->orderBy("equipments.id")
//                                ->where('equipment_gym.id', '=', $id)
//                            ->get();
//
//        Gym::destroy( $equipment_gym[0]->gym_id );
//        Equipment::destroy( $equipment_gym[0]->equipment_id );
//
//      //  return redirect()->action("GymController@index", ['id' => $id]);
    }


}
