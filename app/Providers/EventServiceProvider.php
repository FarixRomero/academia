<?php

namespace App\Providers;

use App\Models\Curso;
use App\Models\CursoUser;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
        Event::listen(BuildingMenu::class, function (BuildingMenu $event) {
            // Add some items to the menu...
            // if(user()->tipo_usuario==1)
            if(Auth::user()->tipo_usuario==1){
                $items = Curso::all()->map(function (Curso $page) {
                    return [
                        'text' => $page['name'],
                        'url' => route('sesion.indexByCurso', $page)
                    ];
                });
                // $event->menu->add(...$items);
                $event->menu->addIn('sesiones', ...$items);

                
            }
            //Estudiante
            $items2 = CursoUser::where('user_id',Auth::user()->id)->get()->map(function (CursoUser $page) {
                return [
                    'text' => $page->curso->name,
                    'url' => route('student.curso.detail', $page->curso->id)
                ];
            });
            $event->menu->add("ESTUDIANTE");
            $event->menu->add(...$items2);
            //Profesor
            $items3 = CursoUser::where('user_id',Auth::user()->id)->get()->map(function (CursoUser $page) {

                return [
                    'text' => $page->curso->name,
                    'url' => route('teacher.examenes.indexByCurso', $page->curso->id)
                ];
            });
            $event->menu->add("PROFESOR");
            $event->menu->add(...$items3);
        });
    
    }
}
