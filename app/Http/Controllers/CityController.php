<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;

class CityController extends Controller
{

   public function search_city($city)
   {

      /* query database for `city` that has hyphen(-) into their names */
      $records_to_filter   =  DB::table('postal_codes')
                           ->where('city', 'like', '%-%')
                           ->select(
                              'city'
                           )
                           ->get();
      
      /*  */
      $filter_records = [];

      /*  */
      if ($records_to_filter) {

         foreach($records_to_filter as $record) {

            $filter_records[] = [
               'f_city'       => $record->city,
            ];

         }

      }


      /*  */
      if ( $this->in_multi_array($city, $filter_records) === false ) 
      {
         $formatted_city      = str_replace('-', ' ', $city);

      } else { $formatted_city = $city; }
      
      /* search exact city zip code information */
      $sql  = DB::table('postal_codes')
            ->where('city', 'like', "%$formatted_city%")
            ->select(
                'region',
                'barangay',
                'postal',
                'city',
                'phone_area_code'
            )
            ->get();

      /*  */
      $page_title    = sprintf('%s zip code', ucwords($formatted_city));
      $page_info     = sprintf('%s zip code is not yet in our database.', $formatted_city);

      if ( count($sql) > 0 ) {

         /* modify page title, info/description */
         $page_title    = sprintf('%s zip codes', $sql[0]->city);
         $page_info     = sprintf('%s is within %s and composed of %s barangays with zip codes.', $sql[0]->city, $sql[0]->region, count($sql));
      

         /*  */
         foreach ($sql as $key => $value) {

            $query_data[]        = [
                                    'region'        => $value->region,
                                    'url_region'    => route( 'url_region', [
                                                                              'region' => str_replace(' ', '-', strtolower($value->region))
                                                                           ]),

                                    'barangay'      => $value->barangay,
                                    'barangay_url'  => route( 'url_barangay',   [
                                                                                    'city' => str_replace(' ', '-', strtolower($value->city)), 
                                                                                    'barangay' => str_replace(' ', '-', strtolower($value->barangay))
                                                                              ]),
                                                
                                    'postal'        => $value->postal,
                                    'postal_url'    => route( 'url_zipcode',    [
                                                                                    'code' => str_replace(' ', '-', strtolower($value->postal)), 
                                                                              ]),
                                    
                                    'city'          => $value->city,
                                    'city_url'      => route( 'url_city',   [
                                                                              'city' => str_replace(' ', '-', strtolower($value->city))
                                                                           ]),
                                    
                                    'phone_area_code' => $value->phone_area_code
                              ];

         }
             
         /*  */
         $data    = array(
                     'page_title'    => $page_title,
                     'canonical'     => route('url_city', ['city' => $formatted_city]),
                     'description'   => $page_info,

                     'page_info'     => $page_info,
                     'results'       => json_decode(json_encode($query_data)), /* <- convert array into object */
                     'search_q'      => $formatted_city,
                  );

      }
      else { 

         /*  */
         $data    = array(
                     'page_title'    => $page_title,
                     'canonical'     => null,
                     'description'   => $page_info,

                     'page_info'     => $page_info,
                     'results'       => null,
                     'search_q'      => $formatted_city,
                  );

      }

      return view('pages.zipcodes.city', $data);
      
   }

}
