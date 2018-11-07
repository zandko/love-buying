<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => '家用电器',
                'children' => [
                    [
                        'name' => '电视',
                        'children' => [
                            ['name' => '曲面电视'],
                            ['name' => '超薄电视'],
                            ['name' => 'OLED电视'],
                            ['name' => '4K超清电视'],
                            ['name' => '55英寸'],
                            ['name' => '65英寸'],
                            ['name' => '电视配件'],
                        ],
                    ],
                    [
                        'name' => '空调',
                        'children' => [
                            ['name' => '壁挂式空调'],
                            ['name' => '柜式空调'],
                            ['name' => '中央空调'],
                            ['name' => '一级能效空调'],
                            ['name' => '变频空调'],
                            ['name' => '1.5匹空调'],
                            ['name' => '以旧换新'],
                        ],
                    ],
                    [
                        'name' => '洗衣机',
                        'children' => [
                            ['name' => '滚筒洗衣机'],
                            ['name' => '洗烘一体机'],
                            ['name' => '波轮洗衣机'],
                            ['name' => '迷你洗衣机'],
                            ['name' => '烘干机'],
                            ['name' => '洗衣机配件'],
                        ],
                    ],
                    [
                        'name' => '冰箱',
                        'children' => [
                            ['name' => '多门'],
                            ['name' => '对开门'],
                            ['name' => '三门'],
                            ['name' => '双门'],
                            ['name' => '冷柜/冰吧'],
                            ['name' => '酒柜'],
                            ['name' => '冰箱配件'],
                        ],
                    ],
                    [
                        'name' => '厨卫大电',
                        'children' => [
                            ['name' => '油烟机'],
                            ['name' => '燃气灶'],
                            ['name' => '烟灶套装'],
                            ['name' => '集成灶'],
                            ['name' => '消毒柜'],
                            ['name' => '洗碗机'],
                            ['name' => '电热水器'],
                            ['name' => '燃气热水器'],
                            ['name' => '嵌入式厨电'],
                        ],
                    ],
                    [
                        'name' => '厨房小电',
                        'children' => [
                            ['name' => '破壁机'],
                            ['name' => '电烤箱'],
                            ['name' => '电饭煲'],
                            ['name' => '电压力锅'],
                            ['name' => '咖啡机'],
                            ['name' => '豆浆机'],
                            ['name' => '料理机'],
                            ['name' => '电炖锅'],
                            ['name' => '电饼铛'],
                            ['name' => '多用途锅'],
                            ['name' => '电水壶/热水瓶'],
                            ['name' => '微波炉'],
                            ['name' => '榨汁机/原汁机'],
                            ['name' => '养生壶'],
                            ['name' => '电磁炉'],
                            ['name' => '面包机'],
                            ['name' => '空气炸锅'],
                            ['name' => '面条机'],
                            ['name' => '电陶炉'],
                            ['name' => '煮蛋器'],
                            ['name' => '电烧烤炉'],
                        ],
                    ],
                    [
                        'name' => '生活电器',
                        'children' => [
                            ['name' => '吸尘器/除螨仪'],
                            ['name' => '空气净化器'],
                            ['name' => '取暖电器'],
                            ['name' => '扫地机器人'],
                            ['name' => '蒸汽拖把/拖地机'],
                            ['name' => '干衣机'],
                            ['name' => '电话机'],
                            ['name' => '饮水机'],
                            ['name' => '净水器'],
                            ['name' => '除湿机'],
                            ['name' => '挂烫机/熨斗'],
                            ['name' => '加湿器'],
                            ['name' => '电风扇'],
                            ['name' => '冷风扇'],
                            ['name' => '毛球修剪器'],
                            ['name' => '生活电器配件'],
                        ],
                    ],
                    [
                        'name' => '个护健康',
                        'children' => [
                            ['name' => '剃须刀'],
                            ['name' => '电动牙刷'],
                            ['name' => '电吹风'],
                            ['name' => '按摩器'],
                            ['name' => '健康秤'],
                            ['name' => '卷/直发器'],
                            ['name' => '剃/脱毛器'],
                            ['name' => '理发器'],
                            ['name' => '足浴盆'],
                            ['name' => '足疗机'],
                            ['name' => '美容器'],
                            ['name' => '洁面仪'],
                            ['name' => '按摩椅'],
                        ],
                    ],
                    [
                        'name' => '家庭影音',
                        'children' => [
                            ['name' => '家庭影院'],
                            ['name' => 'KTV音响'],
                            ['name' => '迷你音响'],
                            ['name' => 'DVD'],
                            ['name' => '功放'],
                            ['name' => '回音壁'],
                            ['name' => '影音配件'],
                        ],
                    ],
                    [
                        'name' => '进口电器',
                        'children' => [
                            ['name' => '进口电器'],
                        ],
                    ],
                ],
            ],
            [
                'name' => '手机/运营商/数码',
                'children' => [
                    [
                        'name' => '手机通讯',
                        'children' => [
                            ['name' => '手机'],
                            ['name' => '游戏手机'],
                            ['name' => '老人机'],
                            ['name' => '对讲机'],
                            ['name' => '以旧换新'],
                        ],
                    ],
                    [
                        'name' => '运营商',
                        'children' => [
                            ['name' => '合约机'],
                            ['name' => '选号码'],
                            ['name' => '固话宽带'],
                            ['name' => '办套餐'],
                            ['name' => '充话费/流量'],
                            ['name' => '中国电信'],
                            ['name' => '中国移动'],
                            ['name' => '中国联通'],
                            ['name' => '170选号'],
                        ],
                    ],
                    [
                        'name' => '手机配件',
                        'children' => [
                            ['name' => '手机壳'],
                            ['name' => '贴膜'],
                            ['name' => '手机存储卡'],
                            ['name' => '数据线'],
                            ['name' => '充电器'],
                            ['name' => '手机耳机'],
                            ['name' => '创意配件'],
                            ['name' => '手机饰品'],
                            ['name' => '手机电池'],
                            ['name' => '苹果周边'],
                            ['name' => '移动电源'],
                            ['name' => '蓝牙耳机'],
                            ['name' => '手机支架'],
                            ['name' => '车载配件'],
                            ['name' => '拍照配件'],
                        ],
                    ],
                    [
                        'name' => '摄影摄像',
                        'children' => [
                            ['name' => '数码相机'],
                            ['name' => '单电/微单相机'],
                            ['name' => '单反相机'],
                            ['name' => '拍立得'],
                            ['name' => '运动相机'],
                            ['name' => '摄像机'],
                            ['name' => '镜头'],
                            ['name' => '户外器材'],
                            ['name' => '影棚器材'],
                            ['name' => '冲印服务'],
                            ['name' => '数码相框'],
                        ],
                    ],
                    [
                        'name' => '数码配件',
                        'children' => [
                            ['name' => '存储卡'],
                            ['name' => '三脚架/云台'],
                            ['name' => '相机包'],
                            ['name' => '滤镜'],
                            ['name' => '闪光灯/手柄'],
                            ['name' => '相机清洁/贴膜'],
                            ['name' => '机身附件'],
                            ['name' => '镜头附件'],
                            ['name' => '读卡器'],
                            ['name' => '支架'],
                            ['name' => '电池/充电器'],
                        ],
                    ],
                    [
                        'name' => '影音娱乐',
                        'children' => [
                            ['name' => '耳机/耳麦'],
                            ['name' => '音箱/音响'],
                            ['name' => '智能音箱'],
                            ['name' => '便携/无线音箱'],
                            ['name' => '收音机'],
                            ['name' => '麦克风'],
                            ['name' => 'MP3/MP4'],
                            ['name' => '专业音频'],
                            ['name' => '音频线'],
                        ],
                    ],
                    [
                        'name' => '电子教育',
                        'children' => [
                            ['name' => '学生平板'],
                            ['name' => '点读机/笔'],
                            ['name' => '早教益智'],
                            ['name' => '录音笔'],
                            ['name' => '电纸书'],
                            ['name' => '电子词典'],
                            ['name' => '复读机'],
                            ['name' => '翻译机'],

                        ],
                    ],
                ],
            ],
            [
                'name' => '电脑办公',
                'children' => [
                    [
                        'name' => '电脑整机',
                        'children' => [
                            ['name' => '游戏本'],
                            ['name' => '平板电脑'],
                            ['name' => '平板电脑配件'],
                            ['name' => '台式机'],
                            ['name' => '一体机'],
                            ['name' => '服务器/工作站'],
                            ['name' => '笔记本配件'],
                        ],
                    ],
                    [
                        'name' => '电脑配件',
                        'children' => [
                            ['name' => '显示器'],
                            ['name' => 'CPU'],
                            ['name' => '主板'],
                            ['name' => '显卡'],
                            ['name' => '硬盘'],
                            ['name' => '内存'],
                            ['name' => '机箱'],
                            ['name' => '电源'],
                            ['name' => '散热器'],
                            ['name' => '刻录机/光驱'],
                            ['name' => '声卡/扩展卡'],
                            ['name' => '装机配件'],
                            ['name' => 'SSD固态硬盘'],
                            ['name' => '组装电脑'],
                            ['name' => 'HUB/集线器'],
                        ],
                    ],
                    [
                        'name' => '外设产品',
                        'children' => [
                            ['name' => '鼠标'],
                            ['name' => '键盘'],
                            ['name' => '键鼠套装'],
                            ['name' => '网络仪表仪器'],
                            ['name' => 'U盘'],
                            ['name' => '移动硬盘'],
                            ['name' => '鼠标垫'],
                            ['name' => '摄像头'],
                            ['name' => '线缆'],
                            ['name' => '手写板'],
                            ['name' => '硬盘盒'],
                            ['name' => '电脑工具'],
                            ['name' => '电脑清洁'],
                            ['name' => 'UPS电源'],
                            ['name' => '插座'],
                        ],
                    ],
                    [
                        'name' => '游戏设备',
                        'children' => [
                            ['name' => '游戏机'],
                            ['name' => '游戏耳机'],
                            ['name' => '手柄/方向盘'],
                            ['name' => '游戏软件'],
                            ['name' => '游戏周边'],
                        ],
                    ],
                    [
                        'name' => '网络产品',
                        'children' => [
                            ['name' => '路由器'],
                            ['name' => '网络机顶盒'],
                            ['name' => '交换机'],
                            ['name' => '网络存储'],
                            ['name' => '网卡'],
                            ['name' => '4G/3G上网'],
                            ['name' => '网线'],
                            ['name' => '网络配件'],
                        ],
                    ],
                    [
                        'name' => '办公设备',
                        'children' => [
                            ['name' => '投影机'],
                            ['name' => '投影配件'],
                            ['name' => '多功能一体机'],
                            ['name' => '打印机'],
                            ['name' => '传真设备'],
                            ['name' => '验钞/点钞机'],
                            ['name' => '扫描设备'],
                            ['name' => '复合机'],
                            ['name' => '碎纸机'],
                            ['name' => '考勤门禁'],
                            ['name' => '收银机'],
                            ['name' => '会议音频视频'],
                            ['name' => '保险柜'],
                            ['name' => '装订/封装机'],
                            ['name' => '安防监控'],
                            ['name' => '办公家具'],
                            ['name' => '白板'],
                        ],
                    ],
                    [
                        'name' => '文具',
                        'children' => [
                            ['name' => '笔类'],
                            ['name' => '本册/便签'],
                            ['name' => '办公文具'],
                            ['name' => '文件收纳'],
                            ['name' => '学生文具'],
                            ['name' => '计算器'],
                            ['name' => '画具画材'],
                            ['name' => '财会用品'],

                        ],
                    ],
                    [
                        'name' => '耗材',
                        'children' => [
                            ['name' => '硒鼓/墨粉'],
                            ['name' => '墨盒'],
                            ['name' => '色带'],
                            ['name' => '纸类'],
                            ['name' => '刻录光盘'],

                        ],
                    ],
                    [
                        'name' => '服务产品',
                        'children' => [
                            ['name' => '延保服务'],
                            ['name' => '上门安装'],
                            ['name' => '维修保养'],
                            ['name' => '电脑软件'],

                        ],
                    ],
                ],
            ],
            [
                'name' => '家居/家具/家装',
                'children' => [
                    [
                        'name' => '生活用品',
                        'children' => [
                            ['name' => '收纳用品'],
                            ['name' => '雨伞雨具'],
                            ['name' => '净化除味'],
                            ['name' => '浴室用品'],
                            ['name' => '洗晒/熨烫'],
                            ['name' => '缝纫/针织用品'],
                            ['name' => '保暖防护'],
                            ['name' => '清洁工具'],
                        ],
                    ],
                    [
                        'name' => '家具',
                        'children' => [
                            ['name' => '客厅'],
                            ['name' => '卧室'],
                            ['name' => '餐厅'],
                            ['name' => '书房'],
                            ['name' => '儿童'],
                            ['name' => '储物'],
                            ['name' => '商业办公'],
                            ['name' => '阳台户外'],
                            ['name' => '电脑桌'],
                            ['name' => '电视柜'],
                            ['name' => '茶几'],
                            ['name' => '办公柜'],
                            ['name' => '沙发'],
                            ['name' => '床'],
                            ['name' => '餐桌'],
                        ],
                    ],
                    [
                        'name' => '装修设计',
                        'children' => [
                            ['name' => '全包装修'],
                            ['name' => '半包装修'],
                            ['name' => '家装设计'],
                            ['name' => '高端设计'],
                            ['name' => '局部装修'],
                            ['name' => '安装服务'],
                            ['name' => '装修公司'],
                            ['name' => '旧房翻新'],
                        ],
                    ],
                    [
                        'name' => '家纺',
                        'children' => [
                            ['name' => '四件套'],
                            ['name' => '被子'],
                            ['name' => '枕芯'],
                            ['name' => '毛巾浴巾'],
                            ['name' => '电热毯'],
                            ['name' => '羽绒被'],
                            ['name' => '乳胶枕'],
                            ['name' => '羽绒枕'],
                            ['name' => '蚕丝被'],
                            ['name' => '沙发垫套/椅垫'],
                        ],
                    ],
                    [
                        'name' => '灯具',
                        'children' => [
                            ['name' => '吸顶灯'],
                            ['name' => '吊灯'],
                            ['name' => '台灯'],
                            ['name' => '筒灯射灯'],
                            ['name' => '庭院灯'],
                            ['name' => '装饰灯'],
                            ['name' => '氛围照明'],
                            ['name' => '落地灯'],
                        ],
                    ],
                ],
            ],
            [
                'name' => '男装/女装/童装/内衣',
                'children' => [
                    [
                        'name' => '女装',
                        'children' => [
                            ['name' => '时尚套装'],
                            ['name' => '打底裤'],
                            ['name' => '休闲裤'],
                            ['name' => '短外套'],
                            ['name' => '风衣'],
                            ['name' => '小西装'],
                            ['name' => '毛衣'],
                            ['name' => '雪纺衫'],
                            ['name' => '羽绒服'],
                            ['name' => '棉服'],
                        ],
                    ],
                    [
                        'name' => '男装',
                        'children' => [
                            ['name' => '牛仔裤'],
                            ['name' => '休闲裤'],
                            ['name' => '衬衫'],
                            ['name' => '羽绒服'],
                            ['name' => '棉服'],
                            ['name' => '真皮皮衣'],
                            ['name' => '卫衣'],
                            ['name' => '毛呢大衣'],
                            ['name' => '大码男装'],
                            ['name' => '西服套装'],
                        ],
                    ],
                    [
                        'name' => '内衣',
                        'children' => [
                            ['name' => '文胸'],
                            ['name' => '睡衣/家居服'],
                            ['name' => '男士内裤'],
                            ['name' => '女士内裤'],
                            ['name' => '吊带/背心'],
                            ['name' => '文胸套装'],
                            ['name' => '情侣睡衣'],
                            ['name' => '连裤袜/丝袜'],
                            ['name' => '情趣内衣'],
                        ],
                    ],
                    [
                        'name' => '配饰',
                        'children' => [
                            ['name' => '女士围巾/披肩'],
                            ['name' => '男士丝巾/围巾'],
                            ['name' => '太阳镜'],
                            ['name' => '防辐射眼镜'],
                            ['name' => '领带/领结/领带夹'],
                            ['name' => '毛线帽'],
                            ['name' => '棒球帽'],
                            ['name' => '遮阳伞/雨伞'],
                            ['name' => '男士腰带/礼盒'],
                            ['name' => '女士腰带/礼盒'],
                        ],
                    ],
                    [
                        'name' => '童装',
                        'children' => [
                            ['name' => '套装'],
                            ['name' => '卫衣'],
                            ['name' => '裤子'],
                            ['name' => '外套/大衣'],
                            ['name' => '毛衣/针织衫'],
                            ['name' => '衬衫'],
                            ['name' => '户外/运动服'],
                            ['name' => 'T恤'],
                        ],
                    ],
                ],
            ],
        ];

        foreach ($categories as $data) {
            $this->createCategory($data);
        }
    }

    public function createCategory($data, $parent = null)
    {
        $category = new Category(['name' => $data['name']]);

        $category->is_directory = isset($data['children']);

        if (!is_null($parent)) {
            $category->parent()->associate($parent);
        }

        $category->save();

        if (isset($data['children']) && is_array($data['children'])) {
            foreach ($data['children'] as $child) {
                $this->createCategory($child, $category);
            }
        }
    }
}
