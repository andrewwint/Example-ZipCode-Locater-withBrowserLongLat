<?php

namespace App\Traits;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

trait HasAgents
{
    private function findAgentsByLatLong($lat=0.00, $long=0.00, $sentivity = .04, $country = "'US', 'CA', 'UK', 'JM', 'IN', 'TT', 'AU', 'BR', 'NG', 'MX', 'RU','LC' ")
    {
        $agents = DB::select("
    SELECT *
    FROM agents where postal_code
    IN (SELECT distinct zip FROM geo_zips WHERE latitude
    BETWEEN (? -" . $sentivity . ") AND (? +" . $sentivity . ") AND longitude
    BETWEEN (? - " . $sentivity . " ) AND (? +" . $sentivity . ")) AND country IN (". $country .") LIMIT 75 ",
    [$lat, $lat, $long, $long]);


        $array = array();

        foreach ($agents as $key => $value) {
            foreach ($value as $key_1 => $value_1) {
                $array[$value->userguid][$key_1] = $value_1;
            }
        }
        return $array;
    }

    public function findAgentAllByLatLong($lat=0.00, $long=0.00, $sentivity = .04, $zip)
    {
        $this->getZipByLatLong(0.01 * (int)($lat*100), 0.01 * (int)($long*100));
        $this->findAgentFactory($lat, $long);

        if (!in_array($this->zips->zip, array_flatten($this->agents))) {
            $this->agents = array_reverse($this->agents);
            if (isset($zip)) {
                $this->zips->zip = $zip;
            }
        }

        if (count($this->agents) == 0 && count($this->zips->zip) == 1) {
            $this->agents = $this->getAgentsByZip(substr($this->zips->zip, 0, -1));

            if (count($this->agents) == 0) {
                $this->agents = $this->getAgentsByZip(substr($this->zips->zip, 0, -2));
            }
        }
    }

    private function findAgentFactory($lat=0.00, $long=0.00)
    {
        $min_return_count = 5;

        try {
            $agents_01 = $this->findAgentsByLatLong($lat, $long, .01);
            if (count($agents_01) > $min_return_count) {
                $this->agents = array_reverse($agents_01);
                return $this->agents;
            }
        } catch (Exception $e) {
            \Log::info('Caught exception .01: ', ['message'=> $e->getMessage() ]);
        }

        try {
            $agents_02 = $this->findAgentsByLatLong($lat, $long, .02);
            if (count($agents_02) > $min_return_count) {
                $this->agents = array_merge($agents_01, $agents_02);
                return $this->agents;
            }
        } catch (Exception $e) {
            \Log::info('Caught exception .02: ', ['message'=> $e->getMessage() ]);
        }

        try {
            $agents_03 = $this->findAgentsByLatLong($lat, $long, .03);
            if (count($agents_03) > $min_return_count) {
                $this->agents =  array_merge($agents_01, $agents_02, $agents_03);
                return $this->agents;
            }
        } catch (Exception $e) {
            \Log::info('Caught exception .03: ', ['message'=> $e->getMessage() ]);
        }

        try {
            $agents_04 = $this->findAgentsByLatLong($lat, $long, .04);
            if (count($agents_04) > $min_return_count) {
                $this->agents = array_merge($agents_01, $agents_02, $agents_03, $agents_04);
                return $this->agents;
            }
        } catch (Exception $e) {
            \Log::info('Caught exception .02: ', ['message'=> $e->getMessage() ]);
        }

        try {
            $agents_05 = $this->findAgentsByLatLong($lat, $long, .05);
            if (count($agents_05) > $min_return_count) {
                $this->agents = array_merge($agents_01, $agents_02, $agents_03, $agents_04, $agents_05);
                return $this->agents;
            }
        } catch (Exception $e) {
            \Log::info('Caught exception .02: ', ['message'=> $e->getMessage() ]);
        }

        try {
            $agents_06 = $this->findAgentsByLatLong($lat, $long, .06);
            $this->agents = array_merge($agents_01, $agents_02, $agents_03, $agents_04, $agents_05, $agents_06);
            return $this->agents;
        } catch (Exception $e) {
            \Log::info('Caught exception .02: ', ['message'=> $e->getMessage() ]);
        }
    }


