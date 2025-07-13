<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteContent;
use Illuminate\Support\Facades\DB;

class SiteContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Use a temporary array to hold all the content
        $content = [
            // Hero Section
            ['section_key' => 'hero_title', 'content_value' => 'من المزرعة إلى السوق العالمي'],
            ['section_key' => 'hero_subtitle', 'content_value' => 'يوسافكو: شريككم الموثوق في معالجة وتسويق فاكهة التين الشوكي.'],
            ['section_key' => 'hero_image', 'content_value' => 'images/bann.webp'],

            // Gallery Section
            ['section_key' => 'gallery_title', 'content_value' => 'من أعمالنا'],
            ['section_key' => 'gallery_subtitle', 'content_value' => 'نظرة على عملياتنا ومنتجاتنا عالية الجودة.'],
            ['section_key' => 'gallery_img_1', 'content_value' => 'images/a.jpg'],
            ['section_key' => 'gallery_img_2', 'content_value' => 'images/b.jpg'],
            ['section_key' => 'gallery_img_3', 'content_value' => 'images/c.jpg'],
            ['section_key' => 'gallery_img_4', 'content_value' => 'images/d.jpg'],

            // About Section
            ['section_key' => 'about_title', 'content_value' => 'نبذة عن يوسافكو'],
            ['section_key' => 'about_us_paragraph', 'content_value' => 'شركة يوسافكو هي مبادرة سعودية تهدف إلى تطوير سلاسل القيمة لفاكهة التين الشوكي، عبر تقديم خدمات احترافية للمزارعين.'],
            ['section_key' => 'vision_paragraph', 'content_value' => 'أن نكون الشركة الرائدة في المملكة والمنطقة في معالجة وتسويق فاكهة التين الشوكي.'],
            ['section_key' => 'goal_paragraph', 'content_value' => 'تطوير سلسلة القيمة لثمار التين الشوكي من المزرعة إلى المستهلك.'],
            ['section_key' => 'mission_paragraph', 'content_value' => 'تمكين المزارعين وتعزيز قيمة منتجاتهم من خلال حلول فعّالة وآمنة.'],
            ['section_key' => 'about_video', 'content_value' => 'videos/main.mp4'],

            // Why Choose Us Section
            ['section_key' => 'why_us_title', 'content_value' => 'لماذا تختار يوسافكو؟'],
            ['section_key' => 'why_us_subtitle', 'content_value' => 'نحن نجمع بين الخبرة والتقنية لتقديم أفضل الحلول.'],
            ['section_key' => 'feature1_title', 'content_value' => 'قوة البحث والتطوير'],
            ['section_key' => 'feature1_text', 'content_value' => 'نقدم حلولاً مخصصة لاحتياجات عملائنا.'],
            ['section_key' => 'feature2_title', 'content_value' => 'فريق محترف'],
            ['section_key' => 'feature2_text', 'content_value' => 'نبتكر ونحسن منتجاتنا وخدماتنا باستمرار.'],
            ['section_key' => 'feature3_title', 'content_value' => 'معدات إنتاج حديثة'],
            ['section_key' => 'feature3_text', 'content_value' => 'مجهزون بمعدات إنتاج آلية متطورة.'],
            ['section_key' => 'feature4_title', 'content_value' => 'خط إنتاج متكامل'],
            ['section_key' => 'feature4_text', 'content_value' => 'نضمن كفاءة عالية في عملية الإنتاج.'],
            ['section_key' => 'why_us_bg_image', 'content_value' => 'images/ffr.jpg'],

            // Services Section
            ['section_key' => 'services_title', 'content_value' => 'خدماتنا المتكاملة'],
            ['section_key' => 'services_subtitle', 'content_value' => 'حلول مبتكرة تضمن الجودة، تحقق الراحة، وتفتح آفاقاً جديدة.'],
            ['section_key' => 'service1_title', 'content_value' => '🍃 1. العناية قبل القطاف'],
            ['section_key' => 'service1_text', 'content_value' => 'زيارات ميدانية لتقييم جاهزية الثمار.'],
            ['section_key' => 'service2_title', 'content_value' => '✂️ 2. القطاف الآمن'],
            ['section_key' => 'service2_text', 'content_value' => 'فرق مدرّبة على القطاف باحتراف لتجنّب إتلاف الثمار.'],
            ['section_key' => 'service3_title', 'content_value' => '📦 3. المعالجة وإزالة الأشواك'],
            ['section_key' => 'service3_text', 'content_value' => 'تجهيز الثمار بشكل صحي وآمن وجاهز للاستهلاك.'],
            ['section_key' => 'service4_title', 'content_value' => '🛻 4. التعبئة والنقل'],
            ['section_key' => 'service4_text', 'content_value' => 'تعبئة احترافية ونقل مبرد للحفاظ على الجودة.'],
            ['section_key' => 'service5_title', 'content_value' => '📢 5. التسويق والتوزيع'],
            ['section_key' => 'service5_text', 'content_value' => 'تسويق إلكتروني واتفاقيات مع الأسواق.'],
            ['section_key' => 'service6_title', 'content_value' => '💵 6. الشراء المباشر'],
            ['section_key' => 'service6_text', 'content_value' => 'نقدم خيار الشراء المباشر بأسعار تنافسية وعادلة.'],
            
            // Farmers Section
            ['section_key' => 'farmers_bg_image', 'content_value' => 'images/images.jpg'],
        ];

        // Loop through the array and create a record for each item
        foreach ($content as $item) {
            SiteContent::updateOrCreate(
                ['section_key' => $item['section_key']],
                $item
            );
        }
    }
}