<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Criando registros pra testes:
Route::get('/addregistros', function () {
  // categorias
  $zero = App\Categoria::create(['titulo' => 'Zero Km']);
  $seminovo = App\Categoria::create(['titulo' => 'Seminovos']);
  $usado = App\Categoria::create(['titulo' => 'Usados']);

  // marcas
  $ford = App\Marca::create(['titulo' => 'Ford', 'descricao' => 'Carros Ford']);
  $fiat = App\Marca::create(['titulo' => 'Fiat', 'descricao' => 'Carros Fiat']);

  // carros (relacionamento com marcas) -> exemplo 1 e 2
  $fiesta = $ford->carros()->create(['titulo' => 'Fiesta', 'descricao' => 'Completo', 'ano' => 2019, 'valor' => 50000]);
  $uno = App\Carro::create(['marca_id' => 1, 'titulo' => 'Uno', 'descricao' => 'Completo', 'ano' => 2015, 'valor' => 30000]);

  // carros (c/ categorias)
  $fiesta->categorias()->attach($zero);
  $uno->categorias()->attach($usado);

  $categorias = [
    new App\Categoria(['titulo' => 'sedan']),
    new App\Categoria(['titulo' => 'hatch']),
    new App\Categoria(['titulo' => 'nacional'])
  ];

  $fiesta->categorias()->saveMany($categorias);
  $uno->categorias()->saveMany($categorias);

  $carros = App\Carro::all();
  $marcas = App\Marca::all();
  $categorias = App\Categoria::all();

  // users (c/ carros)
  $user = App\User::find(1);
  $user->carros()->attach($fiesta);
  $user->carros()->attach($uno);

  return 'Registros criados';
});

Route::get('/testesregistros', function () {
  // carros x marcas
  $carro = App\Carro::find(1);
  // dd($carro->marca);

  // marca x carros
  $marca = App\Marca::find(1);
  // dd($marca->carros);

  // carros x categorias
  // dd($carro->categorias);

  // categorias x carros
  $categoria = App\Categoria::find(1);
  // dd($categoria->carros);

  // carros x users
  // dd($carro->users);

  // users x carros
  $user = App\User::find(1);
  // dd($user->carros);
});


// ROTAS
Route::get('/', function () {
  $slides = [
    (object) [
      'titulo' => 'Título Imagem',
      'descricao' => 'Descrição Imagem',
      'url' => '#link',
      'imagem' => 'http://st.automobilemag.com/uploads/sites/11/2016/02/2017-Chevrolet-Camaro-1LE-homepage.jpg'

    ]
  ];

  $carros = [
    (object) [
      'titulo' => 'Nome do Carro',
      'descricao' => 'Descrição do Carro',
      'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
      'valor' => 'R$150.000,00',
      'url' => url('detalhe')
    ],
    (object) [
      'titulo' => 'Nome do Carro',
      'descricao' => 'Descrição do Carro',
      'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
      'valor' => 'R$150.000,00',
      'url' => url('detalhe')
    ],
    (object) [
      'titulo' => 'Nome do Carro',
      'descricao' => 'Descrição do Carro',
      'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
      'valor' => 'R$150.000,00',
      'url' => url('detalhe')
    ],
    (object) [
      'titulo' => 'Nome do Carro',
      'descricao' => 'Descrição do Carro',
      'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
      'valor' => 'R$150.000,00',
      'url' => url('detalhe')
    ],
    (object) [
      'titulo' => 'Nome do Carro',
      'descricao' => 'Descrição do Carro',
      'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
      'valor' => 'R$150.000,00',
      'url' => url('detalhe')
    ],
    (object) [
      'titulo' => 'Nome do Carro',
      'descricao' => 'Descrição do Carro',
      'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
      'valor' => 'R$150.000,00',
      'url' => url('detalhe')
    ],
    (object) [
      'titulo' => 'Nome do Carro',
      'descricao' => 'Descrição do Carro',
      'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
      'valor' => 'R$150.000,00',
      'url' => url('detalhe')
    ],
    (object) [
      'titulo' => 'Nome do Carro',
      'descricao' => 'Descrição do Carro',
      'imagem' => 'http://o.aolcdn.com/commerce/autodata/images/USC60CHC021A021001.jpg',
      'valor' => 'R$150.000,00',
      'url' => url('detalhe')
    ]
  ];

  return view('site.home', compact('slides', 'carros'));
});

Auth::routes();

Route::get('/contato', function () {
  $galeria = [
    (object) [
      'imagem' => 'http://st.automobilemag.com/uploads/sites/11/2016/02/2017-Chevrolet-Camaro-1LE-homepage.jpg'
    ]
  ];
  return view('site.contato', compact('galeria'));
});
Route::get('/detalhe', function () {
  $galeria = [
    (object) [
      'imagem' => 'http://st.automobilemag.com/uploads/sites/11/2016/02/2017-Chevrolet-Camaro-1LE-homepage.jpg'
    ]
  ];
  return view('site.detalhe', compact('galeria'));
});
Route::get('/empresa', function () {
  $galeria = [
    (object) [
      'imagem' => 'http://st.automobilemag.com/uploads/sites/11/2016/02/2017-Chevrolet-Camaro-1LE-homepage.jpg'
    ]
  ];
  return view('site.empresa', compact('galeria'));
});

Route::get('/home', 'HomeController@index');