    public function getZipByLatLong($latitude, $longitude)
    {
        try {
            $zip =  DB::select("SELECT * FROM precise_geo_zips WHERE latitude LIKE '".$latitude."%' AND longitude LIKE '".$longitude."%'  LIMIT 1 ", [$latitude, $longitude]);
            if (count($zip) == 1) {
                $this->zips = $zip[0];
                return $zip[0];
            }
        } catch (Exception $e) {
            \Log::info('Caught exception : ', ['message'=> $e->getMessage() ]);
        }

        try {
            $zip =  DB::select("SELECT * FROM precise_geo_zips WHERE latitude BETWEEN (".$latitude." - .02) AND (".$latitude." + .02) AND longitude BETWEEN (".$longitude." -.02) AND (".$longitude." +.02)  LIMIT 1 ", [$latitude, $longitude]);

            if (count($zip) == 1) {
                $this->zips = $zip[0];
                return $zip[0];
            }
        } catch (Exception $e) {
            \Log::info('Caught exception : ', ['message'=> $e->getMessage() ]);
        }

        try {
            $zip =  DB::select("SELECT * FROM precise_geo_zips WHERE latitude BETWEEN (".$latitude." - .03) AND (".$latitude." + .03) AND longitude BETWEEN (".$longitude." -.03) AND (".$longitude." +.03)  LIMIT 1 ", [$latitude, $longitude]);

            if (count($zip) == 1) {
                $this->zips = $zip[0];
                return $zip[0];
            } else {
                $this->zips = array();
                return array();
            }
        } catch (Exception $e) {
            \Log::info('Caught exception : ', ['message'=> $e->getMessage() ]);
        }
    }

    public function getAgentsByZip($zip)
    {
        return $this->where('postal_code', 'like', $zip.'%')->get();
    }

    public function getGeoLocByZip($zip)
    {
        $latlong = array();

        if (isset($zip) && (strlen($zip) > 1 && strlen($zip) < 10)) {
            if (!is_numeric($zip)) {
                $zip = substr($zip, 0, 3);
            }

            $latlong = DB::select("SELECT * FROM precise_geo_zips WHERE zip LIKE '".e($zip)."%' LIMIT 1 ");

            if (count($latlong) == 1) {
                return $latlong[0];
            } else {
                return array();
            }
        }

        return $latlong;
    }

    protected function getUUId($prefix='w122_')
    {
        $r = unpack('v*', fread(fopen('/dev/random', 'r'), 16));
        $uuid = sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x', $r[1], $r[2], $r[3], $r[4] & 0x0fff | 0x4000, $r[5] & 0x3fff | 0x8000, $r[6], $r[7], $r[8]);
        return $prefix . $uuid;
    }

    protected static function AndrewWint()
    {
        $agent = new \App\Agent;

        $agent->userguid = $agent->getUUId();
        $agent->first_name = 'Andrew';
        $agent->last_name = 'Wint';
        $agent->active = 1;
        $agent->password = \App\Agent::generatePassword();
        $agent->agency_name = "Wint 122 Travel";
        $agent->city = "San Francisco";
        $agent->state_province = "CA";
        $agent->postal_code = '90210';
        $agent->country = "USA";
        $agent->phone = "917 123-4568";
        $agent->email = "wint.andrew@gmail.com";
        $agent->save();
    }

    public static function generatePassword()
    {
        return strtoupper(str_random(8));
    }

    public static function resetAutoIncrement()
    {
        $query = DB::select("SELECT (id + 1) as id FROM agents ORDER BY id DESC LIMIT 1");

        if (count($query) > 0) {
            DB::select("ALTER TABLE agents AUTO_INCREMENT =" . $query[0]->id);
            return $query[0]->id;
        }
        return false;
    }

