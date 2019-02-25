
SOLID最开始是由Robert Martin提出的五个准则，并最后由Michael Feathers命名的简写，这五个是在面对对象设计中的五个基本原则。

- S: 职责单一原则 (SRP)
- O: 开闭原则 (OCP)
- L: 里氏替换原则 (LSP)
- I: 接口隔离原则 (ISP)
- D: 依赖反转原则 (DIP)

##### 职责单一原则 (SRP)

正如Clean Code所述，“修改类应该只有一个理由”。我们总是喜欢在类中写入太多的方法，就像你在飞机上塞满你的行李箱。在这种情况下你的类没有高内聚的概念并且留下了很多可以修改的理由。尽可能的减少你需要去修改类的时间是非常重要的。如果在你的单个类中有太多的方法并且你经常修改的话，那么如果其他代码库中有引入这样的模块的话会非常难以理解。

不友好：
```
	class UserSettings
	{
	    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function changeSettings(array $settings): void
    {
        if ($this->verifyCredentials()) {
            // ...
        }
    }

    private function verifyCredentials(): bool
    {
        // ...
    }
}
```

友好的:

```
class UserAtuh
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function verifyCredentials(): bool
    {
        //
    }
}
class UserSettings
{
    private $user;
    private $auth;
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->auth = new UserAuth();
    }
    public function changeSettings(array $settings): void
    {
        if ($this->auth->verifyCredentials()) {
            //
        }
    }
}
```

##### 开闭原则 (OCP)
正如Bertrand Meyer所说，“软件开发应该对扩展开发，对修改关闭。”这是什么意思呢？这个原则的意思大概就是说你应该允许其他人在不修改已经存在的功能的情况下去增加新功能。

不友好的:
```
	abstract class Adapter
	{
	   protected $name;
	
	   public function getName(): string
	   {
	       return $this->name;
	   }
	}

class AjaxAdapter extends Adapter
{
   public function __construct()
   {
      parent::__construct();

       $this->name = 'ajaxAdapter';
   }
}

class NodeAdapter extends Adapter
{
   public function __construct()
   {
       parent::__construct();

       $this->name = 'nodeAdapter';
   }
}

class HttpRequester
{
   private $adapter;

   public function __construct(Adapter $adapter)
   {
       $this->adapter = $adapter;
   }

   public function fetch(string $url): Promise
   {
       $adapterName = $this->adapter->getName();

       if ($adapterName === 'ajaxAdapter') {
           return $this->makeAjaxCall($url);
       } elseif ($adapterName === 'httpNodeAdapter') {
           return $this->makeHttpCall($url);
       }
   }

   private function makeAjaxCall(string $url): Promise
   {
       // request and return promise
   }

   private function makeHttpCall(string $url): Promise
   {
       // request and return promise
   }
}
```

友好的：
```
interface Adopter
{
   public function request(string $url): Promise;
}

class AjaxAdopter implements Adopter
{
    public function request(string $url): Promise
    {
        // request and return promise
    }
}

class HttpRequester
{
    private $adopter;
    public function __construct(Adopter $adopter)
    {
        $this->adopter = $adopter;
    }

    public function fetch(string $url): Promise
    {
        return $this->adopter->request($url);
    }
}
```

#### 里氏替换原则 (LSP)
这本身是一个非常简单的原则却起了一个不太容易理解的名字。这个原则通常的定义是“如果S是T的一个子类，那么对象T可以在没有任何警告的情况下被他的子类替换（例如：对象S可能代替对象T）一些更合适的属性。”好像更难理解了。

最好的解释就是说如果你有一个父类和子类，那么你的父类和子类可以在原来的基础上任意交换。这个可能还是难以理解，我们举一个正方形-长方形的例子吧。在数学中，一个矩形属于长方形，但是如果在你的模型中通过继承使用了“is-a”的关系就不对了。

不友好的:
```
class Rectangle
{
   protected $width = 0;
   protected $height = 0;

   public function render(int $area): void
   {
       // ...
   }

   public function setWidth(int $width): void
   {
       $this->width = $width;
   }

   public function setHeight(int $height): void
   {
       $this->height = $height;
   }

   public function getArea(): int
   {
      return $this->width * $this->height;
   }
}

class Square extends Rectangle
{
   public function setWidth(int $width): void
   {
       $this->width = $this->height = $width;
   }

   public function setHeight(int $height): void
   {
       $this->width = $this->height = $height;
   }
}

function renderLargeRectangles(array $rectangles): void
{
   foreach ($rectangles as $rectangle) {
       $rectangle->setWidth(4);
       $rectangle->setHeight(5);
       $area = $rectangle->getArea(); // BAD: Will return 25 for Square. Should be 20.
       $rectangle->render($area);
   }
}

$rectangles = [new Rectangle(), new Rectangle(), new Square()];
renderLargeRectangles($rectangles);
```

友好的:
```
abstract class Shape
{
    protected $width  = 0;
    protected $height = 0;
    abstract public function getArea(): int;
    public function render(int $area): void
    {
        //...
    }
}
class Rectangle extends Shape
{
    public function setWidth(int $width): void
    {
        $this->width = $width;
    }

    public function setHeight(int $height): void
    {
        $this->height = $height;
    }

    public function getArea(): int
    {
        return $this->width * $this->height;
    }
}
class Square extends Shape
{
    private $length = 0;

    public function setLength(int $length): void
    {
        $this->length = $length;
    }

    public function getArea(): int
    {
        return pow($this->length, 2);
    }
}

function renderLargeRectangles(array $rectangles): void
{
    foreach ($rectangles as $rectangle) {
        if ($rectangle instanceof Square) {
            $rectangle->setLength(5);
        } elseif ($rectangle instanceof Rectangle) {
            $rectangle->setWidth(4);
            $rectangle->setHeight(5);
        }

        $area = $rectangle->getArea();
        $rectangle->render($area);
    }
}

$shapes = [new Rectangle(), new Rectangle(), new Square()];
renderLargeRectangles($shapes);
```

