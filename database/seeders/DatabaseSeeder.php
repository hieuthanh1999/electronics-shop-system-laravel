<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $databases = [
            [
                'table' => 'roles',
                'data' => [
                    [
                        'id' => 1,
                        'name' => 'Quản trị viên',
                    ],
                    [
                        'id' => 2,
                        'name' => 'Nhân Viên',
                    ],
                    [
                        'id' => 3,
                        'name' => 'Khách hàng',
                    ]
                ],
            ],
            [
                'table' => 'users',
                'data' => [
                    [
                        'id' => 1,
                        'name' => 'Admin',
                        'email' => 'admin@gmail.com',
                        'password' => Hash::make('Admin@123'),
                        'email_verified_at' => now(),
                        'phone_number' => '0000000000',
                        'active' => 1,
                        'role_id' => 1
                    ]
                ]
            ],
            [
                'table' => 'brands',
                'data' => [
                    [
                        'id' => 1,
                        'name' => 'TOPRIGHT'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Concorde'
                    ],
                    [
                        'id' => 3,
                        'name' => 'HILAND'
                    ],
                    [
                        'id' => 4,
                        'name' => 'LESVINA'
                    ],
                    [
                        'id' => 5,
                        'name' => 'GIANT'
                    ],
                ]
            ],
            [
                'table' => 'categories',
                'data' => [
                    [
                        'id' => 1,
                        'name' => 'Xe đạp',
                        'parent_id' => 0,
                        'slug' => 'xe-dap'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Xe đạp topright',
                        'parent_id' => 0,
                        'slug' => 'xe-dap-topright'
                    ],
                    [
                        'id' => 3,
                        'name' => 'Xe đạp concorde',
                        'parent_id' => 0,
                        'slug' => 'xe-dap-concorde'
                    ],
                    [
                        'id' => 4,
                        'name' => 'Xe đạp giant',
                        'parent_id' => 0,
                        'slug' => 'xe-dap-giant'
                    ],
                    [
                        'id' => 5,
                        'name' => 'Sửa xe và bảo dưỡng',
                        'parent_id' => 0,
                        'slug' => 'sua-xe-va-bao-duong'
                    ],
                    [
                        'id' => 6,
                        'name' => 'Tin tức',
                        'parent_id' => 0,
                        'slug' => 'tin-tuc'
                    ],
                ]
            ],
            [
                'table' => 'colors',
                'data' => [
                    [
                        'id' => 1,
                        'name' => 'Trắng'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Đen'
                    ],
                    [
                        'id' => 3,
                        'name' => 'Xám'
                    ],
                    [
                        'id' => 4,
                        'name' => 'Đỏ'
                    ],
                    [
                        'id' => 5,
                        'name' => 'Vàng'
                    ],
                    [
                        'id' => 6,
                        'name' => 'Xanh'
                    ],
                    [
                        'id' => 7,
                        'name' => 'Tím'
                    ],
                ]
            ],
            [
                'table' => 'sizes',
                'data' => [
                    [
                        'id' => 1,
                        'name' => 'S'
                    ],
                    [
                        'id' => 2,
                        'name' => 'M'
                    ],
                    [
                        'id' => 3,
                        'name' => 'L'
                    ],
                    [
                        'id' => 4,
                        'name' => 'XL'
                    ],
                ]
            ],
            [
                'table' => 'setting',
                'data' => [
                    [
                        'id' => 1,
                        'logo' => 'logo.png',
                        'name' => 'Electronics Shop System',
                        'email' => 'electronics-shop-system@gmail.com',
                        'address' => 'Đông Anh, Hà Nội',
                        'phone_number' => '123125934093',
                        'maintenance' => 2,
                        'notification' => '<b>WEBSITE tạm thời bảo trì để nâng cấp xin  quay lại sau</b>',
                        'introduction' => '
                            <h3 style="text-align: center; ">
                            <b>VỀ CHÚNG TÔI</b>
                            </h3><h5><br></h5><h5><span style="font-family: " source="" sans="" pro";"="" times="" new="" roman"; "="">
                            Bike Store Ngoc Mai là thương hiệu xe đạp được thiết kế bởi người Việt với mục tiêu trở thành thương hiệu xe đạp quốc gia Việt Nam có chất lượng và tiêu chuẩn quốc tế.
                            Bike Store Ngoc Mai đáp ứng nhu cầu của người tiêu dùng Việt cho một sản phẩm xe đạp chất lượng, phân phối và bảo hành uy tín toàn quốc, thiết kế đẹp và đa dạng mẫu mã, phù hợp cho mọi lứa tuổi và nhu cầu.
                            </span><br></h5><h5><br></h5><h5>
                            Đối với chúng tôi, thời trang là một niềm đam mê và một nghệ thuật.
                            Chúng tôi không chỉ cung cấp cho khách hàng những sản phẩm thời trang đẹp và chất lượng,
                            mà còn mang đến cho họ những trải nghiệm mua sắm tuyệt vời. Chúng tôi luôn nỗ lực để đáp ứng nhu cầu của khách hàng,
                            từ việc cung cấp những sản phẩm mới nhất đến việc cải tiến dịch vụ khách hàng.
                            <br></h5><h5><br></h5><h5>
                            Xe đạp Bike Store Ngoc Mai tự hào là thương hiệu xe đạp Việt cho người Việt. Các sản phẩm xe đạp và phụ kiện của GIGABIKE luôn được cập nhật liên tục hàng năm với mẫu mã, kiểu dáng phong phú, đa dạng,
                            đáp ứng mọi nhu cầu của thị trường từ phân khúc phổ thông cho đến cao cấp cho tất cả các dòng xe đạp từ xe đạp địa hình (MTB),
                            xe đạp đường phố thời trang và xe đạp trẻ em. Slogan: Bike Store Ngoc Mai - Xe đạp Việt cho sức khoẻ Việt”
                            </h5>
                        '
                    ],
                ]
            ]
        ];

        foreach ($databases as $database ) {
            $recordNumber = DB::table($database['table'])->count();
            foreach ($database['data'] as $key => $record) {
                if ($key >= $recordNumber)
                DB::table($database['table'])->insert($record);
            }
        }
    }
}
