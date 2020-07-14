<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* factory(App\Product::class, 5)->create(); */

        Product::create([
            'category_id' => 5,
            'common_name' => 'Aguacatillo',
            'scientific_name' => 'Persea caerulea',
            'cost' => 100,
            'stock' => 38,
            'use' => 'Uso por definir',
            'image' => 'productsimg/hXeN5Lzs03HnxZWgtxTTIB1yiD0eC04azKQlYbfQ.png'
        ]);
    
        Product::create([
            'category_id' => 4,
            'common_name' => 'Alcaparro Gigante',
            'scientific_name' => 'Chamaesena colombiana',
            'cost' => 500,
            'stock' => 29,
            'use' => 'Uso por definir',
            'image' => 'productsimg/provisionalproducto.jpeg'
        ]);
    
        Product::create([
            'category_id' => 3,
            'common_name' => 'Alcaparro enano',
            'scientific_name' => 'Senna sp.',
            'cost' => 2400,
            'stock' => 30,
            'use' => 'Uso por definir',
            'image' => 'productsimg/provisionalproducto.jpeg'
        ]);
    
        Product::create([
            'category_id' => 3,
            'common_name' => 'Aliso',
            'scientific_name' => 'Alnus jurulensis',
            'cost' => 600,
            'stock' => 30,
            'use' => 'Uso por definir',
            'image' => 'productsimg/mcohHsZRWOzfAWwI2wallbMbFxOTZvmuWT6bD75M.png'
        ]);
    
        Product::create([
            'category_id' => 2,
            'common_name' => 'Amarrabollo',
            'scientific_name' => 'Meriania nobilis',
            'cost' => 800,
            'stock' => 13,
            'use' => 'Uso por definir',
            'image' => 'productsimg/provisionalproducto.jpeg'
        ]);
    
        Product::create([
            'category_id' => 3,
            'common_name' => 'Arrayan ',
            'scientific_name' => 'Myrcia popayanensis',
            'cost' => 2300,
            'stock' => 8,
            'use' => 'Uso por definir',
            'image' => 'productsimg/provisionalproducto.jpeg'
        ]);
    
        Product::create([
            'category_id' => 3,
            'common_name' => 'Candelo ',
            'scientific_name' => 'Hyeronima antioquensis',
            'cost' => 4000,
            'stock' => 2,
            'use' => 'Uso por definir',
            'image' => 'productsimg/provisionalproducto.jpeg'
        ]);
    
        Product::create([
            'category_id' => 1,
            'common_name' => 'Caimo',
            'scientific_name' => 'Licania sp.',
            'cost' => 3200,
            'stock' => 21,
            'use' => 'Uso por definir',
            'image' => 'productsimg/provisionalproducto.jpeg'
        ]);
    
        Product::create([
            'category_id' => 5,
            'common_name' => 'Cedro de Altura',
            'scientific_name' =>  'Cedrela montana',
            'cost' => 3800,
            'stock' => 28,
            'use' =>  'Uso por definir',
            'image' => 'productsimg/provisionalproducto.jpeg'
        ]);
    
        Product::create([
            'category_id' =>  4,
            'common_name' => 'Cedro negro',
            'scientific_name' => 'Juglans neotropica',
            'cost' => 4300,
            'stock' =>  3,
            'use' => 'Uso por definir',
            'image' => 'productsimg/provisionalproducto.jpeg'
        ]);
    
        Product::create([
            'category_id' =>  1,
            'common_name' => 'Chachafruto',
            'scientific_name' => 'Erythrina edulis',
            'cost' => 300,
            'stock' => 21,
            'use' => 'Uso por definir',
            'image'=> 'productsimg/provisionalproducto.jpeg'
        ]);
    
        Product::create([
            'category_id' => 4,
            'common_name' => 'Chagualo 2',
            'scientific_name' => 'Chrysoclamis sp.',
            'cost' => 2100,
            'stock' => 38,
            'use' => 'Uso por definir',
            'image' => 'productsimg/provisionalproducto.jpeg'
        ]);
    
        Product::create([
            'category_id' => 2,
            'common_name' => 'Chirlobirlo',
            'scientific_name' => 'Tecoma stans',
            'cost' => 4800,
            'stock' => 8,
            'use' => 'Uso por definir',
            'image' => 'productsimg/provisionalproducto.jpeg'
             ]);
    
        Product::create([
            'category_id' => 3,
            'common_name' => 'Chilco colorado',
            'scientific_name' => 'Escalonia paniculata',
            'cost' => 2700,
            'stock' => 20,
            'use' => 'Uso por definir',
            'image' => 'productsimg/provisionalproducto.jpeg'
        ]);
    
        Product::create([
            'category_id' => 5,
            'common_name' => 'Chocho',
            'scientific_name' => 'Ormosia antioquensis',
            'cost' => 4100,
            'stock' => 3,
            'use' => 'Uso por definir',
            'image' => 'productsimg/provisionalproducto.jpeg'
        ]);
    
        Product::create([
            'category_id' => 2,
            'common_name' => 'Cotonister',
            'scientific_name' => 'Cotoneaster pannosus',
            'cost' => 2200,
            'stock' => 30,
            'use' => 'Uso por definir',
            'image' => 'productsimg/provisionalproducto.jpeg'
        ]);
    
        Product::create([
            'category_id' => 3,
            'common_name' => 'Cochobo',
            'scientific_name' => 'Myrcianthes ',
            'cost' => 3800,
            'stock' => 21,
            'use' => 'Uso por definir', 
            'image' => 'productsimg/provisionalproducto.jpeg'
        ]);
    
        Product::create([
            'category_id' => 3,
            'common_name' => 'Drago',
            'scientific_name' => 'Croton magdalenensis',
            'cost' => 2200,
            'stock' => 19,
            'use' => 'Uso por definir',
            'image' =>  'productsimg/provisionalproducto.jpeg'
        ]);
    
        Product::create([
            'category_id' => 1,
            'common_name' => 'Espadero',
            'scientific_name' => 'Myrsine coreacea',
            'cost' => 4900,
            'stock' => 1,
            'use' => 'Uso por definir',
            'image' => 'productsimg/provisionalproducto.jpeg',
                 
        ]);
    
        Product::create([
            'category_id' => 4,
            'common_name' => 'Eugenio',
            'scientific_name' => 'Eugenio myrtiflora',
            'cost' => 2900,
            'stock' => 2,
            'use' => 'Uso por definir',
            'image' => 'productsimg/provisionalproducto.jpeg',
                 
        ]);
    
        Product::create([
            'category_id' => 5,
            'common_name' => 'Guamo',
            'scientific_name' => 'Inga sp.',
            'cost' => 4600,
            'stock' => 30,
            'use' => 'Uso por definir',
            'image' => 'productsimg/provisionalproducto.jpeg',
                 
        ]);
    
        Product::create([
            'category_id' => 5,
            'common_name' => 'Guarango',
            'scientific_name' => 'Tara espinosa',
            'cost' => 4200,
            'stock' => 28,
            'use' => 'Uso por definir',
            'image' => 'productsimg/provisionalproducto.jpeg',
                 
        ]);
    
        Product::create([
            'category_id' => 5,
            'common_name' => 'Nuevo reforestador 1',
            'scientific_name' => 'nombre científico',
            'cost' => 2500,
            'stock' => 34,
            'use' => 'Reforestación',
            'image' => 'productsimg/provisionalproducto.jpeg',
        ]);
    }
}
