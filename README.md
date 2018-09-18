# ICAN2018
*WeChat_App for ICAN2018*
### 一个基于机械臂的垃圾分拣和积分兑换的微信小程序服务。
### 功能：
- 支持用户微信登录，用户名即为积分账户名
- 从数据库读取已登录过的用户的积分
- 从OneNET平台上获取单片机上报的积分值（机械臂端识别到的物品换算得到的积分）
- 将识别得到的物品对应的积分加入用户账户，并更新至数据库

### Server 是部署在服务端的代码，PHP+MySQL，我自己用新浪云SAE应用引擎部署的，能用就行~
#### 数据库结构
> ![数据库.png](https://upload-images.jianshu.io/upload_images/3235837-a0d147cbbcd2749b.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
![数据表.png](https://upload-images.jianshu.io/upload_images/3235837-681095635c18ff53.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)
