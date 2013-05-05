LinApi - api目录说明
======
是api.laolin.com的代码


## 说明
运行此目录的APP需要：
* ../index.php文件
* ../.htaccess文件
* ../_lp/_lp目录
* ../static目录

并且只能用上一级目录的index.php来运行，否则页面引用static目录的js css将都是不对的文件。
或者把static挪到api目录的下面，这样就可以用api/index.php来运行了。
