<?php

namespace Database\Seeders;

use App\Models\Appearance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppearanceOneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Appearance::truncate();

        Appearance::create([
            'type' => 'logo',
            'value' => [
                'logo_full' => 'https://file.vinawebapp.com/uploads/images/Company/vnwaLogoFull.png',
                'logo_icon' => 'https://file.vinawebapp.com/uploads/images/Company/vnwaLogoIcon.png',
                'favicon' => 'https://file.vinawebapp.com/uploads/images/Company/vnwaLogoIcon.png'
            ],
        ]);
        Appearance::create([
            'type' => 'meta_seo',
            'value' => [
                'title' => 'SEO CMS',
                'meta_title' => 'SEO CMS',
                'meta_desc' => 'Một sản phẩm của Vinawebapp.com',
                'meta_image' => 'https://file.vinawebapp.com/uploads/images/Company/vnwaLogoIcon.png'
            ],
        ]);



        Appearance::create([
            'type' => 'profile',
            'value' => [
                'email' => 'thuongleeacademy@gmail.com',
                'phone' => '093.62.63.123',
                'address' => 'Số 35 Phố Thợ Nhuộm, Hoàn Kiếm, Hà Nội, Việt Nam',
                'working_time' => 'Mon - Fri: 9am - 7pm </br> Sat/Sun: 10am - 7pm ',
            ],
        ]);

        Appearance::create([
            'type' => 'home_page',
            'value' => [
                'social' => [
                    'instagram' => 'https://www.instagram.com/thuonglee.e/',
                    'facebook' => 'https://www.facebook.com/lengocthuong.info',
                    'youtube' => 'https://www.youtube.com/watch?v=JHm240dW1rA',
                    'tiktok' => 'https://www.tiktok.com/@thuonglee.official',
                    'behance' => 'https://www.behance.net/thuongle10',
                ],
                'top_images' => [
                    'https://static.wixstatic.com/media/9c5dd9_bf99a4ee26034d52a548e2af2a94171d~mv2.jpg/v1/fill/w_493,h_476,fp_0.41_0.35,q_80,usm_0.66_1.00_0.01,enc_avif,quality_auto/9c5dd9_bf99a4ee26034d52a548e2af2a94171d~mv2.jpg',
                    'https://static.wixstatic.com/media/9c5dd9_a55b452351e74fc4a9bc7aee182af18d~mv2.jpg/v1/crop/x_0,y_1735,w_6016,h_2161/fill/w_1326,h_476,fp_0.50_0.50,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/IMG_0808_JPG.jpg'
                ],
                'what_we_do' => [
                    'images' => ['https://static.wixstatic.com/media/9c5dd9_052e683624434dc7a5b4ae109b240b19~mv2.jpg/v1/fill/w_1185,h_1026,fp_0.49_0.32,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/A94I9107.jpg'],
                    'links' =>
                        [
                            [
                                'label' => 'Makeup & Hair',
                                'to' => '/'
                            ],
                            [
                                'label' => 'Courses/Workshop',
                                'to' => '/'
                            ],
                            [
                                'label' => 'Bridal/Wedding',
                                'to' => '/'
                            ]
                        ],
                    'questions' => [
                        [
                            'label' => 'Our team',
                            'image' => 'https://static.wixstatic.com/media/9c5dd9_052e683624434dc7a5b4ae109b240b19~mv2.jpg',
                            'content' => 'You have nothing to do, @nuxt/icon will handle it automatically.'
                        ],
                        [
                            'label' => 'Our team',
                            'image' => 'https://static.wixstatic.com/media/9c5dd9_052e683624434dc7a5b4ae109b240b19~mv2.jpg',
                            'content' => 'You have nothing to do, @nuxt/icon will handle it automatically.'
                        ],
                        [
                            'label' => 'Our team',
                            'image' => 'https://static.wixstatic.com/media/9c5dd9_052e683624434dc7a5b4ae109b240b19~mv2.jpg',
                            'content' => 'You have nothing to do, @nuxt/icon will handle it automatically.'
                        ]
                    ],

                ],
                'slide_images' => [
                    'https://static.wixstatic.com/media/9c5dd9_e80226ee…o/9c5dd9_e80226ee8ff74733805f187205885280~mv2.jpg',
                    'https://static.wixstatic.com/media/9c5dd9_e80226ee…o/9c5dd9_e80226ee8ff74733805f187205885280~mv2.jpg',
                    'https://static.wixstatic.com/media/9c5dd9_e80226ee…o/9c5dd9_e80226ee8ff74733805f187205885280~mv2.jpg',
                    'https://static.wixstatic.com/media/9c5dd9_e80226ee…o/9c5dd9_e80226ee8ff74733805f187205885280~mv2.jpg',
                    'https://static.wixstatic.com/media/9c5dd9_e80226ee…o/9c5dd9_e80226ee8ff74733805f187205885280~mv2.jpg',
                ],
                'contact' => [
                    'image' => 'https://static.wixstatic.com/media/9c5dd9_548c71753dfc4b1fa1b62aa75b5d8665~mv2.jpg/v1/crop/x_55,y_0,w_2057,h_2588/fill/w_719,h_884,fp_0.50_0.50,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/IMG_0693_JPG.jpg',
                    'text' => "Book a session, schedule a meeting or ask us any question you have in mind! \n Just leave us a message and we'll get back to you as soon as possible!"
                ],
                'meta' => [
                    'title' => 'SEO CMS',
                    'desc' => 'Một sản phẩm của Vinawebapp.com',
                    'image' => 'https://file.vinawebapp.com/uploads/images/Company/vnwaLogoIcon.png'
                ]

            ],
        ]);


        Appearance::create([
            'type' => 'gallery_page',
            'value' => [
                'banner' => [
                    'image' => 'https://static.wixstatic.com/media/9c5dd9_f532dcf13c9c4a368cad8122535d66ac~mv2.jpg/v1/fill/w_1905,h_420,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/9c5dd9_f532dcf13c9c4a368cad8122535d66ac~mv2.jpg',
                    'title' => 'THUONGLEE & Co.',
                    'slogan' => 'This gallery showcase the artworks issued from a variety of different projects.',
                    'desc' => 'Client Projects \n Collaborations \n Student Projects'
                ],
                'images' => [
                    'https://static.wixstatic.com/media/9c5dd9_b83737111c0145f6b56a6d9410d3c6f1~mv2.jpg/v1/fill/w_928,h_1392,q_90,enc_avif,quality_auto/9c5dd9_b83737111c0145f6b56a6d9410d3c6f1~mv2.jpg',
                    'https://static.wixstatic.com/media/9c5dd9_b83737111c0145f6b56a6d9410d3c6f1~mv2.jpg/v1/fill/w_928,h_1392,q_90,enc_avif,quality_auto/9c5dd9_b83737111c0145f6b56a6d9410d3c6f1~mv2.jpg',
                    'https://static.wixstatic.com/media/9c5dd9_b83737111c0145f6b56a6d9410d3c6f1~mv2.jpg/v1/fill/w_928,h_1392,q_90,enc_avif,quality_auto/9c5dd9_b83737111c0145f6b56a6d9410d3c6f1~mv2.jpg',
                    'https://static.wixstatic.com/media/9c5dd9_b83737111c0145f6b56a6d9410d3c6f1~mv2.jpg/v1/fill/w_928,h_1392,q_90,enc_avif,quality_auto/9c5dd9_b83737111c0145f6b56a6d9410d3c6f1~mv2.jpg',
                ],
                'meta' => [
                    'title' => 'SEO CMS',
                    'desc' => 'Một sản phẩm của Vinawebapp.com',
                    'image' => 'https://file.vinawebapp.com/uploads/images/Company/vnwaLogoIcon.png'
                ]

            ],
        ]);

        Appearance::create([
            'type' => 'services_page',
            'value' => [
                'banner' => [
                    'title' => 'THUONGLEE & Co.',
                    'slogan' => 'This gallery showcase the artworks issued from a variety of different projects.',
                ],
                'image' => 'https://static.wixstatic.com/media/9c5dd9_46e13b5738ae443f899d9813b8a8f348~mv2.jpg/v1/fill/w_720,h_753,fp_0.50_0.50,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/IMG_3794_JPG.jpg',
                'items' => [],

                'meta' => [
                    'title' => 'SEO CMS',
                    'desc' => 'Một sản phẩm của Vinawebapp.com',
                    'image' => 'https://file.vinawebapp.com/uploads/images/Company/vnwaLogoIcon.png'
                ]

            ],
        ]);
        Appearance::create([
            'type' => 'courses_page',
            'value' => [
                'banner' => [
                    'image' => 'https://static.wixstatic.com/media/9c5dd9_54d6e2b570bb401cacbf26fe7ab84aa1~mv2.jpg/v1/fill/w_1905,h_420,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/9c5dd9_54d6e2b570bb401cacbf26fe7ab84aa1~mv2.jpg',
                    'title' => 'MAKEUP ACADEMY /n BY THUONGLEE',
                    'slogan' => 'Liên hệ ThuongLee để tìm hiểu thêm về học trình của các lớp học.',
                    'desc' => '#Khóa học cơ bản và nâng cao /n #ĐÀO TẠO CHUYÊN NGHIỆP HÀNH NGHỀ '
                ],
                'items' => [
                    [
                        'label' => 'Khóa I:Cá Nhân',
                        'content' => '',
                        'image' => 'https://static.wixstatic.com/media/9c5dd9_675ea73b89854f74b7d16a00989ba06b~mv2.jpg/v1/crop/x_275,y_456,w_2105,h_1780/fill/w_640,h_541,fp_0.50_0.50,q_80,usm_0.66_1.00_0.01,enc_avif,quality_auto/DAH_9454%202_JPG.jpg'
                    ],
                    [
                        'label' => 'Khóa I:Cá Nhân',
                        'content' => '',
                        'image' => ''
                    ],
                    [
                        'label' => 'Khóa I:Cá Nhân',
                        'content' => '',
                        'image' => ''
                    ]
                    ,
                    [
                        'label' => 'Khóa I:Cá Nhân',
                        'content' => '',
                        'image' => ''
                    ]
                ],
                'meta' => [
                    'title' => 'SEO CMS',
                    'desc' => 'Một sản phẩm của Vinawebapp.com',
                    'image' => 'https://file.vinawebapp.com/uploads/images/Company/vnwaLogoIcon.png'
                ]

            ],
        ]);
        Appearance::create([
            'type' => 'about_page',
            'value' => [
                'image' => 'https://static.wixstatic.com/media/9c5dd9_4e33c8af59624c52bde1f97d56a263fc~mv2.jpeg/v1/fill/w_680,h_959,fp_0.50_0.57,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/L1080879.jpeg',
                'title' => '“The Art of Dream in between Reality”',
                'sub_title' => 'This is my true story.',
                'content' => '',
                'teams' => [
                    [
                        'label' => 'HAI DANG',
                        'to' => 'https://www.instagram.com/wixstudio/#',
                        'image' => 'https://static.wixstatic.com/media/9c5dd9_3602d633a89941f28899e710b775a25d~mv2.jpeg/v1/fill/w_458,h_528,fp_0.41_0.39,q_80,usm_0.66_1.00_0.01,enc_avif,quality_auto/08B53453-309A-43F7-AD25-0AA8F4C07353.jpeg',
                    ]
                ],
                'meta' => [
                    'title' => 'SEO CMS',
                    'desc' => 'Một sản phẩm của Vinawebapp.com',
                    'image' => 'https://file.vinawebapp.com/uploads/images/Company/vnwaLogoIcon.png'
                ]

            ],
        ]);
    }
}