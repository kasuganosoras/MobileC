# MobileC
自用国内手机号简单验证类

## 使用方法
通过一个简单的例子了解如何使用
```php
include("MobileC.php");
$mc = new MobileC();
$number = "18718690000"; // 手机号
$provider = Array("无效", "电信", "移动", "联通");
echo "有效手机号：" . ($mc->isValid($number) ? "是" : "否") . "<br>";
echo "运营商名称：" . ($provider[$mc->getProvider($number)]) . "<br>";
echo "是否是电信：" . ($mc->isChinaTelecom($number) ? "是" : "否") . "<br>";
echo "是否是移动：" . ($mc->isChinaMobile($number)  ? "是" : "否") . "<br>";
echo "是否是联通：" . ($mc->isChinaUnicom($number)  ? "是" : "否") . "<br>";
```

## getProvider() 方法返回结果
- 0：无效运营商
- 1：中国电信
- 2：中国移动
- 3：中国联通

## 开源协议
本项目使用 GPL v3 协议开源