    public static function loadExcel($file = 'All_Grads.xlsx')
    {
        $memory_limit = ini_get('memory_limit');
        ini_set('memory_limit', '500M');
        set_time_limit(8000);
        DB::table('agents')->where('active', 0)->delete();
        \App\Agent::resetAutoIncrement();

        $chunk = 1000;
        $time_start = microtime(true);

        Excel::selectSheetsByIndex(0)->load('storage/app/excels/'.$file)->chunk($chunk, function ($reader) {
            $time_start = microtime(true);
            $id = 0;
            foreach ($reader as $row) {
                if (empty($row->userguid)) {
                    return true;
                }

                if (strlen($row->postalcode) == 4) {
                    $postalcode = "0".$row->postalcode; //Northeast Region Zip Codes
                } elseif (strlen($row->postalcode) == 3) {
                    $postalcode = "00".$row->postalcode; //NY Mid-Island ZIP Codes
                } else {
                    $postalcode = $row->postalcode;
                }

                $agent = new \App\Agent;

                $agent->userguid = $row->userguid;
                $agent->first_name = $row->firstname;
                $agent->last_name = $row->lastname;
                $agent->password = \App\Agent::generatePassword();
                $agent->agency_name = trim($row->agencyname);
                $agent->city = substr($row->city, 0, 31);
                $agent->state_province = substr($row->stateprovince, 0, 31);
                $agent->postal_code = substr($postalcode, 0, 5);
                $agent->country = substr($row->country, 0, 2);
                $agent->phone = substr($row->phonenumber, 0, 31);
                $agent->email = $row->emailaddress;
                $agent->save();
                $id = $agent->id;
            }
            $time_end = microtime(true);

            echo $id . ' - Completed, Chunk Execution Time: '. round(($time_end - $time_start)/60, 2) .' Mins' . "\r\n";
            \Log::info($id . ' - Completed, Chunk Execution Time', ['time'=> ($time_end - $time_start)/60 ]);
        //}, false); when our queues are being used not from Maatwebsite\Excel\Facades\Excel;
        });

        $time_end = microtime(true);

        echo 'Total Execution Time: '. round(($time_end - $time_start)/60, 2) .' Mins' . "\r\n";
        \Log::info('Total Execution Time', ['time'=> ($time_end - $time_start)/60 ]);

        ini_set('memory_limit', $memory_limit); //Resting original settings
        set_time_limit(30); //Resting original settings
        echo 'All Done' . "\r\n";

        \App\Agent::AndrewWint();

        return true;
    }

    public static function upateBookings($file = 'Top_Bookers.xlsx')
    {
        $memory_limit = ini_get('memory_limit');
        ini_set('memory_limit', '500M');
        set_time_limit(8000);

        $chunk = 1000;
        $time_start = microtime(true);

        Excel::selectSheetsByIndex(0)->load('storage/app/excels/'.$file)->chunk($chunk, function ($reader) {
            $time_start = microtime(true);
            $id = 0;

            foreach ($reader as $row) {
                if (!empty($row->emailaddress)) {
                    $agents = new \App\Agent;
                    $agent = $agents->where('email', $row->emailaddress)->first();
                    if (!empty($agent->id)) {
                        $agent->bookings = $row->bookings;
                        $agent->save();
                        $id++;
                    }
                }
            }

            $time_end = microtime(true);
            echo $id . ' - Updated Accounts, Chunk Execution Time: '. round(($time_end - $time_start)/60, 2) .' Mins' . "\r\n";
            \Log::info($id . ' - Updated Accounts, Chunk Execution Time', ['time'=> ($time_end - $time_start)/60 ]);
        //}, false); when our queues are being used not from Maatwebsite\Excel\Facades\Excel;
        });

        $time_end = microtime(true);
        echo 'Total Execution Time: '. round(($time_end - $time_start)/60, 2) .' Mins' . "\r\n";
        \Log::info('Total Execution Time', ['time'=> ($time_end - $time_start)/60 ]);

        ini_set('memory_limit', $memory_limit); //Resting original settings
        set_time_limit(30); //Resting original settings
        echo 'All Done' . "\r\n";
        return true;
    }
}
