<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $electronicsCategories = [
            [
                'name' => 'Смартфоны и аксессуары',
                'slug' => 'smartphones-and-accessories',
                'children' => [
                    ['name' => 'Смартфоны', 'slug' => 'smartphones'],
                    ['name' => 'Чехлы для смартфонов', 'slug' => 'phone-cases'],
                    ['name' => 'Защитные стекла и пленки', 'slug' => 'screen-protectors'],
                    ['name' => 'Зарядные устройства', 'slug' => 'chargers'],
                    ['name' => 'Power Bank', 'slug' => 'power-banks'],
                    ['name' => 'Наушники и гарнитуры', 'slug' => 'headphones'],
                    ['name' => 'Bluetooth-гарнитуры', 'slug' => 'bluetooth-headsets'],
                    ['name' => 'Кабели и переходники', 'slug' => 'cables-adapters'],
                ]
            ],
            [
                'name' => 'Ноутбуки и компьютеры',
                'slug' => 'laptops-and-computers',
                'children' => [
                    ['name' => 'Ноутбуки', 'slug' => 'laptops'],
                    ['name' => 'Игровые ноутбуки', 'slug' => 'gaming-laptops'],
                    ['name' => 'Ультрабуки', 'slug' => 'ultrabooks'],
                    ['name' => 'Моноблоки', 'slug' => 'all-in-one-pcs'],
                    ['name' => 'Настольные компьютеры', 'slug' => 'desktop-pcs'],
                    ['name' => 'Мини-ПК', 'slug' => 'mini-pcs'],
                    ['name' => 'Серверы и NAS', 'slug' => 'servers-nas'],
                ]
            ],
            [
                'name' => 'Планшеты и электронные книги',
                'slug' => 'tablets-and-ebooks',
                'children' => [
                    ['name' => 'Планшеты', 'slug' => 'tablets'],
                    ['name' => 'Графические планшеты', 'slug' => 'drawing-tablets'],
                    ['name' => 'Электронные книги (E-Ink)', 'slug' => 'e-readers'],
                    ['name' => 'Аксессуары для планшетов', 'slug' => 'tablet-accessories'],
                ]
            ],
            [
                'name' => 'Телевизоры и домашний кинотеатр',
                'slug' => 'tv-and-home-theater',
                'children' => [
                    ['name' => 'Телевизоры', 'slug' => 'televisions'],
                    ['name' => 'OLED телевизоры', 'slug' => 'oled-tvs'],
                    ['name' => 'QLED / Mini-LED телевизоры', 'slug' => 'qled-mini-led-tvs'],
                    ['name' => 'Саундбары', 'slug' => 'soundbars'],
                    ['name' => 'Домашние кинотеатры', 'slug' => 'home-theater-systems'],
                    ['name' => 'Проекторы', 'slug' => 'projectors'],
                    ['name' => 'ТВ-приставки и медиаплееры', 'slug' => 'tv-boxes'],
                ]
            ],
            [
                'name' => 'Аудио техника',
                'slug' => 'audio-equipment',
                'children' => [
                    ['name' => 'Беспроводные наушники', 'slug' => 'wireless-headphones'],
                    ['name' => 'Проводные наушники', 'slug' => 'wired-headphones'],
                    ['name' => 'Портативные колонки', 'slug' => 'portable-speakers'],
                    ['name' => 'Умные колонки', 'slug' => 'smart-speakers'],
                    ['name' => 'Музыкальные центры', 'slug' => 'music-centers'],
                    ['name' => 'AV-ресиверы', 'slug' => 'av-receivers'],
                    ['name' => 'Микрофоны', 'slug' => 'microphones'],
                ]
            ],
            [
                'name' => 'Фото и видео техника',
                'slug' => 'photo-and-video',
                'children' => [
                    ['name' => 'Цифровые фотоаппараты', 'slug' => 'digital-cameras'],
                    ['name' => 'Беззеркальные камеры', 'slug' => 'mirrorless-cameras'],
                    ['name' => 'Зеркальные камеры', 'slug' => 'dslr-cameras'],
                    ['name' => 'Экшен-камеры', 'slug' => 'action-cameras'],
                    ['name' => 'Видеокамеры', 'slug' => 'camcorders'],
                    ['name' => 'Объективы', 'slug' => 'camera-lenses'],
                    ['name' => 'Штативы и стабилизаторы', 'slug' => 'tripods-stabilizers'],
                    ['name' => 'Дроны', 'slug' => 'drones'],
                ]
            ],
            [
                'name' => 'Игровая техника',
                'slug' => 'gaming',
                'children' => [
                    ['name' => 'Игровые приставки', 'slug' => 'gaming-consoles'],
                    ['name' => 'Игровые ПК', 'slug' => 'gaming-pcs'],
                    ['name' => 'Игровые мониторы', 'slug' => 'gaming-monitors'],
                    ['name' => 'Игровые клавиатуры', 'slug' => 'gaming-keyboards'],
                    ['name' => 'Игровые мыши', 'slug' => 'gaming-mice'],
                    ['name' => 'Игровые кресла', 'slug' => 'gaming-chairs'],
                    ['name' => 'VR-очки', 'slug' => 'vr-headsets'],
                ]
            ],
            [
                'name' => 'Умный дом и IoT',
                'slug' => 'smart-home',
                'children' => [
                    ['name' => 'Умные лампы и освещение', 'slug' => 'smart-lighting'],
                    ['name' => 'Умные розетки', 'slug' => 'smart-plugs'],
                    ['name' => 'Умные камеры видеонаблюдения', 'slug' => 'smart-cameras'],
                    ['name' => 'Умные замки', 'slug' => 'smart-locks'],
                    ['name' => 'Роботы-пылесосы', 'slug' => 'robot-vacuums'],
                    ['name' => 'Умные термостаты', 'slug' => 'smart-thermostats'],
                    ['name' => 'Яндекс.Станция / Google Home / Alexa', 'slug' => 'smart-assistants'],
                ]
            ],
            [
                'name' => 'Бытовая техника',
                'slug' => 'home-appliances',
                'children' => [
                    ['name' => 'Холодильники', 'slug' => 'refrigerators'],
                    ['name' => 'Стиральные машины', 'slug' => 'washing-machines'],
                    ['name' => 'Кондиционеры', 'slug' => 'air-conditioners'],
                    ['name' => 'Пылесосы', 'slug' => 'vacuum-cleaners'],
                    ['name' => 'Микроволновые печи', 'slug' => 'microwave-ovens'],
                    ['name' => 'Мультиварки и аэрогрили', 'slug' => 'multicookers'],
                ]
            ],
            [
                'name' => 'Комплектующие для ПК',
                'slug' => 'pc-components',
                'children' => [
                    ['name' => 'Процессоры', 'slug' => 'processors'],
                    ['name' => 'Видеокарты', 'slug' => 'graphics-cards'],
                    ['name' => 'Материнские платы', 'slug' => 'motherboards'],
                    ['name' => 'Оперативная память', 'slug' => 'ram'],
                    ['name' => 'SSD и HDD', 'slug' => 'storage'],
                    ['name' => 'Блоки питания', 'slug' => 'power-supplies'],
                    ['name' => 'Корпуса', 'slug' => 'pc-cases'],
                    ['name' => 'Системы охлаждения', 'slug' => 'cooling-systems'],
                ]
            ],
            [
                'name' => 'Офисная техника',
                'slug' => 'office-equipment',
                'children' => [
                    ['name' => 'Принтеры и МФУ', 'slug' => 'printers'],
                    ['name' => 'Сканеры', 'slug' => 'scanners'],
                    ['name' => 'Мониторы', 'slug' => 'monitors'],
                    ['name' => 'Клавиатуры и мыши', 'slug' => 'keyboards-mice'],
                    ['name' => 'Сетевые устройства', 'slug' => 'networking'],
                ]
            ],
        ];

        foreach ($electronicsCategories as $parentCategory) {
            $parentCategoryExists = Category::query()->firstOrCreate([
                'name' => $parentCategory['name'],
            ],
                [
                    'name' => $parentCategory['name'],
                    'slug' => $parentCategory['slug'],
                ]
            );
            foreach ($parentCategory['children'] as $childCategory) {
                Category::query()->firstOrCreate([
                    'name' => $childCategory['name'],
                ],
                    [
                        'name' => $childCategory['name'],
                        'slug' => $childCategory['slug'],
                        'parent_id' => $parentCategoryExists->id
                    ]
                );
            }
        }
    }
}
