<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    function index()
    {
        return view('search.index', compact('search'));
    }

    function action(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('news_items')
                    ->where('title', 'like', '%'.$query.'%')
                    ->orWhere('image', 'like', '%'.$query.'%')
                    ->orWhere('description', 'like', '%'.$query.'%')
                    ->orWhere('category_id', 'like', '%'.$query.'%')
                    ->orderBy('CustomerID', 'desc')
                    ->get();

            }
            else
            {
                $data = DB::table('news_items')
                    ->orderBy('title', 'desc')
                    ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
        <tr>
         <td>'.$row->title.'</td>
         <td>'.$row->image.'</td>
         <td>'.$row->description.'</td>
        </tr>
        ';
                }
            }
            else
            {
                $output = '
       <tr>
        <td align="center" colspan="5">Geen Data gevonden</td>
       </tr>
       ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);

            return view('search.action', compact('search.action'));
        }
    }
}
