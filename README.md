this is improoved home based framework

new feature sse added. To use it should write following
use App\Core\Event;


Event::fire('name of event',['presentId' =>'1', 'one more dates' => 'some dates']);

atention !!! repeated events shoud commen only once per second !!!
        