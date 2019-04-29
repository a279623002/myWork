# PHP PSR

* PSR-0 已废弃，用PSR-4代替
* PSR-1 基本的编码风格
* PSR-2 编码风格(更严格)
* PSR-3 日志记录器接口
* PSR-4 自动加载

1 不使用PHP关闭标签 ?> ，防止关闭标签后有内容导致意外错误

> 仅包含PHP代码的文件

2 PHP文件必须使用Unix风格的换行符

> vscode选择编码格式旁边的LF就好了
> 或者全局设置换行符，file-》\n

![setLR](/demo/images/setLR.png)

3 每行代码不超过80个字符，只能有一条语句，末尾不能有空格，可适当添加空行提高可读性

4 必须以4个空格为缩进，不能使用制表符（tab）缩进

> 在不同的编辑器中，空格的渲染效果基本一致，而制表符的宽度各有差异。

5 PHP的关键字必须使用小写，而且true, false, 和 null也必须小写

6 namespace声明之后必须要有一个空行，而且use声明必须放在namespace之后，必须分别使用use引入命名空间，而且use后要有空行

```
    namespace Vendor\Package;

    use FooClass;
    use BarClass as Bar;
    use OtherVendor\OtherPackage\BazClass;
```

7 extends和implements关键字必须和类名在同一行，类、接口和Traits定义体的起始括号应该在类名之后新起一行，结束括号也必须新起一行

```
    class ClassName extends ParentClass implements \ArrayAccess, \Countable
    {

        // constants, properties, methods

    }
```

8 如果implements后面后很多类导致一行很长，可以依次将需要的类另起新行并缩进4个空格

```
    class ClassName extends ParentClass implements 
        \ArrayAccess, 
        \Countable,
        \Serializable,
    {

        // constants, properties, methods

    }
```