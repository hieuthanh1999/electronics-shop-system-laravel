<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    public function run()
    {
        $news = [
            [
                'title' => 'Ưu đãi Khuyến Mại Xả Kho',
                'description' => 'Hàng trăm sản phẩm có giá khuyến mãi cực sốc, giảm giá 50% tất cả các mẫu xe đạp.',
                'priority' => 1
            ],
            [
                'title' => 'Miễn Phí Giao Hàng',
                'description' => 'Miễn phí giao hàng nội thành Hà Nội cho đơn hàng từ 3 triệu đồng!',
                'priority' => 2
            ],
            [
                'title' => 'Ưu Đãi Phụ Kiện',
                'description' => 'Tặng ngay combo 3 món phụ kiện khi mua xe hoặc giảm giá đến 20% khi mua phụ kiện tại showroom GIGABIKE.',
                'priority' => 0
            ],
            [
                'title' => 'Ưu Đãi Sửa Chữa và Bảo Dưỡng',
                'description' => 'Giảm giá sửa chữa và bảo dưỡng xe đạp, ưu đãi lên đến 20%.',
                'priority' => 3
            ],
        ];

        // Sắp xếp mảng theo trường `priority` (ưu tiên tin có priority nhỏ hơn)
        usort($news, function ($a, $b) {
            return $a['priority'] <=> $b['priority'];
        });

        // Chèn dữ liệu vào bảng `news`
        foreach ($news as $item) {
            DB::table('news')->insert($item);
        }
    }
}
