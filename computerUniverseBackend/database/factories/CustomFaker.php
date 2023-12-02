<?php

namespace Database\Factories;
trait CustomFaker {
    protected $faker;
    private static $companySuffix = array(
        'Актив',
        'INLINE',
        'Айтеко',
        'Инфосистемы',
        'Центр',
        'Компью',
        'Талмер',
        'Nexign',
        'СКБ',
        'Компарекс',
        'Инлайн',
        'Галактика',
        'ДиСи',
        'НПЦ',
        'Импульс',
        'BIA'
    );

    private static $companyPrefix = array(
        'Груп',
        'Group',
        'Technologies',
        'Контур',
        'Телеком',
        'Software',
        'Технологии',
        'Line',
        'Logistic',
        'Лоджистик',
        'Линк',
        'Софт'
    );

    private static $street = array(
        'Косиора', 'Ладыгина', 'Ленина', 'Ломоносова', 'Домодедовская', 'Гоголя', '1905 года', 'Чехова', 'Сталина',
        'Космонавтов', 'Гагарина', 'Славы', 'Бухарестская', 'Будапештсткая', 'Балканская', 'Ульяновская'
    );

    private static $lastname = array(
        'Иванов', 'Петров', 'Васильев', 'Березин','Акимов', 'Агапов', 'Блинов', 'Алешин', 'Виноградов', 'Волков', 'Герасимов',
        'Быков', 'Денисов', 'Казаков', 'Жуков', 'Жаров', 'Куприянов', 'Макаров'
    );

    private static $name = array(
        'Иван', 'Кирилл', 'Александр', 'Алексей','Виктор', 'Павел', 'Даниил', 'Никита', 'Василий'
    );

    private static $parts = array(
        'Видеокарты' => array(
            'NVIDIA GeForce RTX 4090',
            'NVIDIA GeForce GT 1030',
            'NVIDIA GeForce GT 4080',
            'NVIDIA GeForce RTX 3060',
            'NVIDIA GeForce RTX 4060 Ti',
            'NVIDIA GeForce RTX 4060',
            'NVIDIA GeForce RTX 4070',
            'NVIDIA GeForce RTX 3050',
        ),
        'Процессоры' => array(
            '5600X OEM',
            '5700X OEM',
            '12100F',
            '12100F OEM',
            '5600',
            '10100F',
            '13500'
        ),
        'Материнские платы' => array(
            'H510M',
            'B450M',
            'B550',
            'A520M',
            'H610M',
            'B760M',
            'B560M'
        ),
        'HDD Диски' => array(
            'BarraCuda 1TB',
            'IronWolf 1TB',
            'BarraCuda 5TB',
            'IronWolf 5TB',
            'Blue 1TB',
            'Exos X18 18TB',
            'Blue 1TB',
            'Purple 1TB',
        ),
        'SSD Диски' => array(
            'M.2 2280',
            'M.2 SN700',
            'SU650',
            'A400',
            '960M M.2',
            'SL 500',
            '870 EVO'
        ),
        'Корпуса' => array(
            'N4 rev.1',
            'Warrior-B',
            'Duoface PRO',
            'HEXFORM-G',
            'Warrior-W',
            'Atomic Lite'
        )
    );

    private static $manufacturer = array(
        'Видеокарты' => array(
            'MSI',
            'ASUS',
            'Palit',
            'GIGABYTE',
        ),
        'Процессоры' => array(
            'AMD',
            'Intel',
        ),
        'Материнские платы' => array(
            'MSI',
            'ASUS',
            'ASRock',
            'GIGABYTE',
        ),
        'HDD Диски' => array(
            'Toshiba',
            'Kingston',
            'WD',
            'Seagate'
        ),
        'SSD Диски' => array(
            'Samsung',
            'Kingston',
            'KingSpec',
            'ADATA',
            'Netac'
        ),
        'Корпуса' => array(
            'AeroCool',
            'Zalman',
            'DEEPCOOL',
            'Powercase'
        )
    );

    private static $categories = array(
        'Видеокарты', 'Процессоры',
        'Материнские платы', 'HDD Диски',
        'SSD Диски', 'Корпуса'
    );

    private static $system = array(
      'Windows 10 64bit', 'Windows 7 64bit',
      'Windows 10 32bit', 'Windows 7 32bit',
      'Linux Ubuntu', 'MacOS', 'Windows 11 64bit',
      'Windows 11 32bit'
    );

    private static $status = array(
        'Оплачено', 'Доставлено', 'В пути', 'Собирается'
    );

    public $category;

    public function setFakerInstance($faker) {
        $this->faker = $faker;
    }
    public function generateAddress() {
        return $this->faker->randomElement(static::$street)
            . ', ' . $this->faker->buildingNumber;
    }

    public function generateCompany() {
        return $this->faker->randomElement(static::$companySuffix)
            . $this->faker->randomElement(static::$companyPrefix);
    }

    public function generateSystem() {
        return $this->faker->randomElement(static::$system);
    }

    public function generatePartName() {
        return $this->faker->randomElement(static::$parts[$this->category]);
    }

    public function generateLastname() {
        return $this->faker->randomElement(static::$lastname);
    }

    public function generateName() {
        return $this->faker->randomElement(static::$name);
    }

    public function generatePartManufacturer() {
        return $this->faker->randomElement(static::$manufacturer[$this->category]);
    }

    public function generateStatus() {
        return $this->faker->randomElement(static::$status);
    }

    public function generateCategory() {
        $this->category = $this->faker->randomElement(static::$categories);
        return $this->category;
    }
}
