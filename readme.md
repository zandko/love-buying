# 爱购网

本项目基于Laravel与laravel-admin开发 

## 本项目模块概述

1、用户模块

- 登录注册
- 商品收藏
- 收货地址
- 查看订单
- 购物流程：选择商品-》下单-》付款-》确认收货-》发表评价、申请退款

2、商品模块

- 商品无限级分类
- 后台添加商品、设置商品属性、设置商品库存
- 前台展示显示商品列表，ES搜索引擎提供强大搜索功能

3、订单模块

- 用户订单页面显示已经提交过的订单，管理员后台显示已支付订单
- 后台输入物流信息，进行发货操作

5、优惠券模块

- 多种优惠方案（满减、打折）
- 后台设置优惠券，前台提供优惠券使用接口

6、支付模块

- 前台提供支付宝支付
- 前台提供用户申请退款接口、后台审核是否同意退款

7、其他 轮播图管理、站点信息管理、会员管理、权限管理等

## 安装方法

- 1、git clone或者下载解压到本地
- 2、将public设置为网站根目录，调整storage目录权限，在public目录下手动创建uploads文件夹并分配给服务器权限
- 3、composer install
- 4、npm install
- 5、npm run production
- 6、启动redis
- 7、安装好[jdk1.8](https://www.oracle.com/technetwork/java/javase/downloads/jdk8-downloads-2133151.html)配置好java环境
- 8、下载[ElasticSearch](https://www.elastic.co/downloads/past-releases)以及它的[中文分词插件](https://github.com/medcl/elasticsearch-analysis-ik/releases)，两个的版本要对应上，把下载的插件解压到es的plugins目录下重命名为ik
- 9、在elasticSearch的config目录下新建 analysis/synonyms.txt，不用写内容都行，这个文件主要用于同义词搜索，没有不行（最终路径看起来像这样 /usr/local/src/elasticsearch-6.3.0/config/analysis）
- 10、linux: 新建一个用户，切换到该用户，启动ES。windows直接执行bin下的bat脚本即可
- 11、启动mysql，创建数据库，配置env数据库，运行php artisan migrate:fresh
- 12、后台管理员账号为admin 密码为admin 前台用户账号为[push_over@163.com](mailto:push_over@163.com) 密码为123456
- 13、配置好队列和定时任务，
