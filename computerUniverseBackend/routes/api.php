<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'App\Http\Controllers\Api'], function() {
    // Все компоненты
    Route::get('parts', 'PartController@index');
    // Определенный компонент со статусом наличия
    Route::get('parts/find', 'PartController@find');
    // Все склады с информацией о директоре
    Route::get('warehouses', 'WarehouseController@index');
    // Все заказы с информацией о заказчике
    Route::get('orders', 'OrderController@index');
    // Конкретный склад с информацией о директоре
    Route::get('warehouses/{id}', 'WarehouseController@show');
    // Конкретный компонент
    Route::get('parts/{model_number}', 'PartController@show');
    // Конкретный заказ c информацией о заказчике
    Route::get('orders/{id}', 'OrderController@show');
    // Обновление информации о комплектующем
    Route::put('parts/{model_number}', 'PartController@update');
    // Добавление комплектующего
    Route::post('parts/', 'PartController@store');
    // Удаление комплектующего
    Route::delete('parts/{model_number}', 'PartController@destroy');
    // Список заказчиков с информацией о менеджере
    Route::get('customers', 'CustomerController@index');
    // Добавление заказчика
    Route::post('customers', 'CustomerController@store');
    // Распечатка номенклатуры
    Route::get('nomenclature/print', 'NomenclatureController@print');


    Route::prefix('auth')->group(function () {
        // Регистрация
        Route::post('register', 'AuthController@register');

        // Вход в систему
        Route::post('login', 'AuthController@login');
        // Обновление токена
        Route::get('refresh', 'AuthController@refresh');

        // Маршруты, доступные после авторизации
        Route::middleware('auth:api')->group(function () {
            // Данные пользователя
            Route::get('user', 'AuthController@user');
            // Выход из аккаунта
            Route::get('logout', 'AuthController@logout');
        });
    });
});