##### 接口隔离原则 (ISP)

ISP的意思就是说“使用者不应该强制使用它不需要的接口”。

当一个类需要大量的设置是一个不错的例子去解释这个原则。为了方便去调用这个接口需要做大量的设置，但是大多数情况下是不需要的。强制让他们使用这些设置会让整个接口显得臃肿。

不友好的:
```
interface Employee
{
   public function work(): void;

   public function eat(): void;
}

class Human implements Employee
{
   public function work(): void
   {
       // ....working
   }

   public function eat(): void
   {
       // ...... eating in lunch break
   }
}

class Robot implements Employee
{
   public function work(): void
   {
       //.... working much more
   }

   public function eat(): void
   {
       //.... robot can't eat, but it must implement this method
   }
}
```

友好的:

并非每一个工人都是职员，但是每一个职员都是工人。

```
interface Workable
{
   public function work(): void;
}

interface Feedable
{
   public function eat(): void;
}

interface Employee extends Feedable, Workable
{
}

class Human implements Employee
{
   public function work(): void
   {
       // ....working
   }

   public function eat(): void
   {
       //.... eating in lunch break
   }
}

// robot can only work
class Robot implements Workable
{
   public function work(): void
   {
       // ....working
   }
}
```

##### 依赖反转原则 (DIP)
这个原则有两个需要注意的地方：

- 高阶模块不能依赖于低阶模块。他们都应该依赖于抽象。
- 抽象不应该依赖于实现，实现应该依赖于抽象。
第一点可能有点难以理解，但是如果你有使用过像Symfony的PHP框架，你应该有见到过依赖注入这样的原则的实现。尽管他们是不一样的概念，DIP让高阶模块从我们所知道的低阶模块中分离出去。可以通过DI这种方式实现。一个巨大的好处在于它解耦了不同的模块。耦合是一个非常不好的开发模式，因为它会让你的代码难以重构。

不友好的:
```
class Employee
{
   public function work(): void
   {
       // ....working
   }
}

class Robot extends Employee
{
   public function work(): void
   {
       //.... working much more
   }
}

class Manager
{
   private $employee;

   public function __construct(Employee $employee)
   {
       $this->employee = $employee;
   }

   public function manage(): void
   {
       $this->employee->work();
   }
}
```
友好的:
```
interface Employee
{
   public function work(): void;
}

class Human implements Employee
{
   public function work(): void
   {
       // ....working
   }
}

class Robot implements Employee
{
   public function work(): void
   {
       //.... working much more
   }
}

class Manager
{
   private $employee;

   public function __construct(Employee $employee)
   {
       $this->employee = $employee;
   }

   public function manage(): void
   {
       $this->employee->work();
   }
}
```

别重复你的代码 (DRY)

尝试去研究DRY原则。

尽可能别去复制代码。复制代码非常不好，因为这意味着将来有需要修改的业务逻辑时你需要修改不止一处。

想象一下你在经营一个餐馆并且你需要经常整理你的存货清单：你所有的土豆，洋葱，大蒜，辣椒等。如果你有多个列表来管理进销记录，当你用其中一些土豆做菜时你需要更新所有的列表。如果你只有一个列表的话只有一个地方需要更新!

大多数情况下你有重复的代码是因为你有超过两处细微的差别，他们大部分都是相同的，但是他们的不同之处又不得不让你去分成不同的方法去处理相同的事情。移除这些重复的代码意味着你需要创建一个可以用一个方法/模块/类来处理的抽象。

使用一个抽象是关键的，这也是为什么在类中你要遵循SOLID原则的原因。一个不优雅的抽象往往比重复的代码更糟糕，所以要谨慎使用！说了这么多，如果你已经可以构造一个优雅的抽象，那就赶紧去做吧！别重复你的代码，否则当你需要修改时你会发现你要修改许多地方。

不友好的:
```
function showDeveloperList(array $developers): void
{
   foreach ($developers as $developer) {
       $expectedSalary = $developer->calculateExpectedSalary();
       $experience = $developer->getExperience();
       $githubLink = $developer->getGithubLink();
       $data = [
           $expectedSalary,
           $experience,
           $githubLink
       ];

       render($data);
   }
}

function showManagerList(array $managers): void
{
   foreach ($managers as $manager) {
       $expectedSalary = $manager->calculateExpectedSalary();
       $experience = $manager->getExperience();
       $githubLink = $manager->getGithubLink();
       $data = [
           $expectedSalary,
           $experience,
           $githubLink
       ];

       render($data);
   }
}
```
友好的：
```
function showList(array $employees): void
{
   foreach ($employees as $employee) {
       $expectedSalary = $employee->calculateExpectedSalary();
       $experience = $employee->getExperience();
       $githubLink = $employee->getGithubLink();
       $data = [
           $expectedSalary,
           $experience,
           $githubLink
       ];

       render($data);
   }
}
```
优雅的
```
function showList(array $employees): void
{
   foreach ($employees as $employee) {
       render([
           $employee->calculateExpectedSalary(),
           $employee->getExperience(),
           $employee->getGithubLink()
       ]);
   }
}
```