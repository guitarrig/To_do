<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

use App\API\OpenWeather;

class Weather extends Model
{
    protected $fillable = ['city', 'icon', 'temp', 'hum'];

    public static function current_weather($city){

      $weather = self::where('city', $city)->where('created_at', '>', Carbon::now()->subHour()->toDateTimeString())->first();
        // dd($weather);
      if ($weather) {
        return $weather;
      } else {
        $api = OpenWeather::currentWeather($city);
        $new_weather = new Weather();
        $new_weather->city = $city;
        $new_weather->temp = $api->main->temp;
        $new_weather->hum = $api->main->humidity;
        $new_weather->icon = $api->weather[0]->icon;
        $new_weather->save();
        return $new_weather;
      }

    }
}
