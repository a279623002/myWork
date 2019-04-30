# PHP PSR

* PSR-0 已废弃，用PSR-4代替
* PSR-1 基本的编码风格
* PSR-2 编码风格(更严格)
* PSR-3 日志记录器接口
* PSR-4 自动加载

1 不使用PHP关闭标签 ?> ，防止关闭标签后有内容导致意外错误

> 仅包含PHP代码的文件

2 PHP文件必须使用Unix风格的换行符，编码格式为utf-8 无bom

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

9 类中的每个属性和方法都要声明可见性，有public、private和protected，不能使用var关键词来声明，老版本的PHP会在私有属性前加上_，一行只能声明一个属性

```
    class ClassName extends ParentClass implements 
        \ArrayAccess, 
        \Countable,
        \Serializable,
    {

        // constants, properties, methods
        public $foo = null;
        private $boo = true;
    }
```

10 类中的所有方法也应该定义可见性，方法名后面不能有空格，方法体的括号位置和类定义体的括号位置一样，都要新起一行，结束括号也要新起一行。方法参数的起始圆括号之后没有空格，结束括号之前也没有空格，有多个参数是，每个参数的逗号后面加一个空格

```
    namespace Vendor\Package;

    class ClassName
    {
        public function fooBarBaz($arg1, &$arg2, $arg3 = [])
        {
            // method body
        }
    }
```
> 如果参数比较多，需要换行时，可以如下：

```
    namespace Vendor\Package;

    class ClassName
    {
        public function aVeryLongMethodName(
            ClassTypeHint $arg1,
            &$arg2,
            array $arg3 = []
        ) {
            // method body
        }
    }
```

11 abstract、final必须在可见性修饰符之前，static声明必须放在可见性修饰符之后

```
    namespace Vendor\Package;

    abstract class ClassName
    {
        protected static $foo;

        abstract protected function zim();

        final public static function bar()
        {
            // method body
        }
    }
```

12 在调用方法和函数时，圆括号必须跟在函数名之后，函数的参数之间有一个空格

```
    bar();
    $foo->bar($arg1);
    Foo::bar($arg2, $arg3);
```

> 如果参数比较多，一行放不下时，如下处理

```
    $foo->bar(
        $longArgument,
        $longerArgument,
        $muchLongerArgument
    );
```

13 这些关键词后面有一对原括号，开始括号前必须有一个空格，与方法和类的定义体不同，控制结构关键词后面的起始括号应该和控制结构关键词写在同一行

```
    $gorilla = new \Animals\Gorilla;
    $ibis = new \Animals\StrawNeckedIbis;

    if ($gorilla->isWake() === true) {
        do {
            $gorilla->beatChest();
        } while ($ibis->isAsleep() === true);
        
        $ibis->flyAway();
    }
```

14 闭包函数在声明时，function关键词后必须有一个空格，同时use关键词前后也必须有一个空格。起始大括号不需要另起新行

```
    $closureWithArgs = function ($arg1, $arg2) {
        // body
    };

    $closureWithArgsAndVars = function ($arg1, $arg2) use ($var1, $var2) {
        // body
    };
```

> 闭包函数有多个参数时，处理方式和方法的参数一样，同样适用于将闭包作为函数或方法的参数，如下

```
    $foo->bar(
        $arg1,
        function ($arg2) use ($var1) {
            // body
        },
        $arg3
    );
```

15 每个类都有自己的命名空间，且都在顶级命名空间下，类名必须为驼峰式（CamelCase），常量必须全部是用大写，并且使用下划线（_）分开

```
    namespace Vendor\Model;

    class Foo
    {
        const VERSION = '1.0';
        const DATE_APPROVED = '2012-06-01';
    }
```

16 类的方法必须使用小写字母开头的驼峰式（camelCase）命名

```
    namespace Vendor\Model;

    class Foo
    {
        const VERSION = '1.0';
        const DATE_APPROVED = '2012-06-01';
        public function myFunction()
        {

        }
    }
```
