<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecordsController extends Controller
{
    public function index()
    {
        $jsonString = file_get_contents(public_path().'/data.json');
        $data['records'] = json_decode($jsonString, true);
        echo "<pre>";
        print_r($data);
        die();
        // return view('records', $data);
    }

    public function managed($page = 0)
    {
        $jsonString = file_get_contents(public_path().'/data.json');
        $records = json_decode($jsonString, true);
        $newRecords = array();
        $ClosedCount = 0;
        $ids = array();
        $open = array();

        if (intval($page) > 1) {
            $PreviousPage = intval($page) - 1;
            $NextPage = intval($page) + 1;
            $init = 10 * (intval($page)-1);
            $end = $init + 10;
        }else{
            $PreviousPage = 0;
            $NextPage = 1;
            $init = 0;
            $end = 10;
        }

        

        for ($i = $init; $i < $end; $i++) {
            array_push($ids, $records[$i]['id']);

            if($records[$i]['color'] == 'red' || $records[$i]['color'] == 'green' || $records[$i]['color'] == 'blue'){
                if ($records[$i]['disposition'] == 'closed') {
                    $ClosedCount++;
                }
            }
            if ($records[$i]['disposition'] == 'open') {
                array_push($open, $records[$i]);
            }
        }

        $new_records = (object)['ids' => $ids, 'open' => $open, 'ClosedCount' => $ClosedCount, 'PreviousPage' => $PreviousPage, 'NextPage' => $NextPage];

        
        echo "<pre>";
        print_r($new_records);
        die();
        // return view('records');
    }
}
