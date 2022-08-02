<?php
require_once __DIR__ . '/vendor/autoload.php';

class User
{
    private string $name;
    private int $age;
    private string $email;


    private function setName($name): string
    {
        return $this->name = $name;
    }

    private function setAge($age): int
    {
        return $this->age = $age;
    }

    public function getAll(): array
    {
        $users = [];
        foreach ($this as $key => $value) {
            $users += [$key=>$value];
        }
        return $users;
    }

    public function __call($name, $arguments)
    {
        if (!method_exists($this, $name)) {
            throw new Exception('Такого метода нет' . ' ' . $name);
        }
        return call_user_func_array([$this, $name], $arguments);
    }

}

try {
    $user = new User();
    $user->setName('Ihor');
    $user->setAge(33);
//    $user->getEmail();
    dd($user->getAll());
} catch (Exception $exception) {
    echo $exception->getMessage();

}




